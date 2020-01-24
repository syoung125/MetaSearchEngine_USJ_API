<?php

require("db.php");
session_start();

ob_start();

echo "
	<html>
		<head>
			<title>Login</title>
		</head>
		<body>
		<form method='post' action=''>
			<p><label>Username: </label>
			<input type='text' name='user'></p>
			<p><label>Password: </label>
			<input type='text' name='pass'></p>
			<input type='submit'>

			<a href=\"reset_pass.php\";>Forgot Password?</a>
		</body>
	</html>";

if(isset($_POST["user"]) && isset($_POST["pass"])){
	$user = mysql_fix_string($mysqli, $_POST["user"]);
	$pass =  mysql_fix_string($mysqli, $_POST["pass"]);

	$stmt2 = $mysqli->prepare("SELECT salt FROM users WHERE username = ?");
	$stmt2->bind_param("s", $user);
	$stmt2->execute();

	$result2 = $stmt2->get_result();
	$result2 = $result2->fetch_array(MYSQLI_ASSOC);
	$salt = $result2["salt"];

	$salt_pass = $salt . $pass . $salt;
	$salt_pass = hash("haval160,4", $salt_pass);

	$stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ? AND password = ?");

	$stmt->bind_param("ss", $user, $salt_pass);
	$stmt->execute();

	$result = $stmt->get_result();
	$check_activation = $result->fetch_array(MYSQLI_ASSOC);
	$activation = $check_activation["status"];

	if($result && $result->num_rows == 1 && $activation == "activated"){
		$_SESSION["login"] = 1;
		$_SESSION["user"] = $user;

		$query = "SELECT user_id FROM users WHERE username = '". $user . "'";
		$result3 = $mysqli->query($query);

		$us_id = $result3->fetch_assoc();
		$user_id = $us_id["user_id"];

		$_SESSION["id"] = $user_id;
		
		ob_end_clean();
		header("Location: index.php");
	}

	else{
		$errno = mysqli_connect_errno();
		print($errno);
		echo "something went wrong";
	}
}

ob_end_flush();
?>