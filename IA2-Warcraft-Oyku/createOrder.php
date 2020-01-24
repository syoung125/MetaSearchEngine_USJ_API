<?php
header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');
	require("db.php");
	
if(isset($_GET["mseid"])){
		if($_GET["mseid"] == ""){

		}else{
		$msid = $_GET["mseid"];
		$id = $_GET["id"];
		createOrder($mysqli,$msid);
		}
	}else{
		
	}

	//createOrder($mysqli,1,2083976);
	//createIAuser($mysqli);
	//createShoppingList($mysqli,1,2083976,4)	
function createOrder($mysqli,$msid){

        $selectp = "SELECT * FROM shopping_list WHERE mseid = '".$msid."' ";
	  	if ($resultp = $mysqli->query($selectp)) {
           while ($row = $resultp->fetch_assoc()) {
                  	$quant = $row["quantity"];
                  	$price = $row["price_total"];
                  	$date = date("Y-m-d H:i:s");
                  	$id = $row['product_id'];
					$query3 = "INSERT INTO orders (user_id, product_id, mseid,  quantity,  price_total, ship_date, ship_adress, order_date)
                    VALUES (1001 ,'$id','$msid','$quant','$price','$date',0,'$date')";
                    if ($mysqli->query($query3) === TRUE) {
	    				echo "Order created, we have all your money";
	    				 $deletequery = "DELETE FROM shopping_list WHERE mseid = '".$msid."'";
                     	 $deleteqresult = $mysqli->query($deletequery) ;
                     	 echo 1;
					} else {
    					echo 0;
					}
            }
        }

}
?>