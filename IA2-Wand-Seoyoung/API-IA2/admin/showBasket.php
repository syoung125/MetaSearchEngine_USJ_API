<?php

////////////////////////////////////////////////////////////////
/*
* This page is shown the list of the selected user's basket
* 
*/
////////////////////////////////////////////////////////////////

require("../db.php");
require("../myFunction.php");

session_start();

if(!isset($_SESSION['login'])){
	header("Location: ../login.php");	
	exit;
}else if($_SESSION['user'] != 'admin'){
	echo "<p>You do not have permission.<p>
	<a href='../home.php'>Go home</a>";
	exit;
}

/*********************************************/

$userId = '';

if(isset($_GET['id'])){
	$userId = $_GET['id'];
}

if($userId != ''){
	$orderTable = makeUserBasketList($mysqli, $userId);
	echo "<p><h1>$userId's basket</h1>
	<a href = 'manageUser.php'>Go back</a></p>"
	.$orderTable;
}


/**
* Make a {$userId} basetList and return table html code.
*/
function makeUserBasketList($mysqli, $userId)
{
	$user_id = $userId;	//temp
	$bRow = getRows($mysqli, 'basket');
	$myBasket = array();
	foreach ($bRow as $row) {
		if($row['user_id'] == $user_id){
			$myBasket[] = $row;
		}
	}
	$totalPrice = 0;

	$orderTable = "
	<table width='80%'>
		<tr>
			<th>id</th>
			<th>date</th>
			<th>product</th>
			<th>quantity</th>
			<th>price</th>
		</tr>";

	foreach ($myBasket as $row) {
		$wandId = $row['wand_id'];
		$wandRow = findById($mysqli, 'wands', $wandId);
		$wandName = $wandRow['name'];

		$totalPrice += $row['price'];

		$orderTable .= "
		<tr>
			<td>{$row['id']}</td>
			<td>{$row['date']}</td>
			<td>$wandName</td>
			<td>{$row['quantity']}</td>
			<td>{$row['price']} €</td>
		</tr>";

	}
	$orderTable .= "</table>
	<h3>Total price: $totalPrice €</h3>";
	return $orderTable;
}
	

?>