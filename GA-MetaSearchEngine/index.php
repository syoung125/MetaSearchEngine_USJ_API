<?php

/////////////////////////////////////////////////////////
/*
This is the sign in, sign up page of meta-search engine.
*/
/////////////////////////////////////////////////////////

require_once("./db.php");
require_once("./sendEmail.php");

session_start();

if(isset($_SESSION['login']) && ($_SESSION['login'] == 1)){
	header("Location: shop.php");	
	exit;
}

/**************************************/

$content = '';
$menu = '';
if(isset($_GET['menu']))
{
	$menu = $_GET['menu'];
}

$content = "<h1>Meta-Search Engine</h1>
<a href='index.php'>Go home</a>";

if(isset($_POST['id']) && isset($_POST['pass'])){
	$id = mysql_fix_string($mysqli, $_POST['id']);
	$pass =  mysql_fix_string($mysqli, $_POST['pass']);

	if(isset($_POST['signin'])){
		if(checkUser($mysqli, $id, $pass)){
			$_SESSION['login'] = 1;
			$_SESSION['user'] = $_POST['id'];
			header("Location: shop.php");	
			exit;
		}else{
			$content .= "<p>Invalid pass/id no results</p>
			<a href='?menu=2'>You don't have account?</a>
			";
		}
	}else if(isset($_POST['signup'])){
		$name = 'noName';
		if(isset($_POST['name'])) $name = $_POST['name'];

		if(createUser($mysqli, $id, $pass, $name)){
			$content .= "<p>success!! Check email and verify your email.<a href='?menu=1'>Login</a></p>";
		}else{
			$content .= "<p>You already signed up with this email. Try again.</p>";
		}
	}
	
}



if($menu != ''){
	if($menu == 1){
		
		$content .= "
		<h1>1. Login</h1>
		<form method='post' action=''>
			<p><label>Email: </label>
			<input type='text' name='id'></p>
			<p><label>Pass: </label>
			<input type='text' name='pass'></p>
			<input type='submit' name = 'signin' value='Sign in'>
		</form>
		";
	}else if($menu == 2){
		$content .= "
		<h1>2. Create user</h1>
		<form method = 'post' action = ''>
			<p><label> Email </label>
			<input type = 'text' name = 'id'></p>
			<p><label> Password </label>
			<input type = 'text' name = 'pass'></p>
			<p><label> Name </label>
			<input type = 'text' name = 'name'></p>
			<input type = 'submit' name = 'signup' value = 'Sign up'>
		</form>
		";
	}

}else{
	$content .= "
	<ol>
		<li><a href='?menu=1'>Login</a></li>
		<li><a href='?menu=2'>Create user</a></li>
	</ol>
	";
}

echo $content;


////////////////////////////////////////////////


function checkUser($mysqli, $id, $pass)
{
	$hpass = md5($pass);	// hashing
	$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ? AND password = ?");

	$stmt->bind_param("ss", $id, $hpass);
	$stmt->execute();

	$result = $stmt->get_result();

	if($result && $result->num_rows == 1){
		return true;
	}
	else{
		return false;
	}
}


function createUser($mysqli, $id, $pass, $name){
	// CHECK DUPLICATE
	$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
	$stmt->bind_param("s", $id);
	$stmt->execute();

	$result = $stmt->get_result();

	if($result && $result->num_rows == 1){
		// DUPLICATE
		return false;
	}
	else{
		// INSERT INTO USER DATABASE
		// Make verify code randomly
		$hpass = md5($pass); // hashing
		$randCode = bin2hex(random_bytes(10));
		$status = 0;
		// insert into database
		$stmt = $mysqli->prepare("INSERT INTO users VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $id, $hpass, $name, $randCode, $status);
		$stmt->execute();

		// SEND MAIL
		sendVerifyMail($id, $name, $randCode);
		
		return true;
	}
}

/**
* Send Verification mail involving verification link.
*/
function sendVerifyMail($id, $name, $randCode){
	$title = '[MSE] Activate your account!';
	$verifyEmailContent = "
	<p>Click this link to activate your account<br>
	<label>Link: </label>
    <a href='http://apiwandshop.000webhostapp.com/API-GroupProject/activateAccount.php?email=$id&code=$randCode'>$randCode</a></p>";
	sendEmail($id, $name, $title, $verifyEmailContent);
}

?>