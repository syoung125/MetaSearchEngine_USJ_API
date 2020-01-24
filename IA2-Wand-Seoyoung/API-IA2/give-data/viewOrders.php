<?php
header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');

require("../db.php");
require("../myFunction.php");
	
if(isset($_GET["mseid"])){
	if($_GET["mseid"] == ""){

	}else{
	$msid = $_GET["mseid"];
	viewShoppingList($mysqli,$msid);
	}
}else{

}

function viewShoppingList($mysqli,$msid){

	$querySelect = "SELECT * FROM purchase WHERE mse_id = '".$msid."'";
	$result = $mysqli->query($querySelect); //query() : Performs a query on the database
	if(!$result)
		die($mysqli->error);	//prints given message while exiting the script 
	else{
		if($result->data_seek(0)){
		    $row = $result->fetch_array(MYSQLI_ASSOC);
            $p_id = $row["wand_id"];
            $query2 = "SELECT * FROM wands WHERE id = '".$p_id."'";
            $result2 = $mysqli->query($query2);
            
			$row2 = $result2->fetch_array(MYSQLI_ASSOC);
			$row['name'] = $row2['name'];
			$row['price'] = $row2['price'];
			$row['img'] = $row2['img'];
		}
	}
	  	
    $myJSON = json_encode($row);
    echo $myJSON;
           
}
?>