<?php
// DELETE FROM BASKET TABLE and ADD TO ORDER TABLE

header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');

require("../db.php");
require("../myFunction.php");
	
if(isset($_GET["mseid"])){
	if($_GET["mseid"] == ""){
	}else{
	$msid = $_GET["mseid"];
	createOrder($mysqli,$msid);
	}
}else{
	
}
	
function createOrder($mysqli,$msid){
	$selectp = "SELECT * FROM basket WHERE mse_id = '".$msid."'";
		if ($resultp = $mysqli->query($selectp)) {
	   while ($row = $resultp->fetch_assoc()) {
	          	$id = makeNoneDuplicateId($mysqli, 'purchase'); 
	          	$date = date("Y-m-d H:i:s");
	          	$order_id = 0;
	          	$user_id = $row['user_id'];
	          	$wand_id = $row['wand_id'];
	          	$quantity = $row['quantity'];
	          	$price = $row['price'];
	          	$mseid = $row['mse_id'];
				$query3 = "INSERT INTO purchase VALUES ($id, '$date', $order_id, '$user_id', $wand_id, $quantity, $price, '$mseid')";
	            if ($mysqli->query($query3) === TRUE) {
					 $deletequery = "DELETE FROM basket WHERE mse_id = '".$msid."'";
	             	 $deleteqresult = $mysqli->query($deletequery);
	             	 echo 1;
				} else {
	             	 echo 0;
				}
	    }
	}
}
?>