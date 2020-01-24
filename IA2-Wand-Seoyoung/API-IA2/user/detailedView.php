<?php

////////////////////////////////////////////////////////////////
/*
* View the details of the item.
* You can buy items from here.
*/
////////////////////////////////////////////////////////////////

require("../db.php");
require("../myFunction.php");

session_start();

$user_id = '';


if(!isset($_SESSION['login']) || !isset($_SESSION['user'])){
	header("Location: ../login.php");	
	exit;
}else if(isset($_SESSION['user'])){
	$user = findById($mysqli, 'users', $_SESSION['user']);
	$user_id = $user['id'];
	if($user['status'] == 0){	// you need to verify email.
		header("Location: ../login.php");	
		exit;
	}
}


/************************************************************/


$id = '';	// selected wand id
$quantity = '';

$itemDetail = '';
$addCart = '';
$addMessage = '';

if(isset($_GET['id'])){
	$id = $_GET['id'];
}

if(isset($_POST['quantity'])){
	$quantity = $_POST['quantity'];
}


if($quantity != ''){
	addToBasket($mysqli, $user_id, $quantity, $id);

	$addMessage = "$quantity wands successfully add in your basket.";
	$addMessage .= "<a href = 'basket.php'>Go to my basket</a>";
}

if($id != ''){
	$row = findById($mysqli, 'wands', $id);

	$wRow = findById($mysqli, 'wood', $row['wood_id']);
	$cRow = findById($mysqli, 'core', $row['core_id']);
	$wName = $wRow['name'];
	$cName = $cRow['name'];


	$itemDetail .= "
	<h2>{$row['name']}</h2>
	<img src='{$row['img']}' alt='wand img' height='100'>
	<h3>{$row['price']} €</h3>
	<h4>Detail (id: {$row['id']})</h4>
	<ul>
		<li>
			<b>Matarial</b>
			<p>wood: $wName<br>core: $cName</p>
		</li>
		<li>
			<b>flexibility</b>
			<p>{$row['flexibility']}</p>
		</li>
		<li>
			<b>length</b>
			<p>{$row['length']}</p>
		</li>
	</ul>
	<h3>Quantity : {$row['quantity']}</h3>";

	$disabled = '';
	if($row['quantity'] <= 0){
		$disabled = 'disabled';
	}

	$addCart = "
	<h1>Add cart</h1>
	<form method = 'post' action = '' enctype='multipart/form-data'>
		<input type = 'number' name = 'quantity' min = '0' max = '{$row['quantity']}' $disabled>
		<input type = 'submit' value = 'Add cart'>
	</form>";
}




echo "<p><h1>Detail page - user</h1>
<a href='shopUser.php'>Go back to the list</a></p>
<div>$itemDetail</div>
<div>$addCart</div>
<p>$addMessage</p>
";



/*********************************************/


function addToBasket($mysqli, $user_id, $quantity, $wand_id){
	$id = makeNoneDuplicateId($mysqli, 'basket');
	$row = findById($mysqli, 'wands', $wand_id);
	$date = date("Y-m-d H:i:s");
	// $date = date(DATE_COOKIE);
	// $date = time();	//timestamp
	// echo(date("d-m-Y h:i:s A", $date)); 

	$price = $row['price'] * $quantity;

	//if quantity>Wand_id[quantity] -> can't buy
	//else buy->decrease quantity
	if($quantity > $row['quantity']){
		// can't buy - but also blocked by limiting input max
		echo "<script type='text/javascript'>alert('out of stock');</script>";
	}else{
		decreaseStock($mysqli, $wand_id, $quantity);
	}

	// put it into basket
	$queryInsert = "INSERT INTO basket VALUES ($id, '$date', '$user_id', $wand_id, $quantity, $price)";
	$result = $mysqli->query($queryInsert);

	if (!$result)
		die($mysqli->error);


	// set cookie
	
}


function decreaseStock($mysqli, $wand_id, $quantity){
	$wRow = findById($mysqli, 'wands', $wand_id);
	$remaining = $wRow['quantity'] - $quantity;

	$queryUpdate = "UPDATE wands  SET quantity=$remaining WHERE id=$wand_id";
	$result = $mysqli->query($queryUpdate);

	if (!$result)
		die($mysqli->error);
}


?>