<?php
////////////////////////////////////////////////////////////////
/*
* Delete wand from database
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

$id = '';

if(isset($_GET['id'])){
	$id = $_GET['id'];
}

if($id != ''){
	// delete from database
	$queryDelete = "DELETE FROM wands WHERE id=$id";
	$result = $mysqli->query($queryDelete);

	if (!$result)
		die($mysqli->error);
	else{
		header("Location: ./manageWand.php");	
		exit;
	}
}

?>