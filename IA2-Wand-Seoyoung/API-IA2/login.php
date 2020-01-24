<?php
////////////////////////////////////////////////////////////////
/*
* Log in
*/
////////////////////////////////////////////////////////////////

session_start();

require_once("./db.php");
require("./myFunction.php");
require("./sendEmail.php");


if(isset($_SESSION['login'])){
	$user = findById($mysqli, 'users', $_SESSION['user']);
	if($_SESSION['user'] == 'admin'){
		header("Location: admin/shopAdmin.php"); // you can't echo anything before
		exit;
	} else if($user['status'] == 0){
		if(isset($_POST['sendEmail'])){
			echo "<a href='./login.php'>Log in</a><br>";
			sendVerifyMail($user['id'], $user['name'], $user['code']);
			exit;
		}
		echo "<p>You should verify email.<p>
		<form method='post' action=''>
			<input type = 'email' name='email' value = '{$user['id']}' disabled>
			<input type = 'submit' name='sendEmail' value = 'Send email again.'>
		</form>
		<a href='logout.php'>Log out</a>";
		exit;
	} else{
		header("Location: user/shopUser.php");	
		exit;
	}
}

/**************************************************************/

if(isset($_POST["id"]) && isset($_POST["pass"])){
	$id = mysql_fix_string($mysqli, $_POST["id"]);
	$tpass =  mysql_fix_string($mysqli, $_POST["pass"]);
	$pass = passHashing($tpass);
	$stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ? AND pass = ?");	// ?사실 잘 이해 못함

	$stmt->bind_param("ss", $id, $pass);
	$stmt->execute();

	$result = $stmt->get_result();

	if($result && $result->num_rows == 1){
		$_SESSION['login'] = 1;
		$_SESSION['user'] = $id;
		header("Location: login.php");	
		exit;
	}
	else{
		echo "<p>invalid pass/id no results</p>";
	}
}else{
	echo "
	<html>
		<head>
			<title>Form</title>
		</head>
		<body>
			<h1>Wand Shop Login</h1>
			<form method='post' action=''>
				<p><label>Email: </label>
				<input type='id' name='id'></p>
				<p><label>Pass: </label>
				<input type='text' name='pass'></p>
				<input type='submit' value='Sign in'>
				<a href='createUser.php'>Sign up</a>
				<a href='forgotPassword.php'>Forgot your password?</a>
			</form>
		</body>
	</html>";
}

?>