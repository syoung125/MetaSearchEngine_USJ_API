<?php

header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');

require("../db.php");

$id = "";
if(isset($_GET['id'])){
	$id = $_GET['id'];
}

$result_row = "";

if($id != ""){
	$querySelect = "SELECT * FROM pokemon WHERE pokemon_id = $id";
	$result = $mysqli->query($querySelect); //query() : Performs a query on the database
	if(!$result)
		die($mysqli->error);	//prints given message while exiting the script 
	else{
		if($result->data_seek(0)){
			$result_row = $result->fetch_array(MYSQLI_ASSOC);
			$result_row["id"] = $result_row["pokemon_id"];
			unset($result_row["pokemon_id"]);
			
			$result_row["quantity"] = $result_row["stock"];
			unset($result_row["stock"]);

			$foreignQuery = "SELECT * FROM poke_types WHERE pok_id = " . $result_row["name"];
			$foreignResult = $mysqli->query($foreignQuery);
			$foreignRow = $foreignResult->fetch_array(MYSQLI_ASSOC);

			$result_row["name"] = $foreignRow["name"];
		}
	}
}

$myJSON = json_encode($result_row);
echo $myJSON;

?>