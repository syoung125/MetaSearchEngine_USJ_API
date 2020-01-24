<?php

require("db.php");

$email = $_GET["email"];

echo "
	<html>
		<head>
			<title>Reset Password</title>
		</head>
		<body>
		<form method='post' action=''>
			<p><label>Enter new password: </label>
			<input type='text' name='pass'></p>
			<input type='submit'>
		</body>
	</html>";

if(isset($_POST['pass'])){
	$pass = $_POST["pass"];

	$salt = openssl_random_pseudo_bytes(2);
	$salt = bin2hex($salt);
	$salt_pass = $salt . $pass . $salt;
	$salt_pass = hash("haval160,4", $salt_pass);

	$stmt = $mysqli->prepare("UPDATE users SET password = ?, salt = ? WHERE email = ?");
	$stmt->bind_param("sss", $salt_pass, $salt, $email);
	$stmt->execute();

	echo "Your password has been succesfully changed. You can now login.
	<a href=\"login.php\"; class=\"button\">Login</a>";
}

?>