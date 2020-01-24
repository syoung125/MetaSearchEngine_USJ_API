<?php
////////////////////////////////////////////////////////////////
/*
This page is shown the list of the current user's basket
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

// Delete the old item (Delete record that are certain second old.)
$timeElapsed = 604800;	// 1week(7day) in second

$querySelect = "SELECT * FROM basket WHERE user_id='$user_id'";
$result = $mysqli->query($querySelect); 

if(!$result)
	die($mysqli->error);
else{
	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$bTime = $row['date'];
		$time_diff_sec = timeDiff($bTime);
		if( $time_diff_sec > $timeElapsed){
			// Delete
			$queryDelete = "DELETE FROM basket WHERE id={$row['id']}";
			$result1 = $mysqli->query($queryDelete);

			// increase stuff quantity
			$wandId = $row['wand_id'];
			$wandRow = findById($mysqli, 'wands', $wandId);
			$remaining = $wandRow['quantity'] + $row['quantity'];

			$queryUpdate = "UPDATE wands SET quantity=$remaining WHERE id='$wandId'";
			$result2 = $mysqli->query($queryUpdate);

			if (!$result1 || !$result2)
				die($mysqli->error);

		}
	}
}



// Make the table from current user's basket list
$totalPrice = 0;
$querySelect = "SELECT * FROM basket WHERE user_id='$user_id'";
$result = $mysqli->query($querySelect); 

if(!$result)
	die($mysqli->error);

$basketTable = "
<table width='80%'>
	<tr>
		<th>id</th>
		<th>date</th>
		<th>user id</th>
		<th>product</th>
		<th>quantity</th>
		<th>price</th>
		<th>Delete</th>
	</tr>";

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
	$wandId = $row['wand_id'];
	$wandRow = findById($mysqli, 'wands', $wandId);
	$wandName = $wandRow['name'];

	$basketTable .= "
	<form method = 'post' action = ''>
	<tr>
		<td>{$row['id']}</td>
		<td>{$row['date']}</td>
		<td>{$row['user_id']}</td>
		<td><a href='detailedView.php?id={$wandRow['id']}'>$wandName</a></td>
		<td>{$row['quantity']}</td>
		<td>{$row['price']} €</td>
		<input type='hidden' name='id' value='{$row['id']}'>
		<input type='hidden' name='quantity' value='{$row['quantity']}'>
		<input type='hidden' name='wandId' value='$wandId'>
		<td><input type = 'submit' name = 'delete' value = 'Delete'></td>
	</tr>
	</form>";

	// delete selected basket 
	if(isset($_POST['delete'])){

		$queryDelete = "DELETE FROM basket WHERE id={$_POST['id']}";
		$result1 = $mysqli->query($queryDelete);

		// increase stuff quantity
		$wandRow = findById($mysqli, 'wands', $_POST['wandId']);
		$remaining = $wandRow['quantity'] + $_POST['quantity'];

		$queryUpdate = "UPDATE wands SET quantity=$remaining WHERE id='{$_POST['wandId']}'";
		$result2 = $mysqli->query($queryUpdate);

		if (!$result1 || !$result2)
			die($mysqli->error);
		else{
			header("Location: ./basket.php");	
			exit;
		}
	}

	$totalPrice += $row['price'];
}
$basketTable .= "</table>";


/**************************************************************/

///////////////////
//     Echo      //
///////////////////

echo "<p><h1>My basket</h1>
<a href = 'shopUser.php'>Keep shopping</a></p>"
.$basketTable
."<h3>Total</h3><p>"
.$totalPrice." €
</p><a href='paymentProcess.php?total=$totalPrice'>Pay</a>
";



/**************************************************************/

///////////////////
//   Function    //
///////////////////


/**
* Return time difference between current time and parameter
* @param {string} bTime - format: "Y-m-d H:i:s"
*/
function timeDiff($bTime){
	// get currentTime to string
	$currentTimestamp = time();
	$cTime = date("Y-m-d H:i:s", $currentTimestamp); // time of item in basket

	// Declare and define two dates 
	$date1 = strtotime($bTime);  // time of item in basket(second)
	$date2 = strtotime($cTime);  // current time(second)
	  
	// Formulate the Difference between two dates 
	return $diff = abs($date2 - $date1);  

}
	

?>