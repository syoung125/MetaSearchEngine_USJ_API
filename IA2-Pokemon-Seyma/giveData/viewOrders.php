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

	$querySelect = "SELECT * FROM purchases WHERE mse_userid = '".$msid."'";
	$result = $mysqli->query($querySelect); //query() : Performs a query on the database
	if(!$result)
		die($mysqli->error);	//prints given message while exiting the script 
	else{
		if($result->data_seek(0)){
		    $row = $result->fetch_array(MYSQLI_ASSOC);
            $p_id = $row["pokemon_id"];
            $query2 = "SELECT * FROM pokemon WHERE pokemon_id = '".$p_id."'";
            $result2 = $mysqli->query($query2);
            
			$row = $result2->fetch_array(MYSQLI_ASSOC);
			$row["id"] = $row["pokemon_id"];
			unset($row["pokemon_id"]);
			
			$row["date"] = ' ';
		}
	}
	  	
    $myJSON = json_encode($row);
    echo $myJSON;
           
}
?>