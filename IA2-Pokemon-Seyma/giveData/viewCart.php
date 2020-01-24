<?php
header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');
require("../db.php");
	
if(isset($_GET["mseid"])){
		if($_GET["mseid"] == ""){

		}else{
		$msid = $_GET["mseid"];
		viewShoppingList($mysqli,$msid);
		}
	}else{
		
	}

function viewShoppingList($mysqli,$msid){
	$querySelect = "SELECT * FROM cart WHERE mse_userid = '".$msid."'";
	$result = $mysqli->query($querySelect); //query() : Performs a query on the database
	
	$row = array();
	$cart = array();
	
	if(!$result)
		die($mysqli->error);	//prints given message while exiting the script 
	else{
		if($result->data_seek(0)){
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$row["id"] = $row["pokemon_id"];
			unset($row["pokemon_id"]);
			
			$pokQuery = "SELECT * FROM pokemon WHERE pokemon_id = " . $row["id"];
			$pokResult = $mysqli->query($pokQuery);
			$pokRow = $pokResult->fetch_array(MYSQLI_ASSOC);
			
			$foreignQuery = "SELECT * FROM poke_types WHERE pok_id = " . $pokRow["name"];
			$foreignResult = $mysqli->query($foreignQuery);
			$foreignRow = $foreignResult->fetch_array(MYSQLI_ASSOC);
			
			$pokRow["name"] = $foreignRow["name"];
			
			$cart = array_merge($row, $pokRow);
		}
	}
	
    $myJSON = json_encode($cart);
    echo $myJSON;
}
?>