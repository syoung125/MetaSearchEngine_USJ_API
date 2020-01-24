<?php


////////////////////////////////////////////////////////////////
/*
This page is shown the list of the wands from the admin side.
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

echo "<p><h1>Wand List - Admin</h1>
<a href='shopAdmin.php'>Go home</a></p>";

$wandListTable = '';
$wandListTable = makeWandListTable($mysqli);

echo $wandListTable;


/**
* Return the table html code that shows list of wands
*/
function makeWandListTable($mysqli)
{	
	$querySelect = "SELECT * FROM wands";
	$result = $mysqli->query($querySelect);

	if(!$result)
		die($mysqli->error);	//prints given message while exiting the script 

	$htmlCode = "<table width='80%'>".
	"<tr>
		<th>index</th>
		<th>id</th>
		<th>name</th>
		<th>price</th>
		<th>wood</th>
		<th>core</th>
		<th>flexibility</th>
		<th>length(cm)</th>
		<th>quantity</th>
		<th>img</th>
		<th>Edit</th>
	</tr>";
 	for ($i=0; $i < $result->num_rows; $i++) { 
	 	$result->data_seek($i);	//move to a specific row
	 	$row = $result->fetch_array(MYSQLI_ASSOC); // get the row as an array

	 	// Find wood and core name
		$woodRow = findById($mysqli, 'wood', $row['wood_id']);
		$coreRow = findById($mysqli, 'core', $row['core_id']);
		$woodName = $woodRow['name'];
		$coreName = $coreRow['name'];

	 	$htmlCode .=
	 	"<tr>
			<td>$i</td>
			<td>{$row['id']}</td>
			<td>{$row['name']}</td>
			<td>{$row['price']}</td>
			<td>$woodName</td>
			<td>$coreName</td>
			<td>{$row['flexibility']}</td>
			<td>{$row['length']}</td>
			<td>{$row['quantity']}</td>
			<td><img src='{$row['img']}' alt='wand img' height='100'></td>
			<td><a href='editWand.php?id={$row['id']}'><input type = 'submit' value = 'Edit'></a></td>
		</tr>";
	 	// var_dump($row);
	}	
	$htmlCode .= "</table>";
	return $htmlCode;
}


?>