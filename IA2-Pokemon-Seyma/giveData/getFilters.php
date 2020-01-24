<?php

    header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');

	require("../db.php");

	$query = "SELECT * FROM types";

	$types = array();

	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
			$row["id"] = $row["type_id"];
			unset($row["type_id"]);
			$row["name"] = $row["type_name"]; 
			unset($row["type_name"]);
			
			array_push($types, $row);
		}
		$result->free();
	}

	$json = json_encode($types);
	echo $json;
?>