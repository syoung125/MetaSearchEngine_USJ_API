<?php

////////////////////////////////////////////////////////////////
/*
* This page is shown the form to insert the wand.
* You can insert an item(wand).
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


if(isset($_POST['id'])){
	$id = $_POST['id'];
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

	$id = makeNoneDuplicateId($mysqli, 'wands');

	// insert wand into database
	$queryInsert = "INSERT INTO wands VALUES ($id, '$name', $price, $wood_id, $core_id, $flexibility, $length, $quantity, '$img')";
	$result = $mysqli->query($queryInsert);

	if (!$result)
		die($mysqli->error);
	else{
		echo "<p>Insert Wand success</p>
		<a href='insertWand.php'>Insert more</a><br>
		<a href='shopAdmin.php'>Go home</a>";	
	}

} else{
	$wid_list = '';
	$cid_list = '';
	
	// make wand list and core list
	$wid_list = makeList($mysqli, 'wood');
	$cid_list = makeList($mysqli, 'core');

	echo "
	<p><h1>Add Product</h1>
	<a href = 'shopAdmin.php'>Go back</a></p>
	<form method = 'post' action = '' enctype='multipart/form-data'>
		<p>
			<label> Name </label>
			<input type = 'text' name = 'name'>
		</p>
		<p>
			<label> Price </label>
			<input type = 'number' name = 'price' step='0.01'>
		</p>
		<div>
			<p> Material </p>
			<p>
				<label> Wood </label>
				<select name='wid'>
					$wid_list
				</select>
			</p>
			<p>
				<label> Core </label>
				<select name='cid'>
					$cid_list
				</select>
			</p>
		</div>
		<p>
			<label> Flexibility (between 1 and 5) </label>
			<input type = 'number' name = 'flex' min='1' max='5' value='3'>
		</p>
		<p>
			<label> Length (cm) </label>
			<input type = 'number' name = 'length' min='0' step='0.01'>
		</p>
		<p>
			<label> Quantity </label>
			<input type = 'number' name = 'quantity'>
		</p>
		<p>
			<label> Insert img URL </label>
			<input type = 'text' name = 'img'>
		</p>
		<input type = 'submit' value = 'Insert Wand'>
		<a href = 'shopAdmin.php'>Go back</a>
	</form>
	";
}

?>