<?php

header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');

	require("../db.php");
	
if(isset($_GET["mseid"])){
		if($_GET["mseid"] == ""){
		}else{
		$msid = $_GET["mseid"];
		createOrder($mysqli,$msid);
		}
	}else{
		
	}
	
function createOrder($mysqli,$msid){
        $selectp = "SELECT * FROM cart WHERE mse_userid = '".$msid."'";
	  	if ($resultp = $mysqli->query($selectp)) {
           while ($row = $resultp->fetch_assoc()) {
                  	//$oid= rand(1,1000);
                  	//$quant = $row["quantity"];
                  	$price = $row["price"]; 
                  	$id = $row["pokemon_id"];
					$query3 = "INSERT INTO purchases (user_id, pokemon_id, address, status, mse_userid, price)
                    VALUES (20 , $id,  ' ', 'sending', '$msid', $price)";
                    if ($mysqli->query($query3) === TRUE) {
	    				 $deletequery = "DELETE FROM cart WHERE pokemon_id = ".$id." AND mse_userid = '".$msid."'";
                     	 $deleteqresult = $mysqli->query($deletequery);
                     	 echo 1;
					} else {
    					echo 0;
					}
            }
        }
}
?>