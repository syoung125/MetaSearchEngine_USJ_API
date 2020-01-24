<?php

	require("../db.php");

	$query = "SELECT * FROM wood";

	$types = array();

	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
			array_push($types, $row);
		}
		$result->free();
	}

	$json = json_encode($types);
	echo $json;
?>