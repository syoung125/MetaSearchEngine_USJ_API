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

$query = "SELECT * FROM wands";
if(isset($_GET["min"]) && isset($_GET["max"])){
	if($_GET["min"] == '')
		$query .= " WHERE price < " . $_GET["max"];
	else if($_GET["max"] == '')
		$query .= " WHERE price > " . $_GET["min"];
	else
		$query .= " WHERE price > " . $_GET["min"] . " AND price < " . $_GET["max"];
}
// PERFORM CATEGORY
else if(isset($_GET['id']) && $_GET['id'] != null){
	$query .= " WHERE wood_id = " . $_GET["id"];
}

$result = $mysqli->query($query); //query() : Performs a query on the database
if(!$result)
	die($mysqli->error);	//prints given message while exiting the script 


$products = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC))  {
	// $row["quantity"] = $row["stock"];
	// unset($row["stock"]);
	$row["category"] = "wand";
	$products[] = $row;
}
$result_array = $products;

// PERFORM SEARCH
if(isset($_GET['query']) && $_GET['query'] != null){
	$result_array = searchList($products, $_GET['query']);
}



$myJSON = json_encode($result_array);

echo $myJSON;


/**
* return wand array after searching
*/
function searchList($arr, $word)
{
	$rArr = array();

	for ($i=0; $i < count($arr); $i++) { 
		$row = $arr[$i];
		if(strpos(strtolower($row['name']), strtolower($word)) !== false){
			$rArr[] = $row;
		}
	}

	return $rArr;
}

?>