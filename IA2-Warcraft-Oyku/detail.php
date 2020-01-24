<?php

header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');
require("db.php");
$id = "";
if(isset($_GET['id'])){
	$id = $_GET['id'];
}

$result_row = "";

if($id != ""){
	$querySelect = "SELECT * FROM product WHERE product_id = $id";
	$result = $mysqli->query($querySelect); //query() : Performs a query on the database
	if(!$result)
		die($mysqli->error);	//prints given message while exiting the script 
	else{
		if($result->data_seek(0)){
			$result_row = $result->fetch_array(MYSQLI_ASSOC);
		    $r_id = $result_row["race_id"];
		    $c_id = $result_row["class_id"];
			$query2 = "SELECT * FROM race WHERE race_id = '".$r_id."'";
            $result2 = $mysqli->query($query2);
            
			$row2= $result2->fetch_array(MYSQLI_ASSOC);
			$result_row["race"] = $row2["name"];
			
			$query3 = "SELECT * FROM class WHERE class_id = '".$c_id."'";
            $result3 = $mysqli->query($query3);
            
			$row3= $result3->fetch_array(MYSQLI_ASSOC);
			$result_row["class"] = $row3["name"];
			
			$result_row["id"] = $result_row["product_id"];
			unset($result_row["product_id"]);
		}
	}
}

$myJSON = json_encode($result_row);
echo $myJSON;

?>

