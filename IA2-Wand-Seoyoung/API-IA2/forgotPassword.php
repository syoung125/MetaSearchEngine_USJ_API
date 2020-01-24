<?php

require("./db.php");
require("./myFunction.php");
require("./sendEmail.php");

$email = '';

echo "
<h1>Forgot password?</h1>
<form method='post' action=''>
	<p><label>Email: </label>
	<input type='email' name='email'></p>
	<input type='submit' value='Send email'>
</form>
";

// if the email exists in user list, send email.
if(isset($_POST["email"])){
	$email = $_POST["email"];
	$userRow = findById($mysqli, 'users', $email);
	if($userRow != false){
		echo "<p>Check your email to change the password.
		<a href='login.php'>Log in</a>
		</p>";
		$id = $userRow['id'];
		$name = $userRow['name'];
		$title = '[OLLIVANDERS] Change your password!';
		$verifyEmailContent = "
		<p>Go to this link<br>
		<a href='https://apiwandshop.000webhostapp.com/API-IA2/user/changePassword.php?email=$id'>Change password</a></p>";
		sendEmail($id, $name, $title, $verifyEmailContent);
	}


}


?>