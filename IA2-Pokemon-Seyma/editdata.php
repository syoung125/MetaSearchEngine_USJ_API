<?php

require("db.php");

if(isset($_GET["purchase"])){
	echo "
	<html>
		<head>
			<title>Change Sending Status</title>
		</head>
		<body>
		<form method='post' action=''>
			<p><label>Status: </label>
			<input type='text' name='status'></p>
			<input type='submit' Buy>
		</body>
	</html>";

	if(isset($_POST["status"])){
		$query = "UPDATE purchases SET status = '" . $_POST["status"] . "' WHERE purchase_id = " . $_GET["purchase"];
		$result = $mysqli->query($query);

		if($result){
			echo '<a href="manage_order.php">Go Back</a>';
		}
		else{
			echo 'something went wrong';
		}
	}
}

?>