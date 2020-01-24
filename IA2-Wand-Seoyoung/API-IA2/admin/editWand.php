<?php

////////////////////////////////////////////////////////////////
/*
* Edit or delete specific item
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


$id = '';
$name = '';
$price = '';
$wood_id = '';
$core_id = '';
$flexibility = '';
$length = '';
$quantity = '';
$img = 'noFile';

$wid_list = '';
$cid_list = '';


if(isset($_GET['id'])){
	$id = $_GET['id'];
}

if(isset($_POST['name'])){
	$name = $_POST['name'];
}
if(isset($_POST['price'])){
	$price = $_POST['price'];
}
if(isset($_POST['wid'])){
	$wood_id = $_POST['wid'];
}
if(isset($_POST['cid'])){
	$core_id = $_POST['cid'];
}
if(isset($_POST['flex'])){
	$flexibility = $_POST['flex'];
}
if(isset($_POST['length'])){
	$length = $_POST['length'];
}
if(isset($_POST['quantity'])){
	$quantity = $_POST['quantity'];
}
if(isset($_POST['img'])){
	$img = $_POST['img'];
}

if($name!='' && $price!='' && $wood_id!='' && $core_id!='' 
	&& $flexibility!='' && $length!='' && $quantity!=''){

	// update database
	$queryUpdate = "UPDATE wands  SET name='$name',price=$price, wood_id=$wood_id, core_id=$core_id, flexibility=$flexibility,length=$length,quantity=$quantity,img='$img' WHERE id=$id";
	$result = $mysqli->query($queryUpdate);

	if (!$result)
		die($mysqli->error);
	else{
		header("Location: ./manageWand.php");	
		exit;
	}

} else{
	$wRow = findById($mysqli, 'wands', $id);

	// make wand list and core list
	$wid_list = makeList($mysqli, 'wood');
	$cid_list = makeList($mysqli, 'core');

	$woodRow = findById($mysqli, 'wood', $wRow['wood_id']);
	$coreRow = findById($mysqli, 'core', $wRow['core_id']);

	echo "
	<p><h1>Edit wand - Admin</h1>
	<a href='manageWand.php'>Go back</a></p>
	<form method = 'post' action = '' enctype='multipart/form-data'>
		<p>
			<label> Name </label>
			<input type = 'text' name = 'name' value = '{$wRow['name']}'>
		</p>
		<p>
			<label> Price </label>
			<input type = 'number' name = 'price' step='0.01' value = '{$wRow['price']}'>
		</p>
		<div>
			<p> Material </p>
			<p>
				<label> Wood </label>
				<input type = 'text' name = 'wood' value = '{$woodRow['name']}' readonly>
				<select name='wid'>
					$wid_list
				</select>
			</p>
			<p>
				<label> Core </label>
				<input type = 'text' name = 'core' value = '{$coreRow['name']}' readonly>
				<select name='cid'>
					$cid_list
				</select>
			</p>
		</div>
		<p>
			<label> Flexibility (between 1 and 5) </label>
			<input type = 'number' name = 'flex' min='1' max='5' value='3' value = '{$wRow['flexibility']}'>
		</p>
		<p>
			<label> Length (cm) </label>
			<input type = 'number' name = 'length' min='0' step='0.01' value = '{$wRow['length']}'>
		</p>
		<p>
			<label> Quantity </label>
			<input type = 'number' name = 'quantity'  value = '{$wRow['quantity']}'>
		</p>
		<p>
			<label> Insert img URL </label>
			<input type = 'text' name = 'img'  value = '{$wRow['img']}'>
		</p>
		<input type = 'submit' value = 'Edit Wand'>
		<a href = 'deleteWand.php?id=$id'>Delete Wand</a>
	</form>";
}

?>