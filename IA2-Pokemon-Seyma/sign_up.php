<?php

require("db.php");
require("sendMail.php");

ob_start();

echo "
	<html>
		<head>
			<title>Sign Up</title>
		</head>
		<body>
		<form method='post' action=''>
			<p><label>Username: </label>
			<input type='text' name='user'></p>
			<p><label>Email:     </label>
			<input type='text' name='email'></p>
			<p><label>Password: </label>
			<input type='text' name='pass'></p>
			<input type='submit'>
		</body>
	</html>";

if(isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["email"])){
	$user = mysql_fix_string($mysqli, $_POST["user"]);
	$pass =  mysql_fix_string($mysqli, $_POST["pass"]);
	$email =  mysql_fix_string($mysqli, $_POST["email"]);
	$status = mysql_fix_string($mysqli, "not activated");
	$act_code = random_bytes(10);
	$act_code = bin2hex($act_code);

	$id = "NULL";

	$salt = openssl_random_pseudo_bytes(2);
	$salt = bin2hex($salt);
	$salt_pass = $salt . $pass . $salt;
	$salt_pass = hash("haval160,4", $salt_pass);

	$stmt = $mysqli->prepare("INSERT INTO users (username, password, salt, email, status) VALUES (?, ?, ?, ?, ?)");

	$stmt->bind_param("sssss", $user, $salt_pass, $salt, $email, $status);

	if($stmt->execute()){
		sendRegMail($email, $user, $act_code);
	}

	else{
	    echo $stmt->error;
		$errno = mysqli_connect_errno();
		print($errno);
		echo "something went wrong";
	}
}

?>