<?php
////////////////////////////////////////////////////////////////
/*
This page is shown the details of the order.
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

$purchaseList = '';
$orderId = '';
if(isset($_GET['id'])){
	$orderId = $_GET['id'];
}


$purchaseList = makePurchaseList($mysqli, $orderId);

echo "<p><h1>Order details - Admin</h1>
<a href='manageOrder.php'>Go back</a></p>
<h3>Order number : $orderId</h3>
<h3>Order List</h3>
$purchaseList
";


function makePurchaseList($mysqli, $orderId)
{
	$querySelect = "SELECT * FROM purchase WHERE order_id=$orderId";
	$result = $mysqli->query($querySelect); 

	if(!$result)
		die($mysqli->error);

	$purcaseTable = "
	<table width='80%'>
		<tr>
			<th>index</th>
			<th>product</th>
			<th>quantity</th>
			<th>price</th>
		</tr>";

	$totalPrice = 0;
	$index = 0;
	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$wandId = $row['wand_id'];
		$wandRow = findById($mysqli, 'wands', $wandId);
		$wandName = $wandRow['name'];

		$purcaseTable .= "
		<tr>
			<td>$index</td>
			<td>$wandName</td>
			<td>{$row['quantity']}</td>
			<td>{$row['price']} €</td>
		</tr>";

		$totalPrice += $row['price'];
		$index++;
	}
	
	$purcaseTable .= "</table>
	<h3>Total price: $totalPrice €</h3>";
	return $purcaseTable;
}


?>