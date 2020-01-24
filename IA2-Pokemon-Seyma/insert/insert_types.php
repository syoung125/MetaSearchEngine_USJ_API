<?php

require("../db.php");

$types = array( 
	1 => 'normal',
	2 => 'water',
	3 => 'fire',
	4 => 'electric',
	5 => 'grass',
	6 => 'ice',
	7 => 'fighting',
	8 => 'poison',
	9 => 'ground',
	10 => 'flying',
	11 => 'psychic',
	12 => 'bug',
	13 => 'rock',
	14 => 'ghost',
	15 => 'dragon',
	16 => 'dark',
	17 => 'steel',
	18 => 'fairy',
	); 

foreach ($types as $key => $value) {
	$stmt = $mysqli->prepare("INSERT INTO types VALUES (?, ?)");

	$stmt->bind_param("ss", $key, $value);
	$stmt->execute();
}

?>