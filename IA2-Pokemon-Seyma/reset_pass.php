<?php

require("db.php");
require("sendMail.php");

echo "
	<html>
		<head>
			<title>Reset Password</title>
		</head>
		<body>
		<form method='post' action=''>
			<p><label>Please enter your e-mail: </label>
			<input type='text' name='email'></p>
			<input type='submit'>
		</body>
	</html>";

if(isset($_POST['email'])){
	$email = $_POST["email"];
	sendResetMail($email);
}

?>