<?php

header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');
	require("../db.php");
	
	//createOrder($mysqli,1,2083976);
	//createIAuser($mysqli);
	//createShoppingList($mysqli,1,2083976,4)	

if(isset($_GET["mseid"]) && isset($_GET["id"]) &&  isset($_GET["quantity"])){
		if($_GET["mseid"] == ""|| $_GET["id"]== "" ||  $_GET["quantity"]== ""){
		}else{
			$msid = $_GET["mseid"];
			$id = $_GET["id"];
			$quantity = $_GET["quantity"];
			createShoppingList($mysqli,$msid,$id,$quantity);
		}
}else{	

}

function createShoppingList($mysqli, $msid, $id, $quant){
	    $stock = true;
	    $checklist = "SELECT * FROM pokemon WHERE pokemon_id = ". $id;
	  	if ($checklistresult = $mysqli->query($checklist)) {
           while ($row = $checklistresult->fetch_assoc()) {
           		$proquant = $row["stock"];
           		//echo  $row["name"];
           		if($proquant < $quant){
           			echo "NOT ENOUGH STOCK";
           			$stock = false;
           		}else if($proquant >= $quant){
           			 $newquant = $proquant - $quant;
           			 $updatequery = "UPDATE pokemon SET stock = ". $newquant ." WHERE pokemon_id = ".$id." ";
           			 $updateresult = $mysqli->query($updatequery);
           		}
            }
        }

      if($stock) {
	  	$query = "SELECT * FROM pokemon WHERE pokemon_id = ".$id."";
	  		if ($result1 = $mysqli->query($query)) {
	  			while ($row = $result1->fetch_assoc()) {
	  				$price = $row["price"];
				    $price = $quant * $price;
                    
				    $mse = 20;
				    $date = date("Y-m-d H:i:s");
				    //echo $date;

					$query5 = "INSERT INTO cart (user_id, pokemon_id, date, quantity, price, mse_userid)
            		VALUES ($mse, $id, '$date', $quant, $price, '$msid')";
                          
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