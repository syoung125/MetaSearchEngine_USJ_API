<?php
header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');
	require("db.php");

	$query = "SELECT * FROM race";

	$race = array();

	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
			$row["id"] = $row["race_id"];
			unset($row["race_id"]);
			
			array_push($race, $row);
		}
		$result->free();
	}

	$json = json_encode($race);
	echo $json;
?>