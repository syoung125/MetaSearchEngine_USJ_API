<?php

////////////////////////////////////////////////////////////////
/*
This page is shown the list of order and sales
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


$querySelect = "SELECT * FROM orders";
$result = $mysqli->query($querySelect); 

if(!$result)
	die($mysqli->error);

$orderTable = "
<table width='100%'>
	<tr>
		<th>order<br>number</th>
		<th>date</th>
		<th>user id</th>
		<th>name</th>
		<th>address</th>
		<th>postcode</th>
		<th>total<br>price</th>
		<th>status</th>
		<th>Detail</th>
		<th>Delete</th>
	</tr>";

$sales = 0;

$index = 0;
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
	// make a status list
	$status_list = makeList($mysqli, 'status');
	$statusRow = findById($mysqli, 'status', $row['status']);

	$orderTable .= "
	<form method = 'post' action = ''>
	<tr>
		<td>{$row['id']}</td>
		<input type='hidden' name='id' value='{$row['id']}'>
		<td>{$row['date']}</td>
		<td>{$row['user_id']}</td>
		<td>{$row['name']}</td>
		<td>{$row['address']}</td>
		<td>{$row['postcode']}</td>
		<td>{$row['totalPrice']} €</td>
		<td>
			<label> {$statusRow['name']} </label><br>
			<select name='cid'>
				$status_list
			</select>
			<input type = 'submit' name = 'change' value = 'Change'>
		</td>
		<td><a href='orderDetail.php?id={$row['id']}'>Detail</a></td>
		<td><input type = 'submit' name = 'delete' value = 'Delete'></td>
	</tr>
	</form>";

	// update order status
	if(isset($_POST['change'])){
		$queryUpdate = "UPDATE orders  SET status={$_POST['cid']} WHERE id={$_POST['id']}";
		$result = $mysqli->query($queryUpdate);

		if (!$result)
			die($mysqli->error);
		else{
			header("Location: ./manageOrder.php");	
			exit;
		}
	}

	// delete selected order 
	if(isset($_POST['delete'])){
		// delete from purchase list
		$queryDelete = "DELETE FROM purchase WHERE order_id={$_POST['id']}";
		$result = $mysqli->query($queryDelete);

		if (!$result)
			die($mysqli->error);


		// delete from orders list
		$queryDelete = "DELETE FROM orders WHERE id={$_POST['id']}";
		$result = $mysqli->query($queryDelete);

		if (!$result)
			die($mysqli->error);
		else{
			header("Location: ./manageOrder.php");	
			exit;
		}
	}

	// calculate sales
	$sales += $row['totalPrice'];
	$index++;
}
$orderTable .= "</table>";



echo "<p><h1>Basket List - Admin</h1>
<a href='shopAdmin.php'>Go home</a></p>"
.$orderTable
."<h3>Sales: $sales €</h3>";


?>