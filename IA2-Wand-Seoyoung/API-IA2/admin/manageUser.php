<?php
////////////////////////////////////////////////////////////////
/*
* Show User list
* Enable to delete account
*/
////////////////////////////////////////////////////////////////

require("../db.php");

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


echo "<p><h1>User List - Admin</h1>
<a href='shopAdmin.php'>Go home</a></p>";

$id = '';
$name = '';
// $cumulativePurchase = '';	//누적 판매량에 따른 회원 등급
$code = '';
$status = '';


$querySelect = "SELECT * FROM users";
$result = $mysqli->query($querySelect); 

if(!$result)
	die($mysqli->error);

$userTable = "
<table width='80%'>
	<tr>
		<th>Id(email)</th>
		<th>Name</th>
		<th>Status</th>
		<th>Delete</th>
		<th>Go to basket</th>
	</tr>";

for ($i=0; $i < $result->num_rows; $i++) { 
	$result->data_seek($i);	//move to a specific row
	$row = $result->fetch_array(MYSQLI_ASSOC); // get the row as an array
	
	// not to show admin info
	if($row['id'] == 'admin'){
		continue;
	}

	// Set table row
	$userTable .= "
	<form method = 'post' action = ''>
		<tr>
			<td>{$row['id']}</td>
			<input type='hidden' name='id' value='{$row['id']}'>
			<td>{$row['name']}</td>
			<td>{$row['status']}</td>
			<td><input type = 'submit' name = 'delete' value = 'Delete'></td>
			<td><a href = 'showBasket.php?id={$row['id']}'>Go</a></td>
		</tr>
	</form>";

	// delete selected order 
	if(isset($_POST['delete'])){
		$queryDelete = "DELETE FROM users WHERE id='{$_POST['id']}'";
		$result = $mysqli->query($queryDelete);

		if (!$result)
			die($mysqli->error);
		else{
			header("Location: ./manageUser.php");	
			exit;
		}
	}

}
$userTable .= "</table>";

echo $userTable;



?>