<?php

require("./db.php");
require("./myFunction.php");
require("./sendEmail.php");

$id = '';
$pass = '';
$name = '';
$code = '';

$singUpHtmlCode = "
<h2>Create your account</h2>
<a href='login.php'>Go back</a>
<form method = 'post' action = ''>
	<p><label> E-mail </label>
	<input type = 'id' name = 'id'></p>
	<p><label> Password </label>
	<input type = 'text' name = 'pass'></p>
	<p><label> Name </label>
	<input type = 'text' name = 'name'><br></p>
	<input type = 'submit' value = 'Sign up'>
</form>";


if(isset($_POST['id'])){
	$id = $_POST['id'];
}
if(isset($_POST['pass'])){
	$pass = $_POST['pass'];
}
if(isset($_POST['name'])){
	$name = $_POST['name'];
}

if($id!='' && $pass!='' && $name!=''){

	/* Make ids array to check duplication */
	$userRow = findById($mysqli, 'users', $id);
	if($userRow != false){	// duplication
		echo "<p>You already signed up with this email. Try again.</p>";
		echo $singUpHtmlCode;
	} else {
		/* Make verify code randomly */
		$randCode = bin2hex(random_bytes(10));
		$tpass = $pass;
		$pass = passHashing($tpass);
		// insert into database
		$queryInsert = "INSERT INTO users(id, pass, name, code, status) VALUES ('$id', '$pass', '$name', '$randCode', 0)";
		$result = $mysqli->query($queryInsert);

		if (!$result)
			die($mysqli->error);
		else{
			// success -> send mail
			echo "<a href='login.php'>Log in</a>";
			sendVerifyMail($id, $name, $randCode);
		}
	}

} else {
	echo $singUpHtmlCode;
}




?>