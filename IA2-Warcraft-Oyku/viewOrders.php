<?php
header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');
	require("db.php");
	
if(isset($_GET["mseid"])){
		if($_GET["mseid"] == ""){

		}else{
		$msid = $_GET["mseid"];
		viewShoppingList($mysqli,$msid);
		}
	}else{
		
	}

function viewShoppingList($mysqli,$msid){
    
    $row = array();

	$querySelect = "SELECT * FROM orders WHERE mseid = '".$msid."'";
	$result = $mysqli->query($querySelect); //query() : Performs a query on the database
	if(!$result)
		die($mysqli->error);	//prints given message while exiting the script 
	else{
		if($result->data_seek(0)){
		    $row = $result->fetch_array(MYSQLI_ASSOC);
            $p_id = $row["product_id"];
            $query2 = "SELECT * FROM product WHERE product_id = '".$p_id."'";
            $result2 = $mysqli->query($query2);
            
			$row = $result2->fetch_array(MYSQLI_ASSOC);
			$row["id"] = $row["product_id"];
			unset($row["product_id"]);
		}
	}
	  	
    $myJSON = json_encode($row);
    echo $myJSON;
           
}
?>