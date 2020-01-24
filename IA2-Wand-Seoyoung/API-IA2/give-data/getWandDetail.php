<?php

header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');
require("../db.php");

// $hostname = "localhost";
// $user = "id12196511_wandshop";
// $pass = "wandshop";
// $db = "id12196511_wandshop";

// $mysqli = new mysqli($hostname, $user, $pass, $db);
// if($mysqli->connect_error) {
//   exit('Could not connect');
// }

$id = "";
if(isset($_GET['id'])){
	$id = $_GET['id'];
}

$result_row = "";

if($id != ""){
	$querySelect = "SELECT * FROM wands WHERE id = $id";
	$result = $mysqli->query($querySelect); //query() : Performs a query on the database
	if(!$result)
		die($mysqli->error);	//prints given message while exiting the script 
	else{
		if($result->data_seek(0)){
			$result_row = $result->fetch_array(MYSQLI_ASSOC);
		}
	}
}

$myJSON = json_encode($result_row);
echo $myJSON;

?>