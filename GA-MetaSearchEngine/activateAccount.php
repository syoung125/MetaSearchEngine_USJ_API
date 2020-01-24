<?php
///////////////////////////////////////////////////////////////////////////
/*
* When you click the link from sent message, your account will be activate.
*/
///////////////////////////////////////////////////////////////////////////

require("./db.php");

$email = '';
$code = '';

if(isset($_GET['email']) && isset($_GET['code'])){
	$email = $_GET['email'];
	$code = $_GET['code'];
}


$userRow = '';

$querySelect = "SELECT * FROM users WHERE email = '{$email}'";
$result = $mysqli->query($querySelect);
if(!$result)
	die($mysqli->error);
else{
	if($result->data_seek(0)){
		$userRow = $result->fetch_array(MYSQLI_ASSOC);
	}
}

if($userRow != ''){
	if($userRow['code'] == $code){
		// Verified -> Change status
		$queryUpdate = "UPDATE users SET status = 1 WHERE email = '$email'";
		$result = $mysqli->query($queryUpdate);

		if (!$result)
			die($mysqli->error);

		echo "<h1>Meta-Search Engine</h1>
		<p>Hi {$userRow['name']}, now your account is verified</p>
		<a href='./index.php'>Go home</a>";
	}
}

?>