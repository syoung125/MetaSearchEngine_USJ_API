<?php

require("../db.php");

$generations = array( 
	1 => 'Generation I',
	2 => 'Generation II',
	3 => 'Generation III',
	4 => 'Generation IV',
	5 => 'Generation V',
	6 => 'Generation VI',
	7 => 'Generation VII',
	8 => 'Generation VIII',
	); 

foreach ($generations as $key => $value) {
	$stmt = $mysqli->prepare("INSERT INTO generations VALUES (?, ?)");

	$stmt->bind_param("ss", $key, $value);
	$stmt->execute();
}

?>