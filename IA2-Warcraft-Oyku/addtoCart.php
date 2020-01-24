<?php
header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');
	require("db.php");
	
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

function createShoppingList($mysqli,$msid,$id,$quant){

	    $stock=true;
	    $checklist = "SELECT * FROM product WHERE product_id = ".$id."";
	  	if ($checklistresult = $mysqli->query($checklist)) {
           while ($row = $checklistresult->fetch_assoc()) {
           		$proquant = $row["quantity"];
           		if($proquant<$quant){
           			echo "NOT ENOUGH STOCK";
           			$stock = false;
           		}else if($proquant>=$quant){
           			 $newquant = $proquant-$quant;
           			 $updatequery = "UPDATE product SET quantity= ".$newquant." WHERE product_id= ".$id." ";
           			 $updateresult = $mysqli->query($updatequery);
           		}
            }
        }

      if($stock) {
	  	$query = "SELECT * FROM product WHERE product_id = ".$id."";
	 
	  		if ($result1 = $mysqli->query($query)) {
	  			while ($row = $result1->fetch_assoc()) {
	  				$price = $row["price"];
				    $price_total = $quant * $price;
         
					$query5 = "INSERT INTO shopping_list (product_id, mseid, quantity, price_total, user_id)
            		VALUES ('$id','$msid','$quant', '$price_total', 1001)";
                          
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