<?php
header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');
	require("db.php");

	$query = "SELECT * FROM product";

	$products = array();
	if(isset($_GET["id"])){
		$query2 = "SELECT * FROM product WHERE race_id = " . $_GET["id"];
		//$result2 = $mysqli->query($query2);
        if ($result2 = $mysqli->query($query2)) {
		while ($row = $result2->fetch_assoc()) {
	        
		$row["category"] ="warcraft";
			$row["id"] = $row["product_id"];
			unset($row["product_id"]);

			array_push($products, $row);
			}
		}
		$json = json_encode($products);
		echo $json;
	}else{
						 
	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
			$row["id"] = $row["product_id"];
			$row["category"] ="warcraft";
			unset($row["product_id"]);
		
			array_push($products, $row);
		}
		$result->free();
	}

	if(isset($_GET["query"])){
		if($_GET["query"] == ""){
			$json = json_encode($products);
			echo $json;
		}else{
		$search = searchProducts($_GET["query"], $products);
		$json = json_encode($search);
		echo $json;
		}
	}else{
		$json = json_encode($products);
		echo $json;
	}
}
function searchProducts($search, $arr){
	$rArr = array();

	for ($i = 0; $i < count($arr); $i++) { 
		$row = $arr[$i];
		if(strpos(strtolower($row['name']), strtolower($search)) !== false){
			$rArr[] = $row;
		}
	}
	return $rArr;
}



?>