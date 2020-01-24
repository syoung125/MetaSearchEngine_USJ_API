<?php
////////////////////////////////////////////////////////////////
/*
* When you click the link from sent message, your account will be activate.
*/
////////////////////////////////////////////////////////////////

require("../db.php");
require("../myFunction.php");

$email = '';
$code = '';

if(isset($_GET['email'])){
	$email = $_GET['email'];
}

if(isset($_GET['code'])){
	$code = $_GET['code'];
}

$userRow = findById($mysqli, 'users', $email);
if($userRow != false){
	if($userRow['code'] == $code){
		// Verified -> Change status
		$queryUpdate = "UPDATE users SET status=1 WHERE id='$email'";
		$result = $mysqli->query($queryUpdate);

		if (!$result)
			die($mysqli->error);

		echo "<p>Hi {$userRow['name']}, now your account is verified</p>
		<a href='../home.php'>Go wand shop</a>";
	}
}

?>