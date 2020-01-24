<?php

require("db.php");


if(isset($_GET["user"])){
	$user = $_GET["user"];

	$query = "DELETE FROM users WHERE user_id = " . $user;
	$result=$mysqli->query($query);

	if($result){
		echo '<a href="manage_user.php">Go Back</a>';
	}
}

else if(isset($_GET["purchase"])){
	$purchase = $_GET["purchase"];

	$query = "DELETE FROM purchases WHERE purchase_id = " . $purchase;
	$result=$mysqli->query($query);

	if($result){
		echo '<a href="manage_order.php">Go Back</a>';
	}
}

else if(isset($_GET["cart"])){
	$purchase = $_GET["cart"];

	$query = "DELETE FROM cart WHERE cart_id = " . $purchase;
	$result=$mysqli->query($query);

	if($result){
		echo '<a href="cart.php">Go Back</a>';
	}
}



?>