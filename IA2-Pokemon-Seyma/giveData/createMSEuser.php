<?php

header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');
	require("../db.php");
	//createIAuser($mysqli);	

function createIAuser($mysqli){
	    $id= 1001;
	    $username = "MSE";
		$salt = 0;
		$status = 'activated';
		$email = "MSE";
		$pass = 1234;

        $stmt = $mysqli->prepare("INSERT (user_id, username, password, salt, email, status) INTO users VALUES (?, ?, ?, ?, ?, ?)");

		$stmt->bind_param("ssssss", $id, $username, $pass, $salt, $email, $status);
		$stmt->execute();
}
?>