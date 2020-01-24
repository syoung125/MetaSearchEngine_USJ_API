<?php
require("../db.php");
require("../myFunction.php");

	
if(isset($_GET["mseid"]) && isset($_GET["id"]) &&  isset($_GET["quantity"]) ){
	if($_GET["mseid"] == ""|| $_GET["id"]== "" ||  $_GET["quantity"]== ""){

	}else{
	$msid = $_GET["mseid"];
	$id = $_GET["id"];
	$quantity = $_GET["quantity"];
	createShoppingList($mysqli,$msid,$id,$quantity);
	}
}else{
	
}

function createShoppingList($mysqli,$msid,$id,$quant)
{
    $stock=true;
    $checklist = "SELECT * FROM wands WHERE id = ".$id."";
  	if ($checklistresult = $mysqli->query($checklist)) {
       while ($row = $checklistresult->fetch_assoc()) {
       		$proquant = $row["quantity"];
       		if($proquant<$quant){
       			echo "NOT ENOUGH STOCK";
       			$stock = false;
       		}else if($proquant>=$quant){
       			 $newquant = $proquant-$quant;
       			 $updatequery = "UPDATE wands SET quantity= ".$newquant." WHERE id= ".$id." ";
       			 $updateresult = $mysqli->query($updatequery);
       		}
        }
    }

    if($stock) {
    	$query = "SELECT * FROM wands WHERE id = ".$id."";
 
  		if ($result1 = $mysqli->query($query)) {
  			while ($row = $result1->fetch_assoc()) {
  				$price = $row["price"];
			    $price_total = $quant * $price;
                $basketid= makeNoneDuplicateId($mysqli, 'basket');  
                $date = date("Y-m-d H:i:s");
				$query5 = "INSERT INTO basket VALUES ($basketid, '$date', 'mse', $id, $quant, $price_total, '$msid')";
                      
        			if ($mysqli->query($query5) === TRUE) {
            			echo "Added to your cart";
        			} else {
	        			echo "Error adding to your cart: " . $mysqli->error;
        			}
			  
                }
            }
    		
    	
	}
}


?>