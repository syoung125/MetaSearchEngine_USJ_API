<?php

require("../db.php");

$special = array( 
	0 => 'not special',
	1 => 'starter',
	2 => 'legendary',
	3 => 'mystical',
	); 

foreach ($special as $key => $value) {
	$stmt = $mysqli->prepare("INSERT INTO special VALUES (?, ?)");

	$stmt->bind_param("ss", $key, $value);
	$stmt->execute();
}

?>