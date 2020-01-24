<?php

require("db.php");
session_start();

$pidCount = $_GET['pidCount'];

$pid = array();
$uid = $_SESSION['id'];

for($i = 0; $i <= $pidCount; $i++){
	array_push($pid, $_GET['pid'.$i]);
	$query = "DELETE FROM cart WHERE user_id = " .$uid . " AND pokemon_id = " .$pid[$i];
	$result = $mysqli->query($query);

	if(1){

	}
	else{
		echo "something went wrong";
	}
}

echo "
	<html>
		<head>
			<title>Buy Pokemon</title>
		</head>
		<body>
		<form method='post' action=''>
			<p><label>Address: </label>
			<input type='text' name='address'></p>
			<input type='submit' Buy>
		</body>
	</html>";

if(isset($_POST['address'])){
	$address = mysql_fix_string($mysqli, $_POST["address"]);

	$status = "sending";

	$stmt = $mysqli->prepare("INSERT INTO purchases (user_id, pokemon_id, address, status) VALUES (?, ?, ?, ?)");

	for($k = 0; $k <= $pidCount; $k++){
		$stmt->bind_param("ssss", $uid, $pid[$k], $address, $status);
		$stmt->execute();
	}

	echo '<p>Your order has been placed!</p>';
	echo  '<br><a href="index.php">Go Back</a>';
}

?>