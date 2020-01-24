<?php

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


$totalPrice = 0;
if(isset($_GET['total'])){
	$totalPrice = $_GET['total'];
}

// When you press purchase button
if(isset($_POST['purchase'])){
	$order_id = addOrder($mysqli, $user_id, $_POST, $totalPrice);
	if($order_id){
		$myBasket = getUserBasket($mysqli, $user_id);
		insertItemToPurchase($mysqli, $order_id, $myBasket);
		deleteItemFromBasket($mysqli, $user_id);

		header("Location: ./shopUser.php");	
		exit;
	}else{
		echo 'purchase process failed';
	}
	
}


$userRow = findById($mysqli, 'users', $user_id);


echo "
<h1>Payment</h1>
<h4>Write your information</h4>"
.getPaymentForm($userRow['name']);




/*********************************************/




/**
* @param {string} uName - user name
*/
function getPaymentForm($uName)
{

	$content = '';
	$content .= "
	<form method = 'post' action = ''>
		<p>
			<label>Name</label>
			<input type = 'text' name = 'name' value = '$uName'>
		</p>
		<p>
			<label>Address</label>
			<input type = 'text' name = 'address'>
		</p>
		<p>
			<label>Postcode</label>
			<input type = 'text' name = 'postcode'>
		</p>
		<p>
			<label>Card info</label>
			<input type = 'text' name = 'card'>
		</p>
		<input type = 'submit' name = 'purchase' value = 'purchase'>
	</form>
	";

	return $content;
}

/**
* Add order to 'orders' table
* @param {string} userId - user id (email)
* @param {Array} oInfo - order information
*/
function addOrder($mysqli, $userId, $oInfo, $totalPrice){
	$id = makeNoneDuplicateId($mysqli, 'orders');
	$date = date("Y-m-d H:i:s");
	$status = 1;

	$stmt = $mysqli->prepare("INSERT INTO orders VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssssss", $id, $userId, $date, $oInfo['name'], $oInfo['address'], $oInfo['postcode'], $totalPrice, $status);
	
	$result = $stmt->execute();
	if($result){	// success -> return order id
		return $id;
	}

	return $result;
}

function getUserBasket($mysqli, $userId){
	$myBasket = array();

	$stmt = $mysqli->prepare("SELECT * FROM basket WHERE user_id = ?");
	$stmt->bind_param("s", $userId);
	$stmt->execute();

	$result = $stmt->get_result();
	while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
    	$myBasket[] = $row;
    }

    return $myBasket;
}



function insertItemToPurchase($mysqli, $orderId, $myBasket){
	foreach ($myBasket as $row) {
		$id = makeNoneDuplicateId($mysqli, 'purchase');
		$date = date("Y-m-d H:i:s");

		$stmt = $mysqli->prepare("INSERT INTO purchase VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssss", $id, $date, $orderId, $row['user_id'], $row['wand_id'], $row['quantity'], $row['price']);

		$result = $stmt->execute();
		if(!$result){
			echo $stmt->error;
		}
	}

}



function deleteItemFromBasket($mysqli, $userId){
	$stmt = $mysqli->prepare("DELETE FROM basket WHERE user_id = ?");
	$stmt->bind_param("s", $userId);
	$result = $stmt->execute();
	if(!$result){
		echo $stmt->error;
	}
}

?>