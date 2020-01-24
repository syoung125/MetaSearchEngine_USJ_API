<?php
////////////////////////////////////////////////////////////////
/*
This page is shown the list of the current user's cart
*/
////////////////////////////////////////////////////////////////


require_once("db.php");
require_once("myFunction.php");
session_start();

$user_id = '';
// SESSION CHECK
if(isset($_SESSION['login']) && ($_SESSION['login'] == 1)){
	$user_id = $_SESSION['user'];
	if(!checkUserVerification($mysqli, $user_id)){
		echo "You should verify your email. Check email.";
	}
}else{
	// If it doesn't login, go to login page.
	header("Location: index.php");	
	exit;
}


/**************************************/

echo "<script src='shop.js'></script>";


///////////////////////////////////////
/* Echo                              */
///////////////////////////////////////

echo "<p><h1>My Orders</h1>
<a href = 'shop.php'>Keep shopping</a></p>
<a onclick = \"mergeOrders('$user_id')\">View list</a></p>
<div id='orderTable'></div>
";


?>