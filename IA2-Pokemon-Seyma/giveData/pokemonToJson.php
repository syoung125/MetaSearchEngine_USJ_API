<?php
    
    header('Access-Control-Allow-Origin: http://apiwandshop.000webhostapp.com');

	require("../db.php");

	$query = "SELECT * FROM pokemon";

	$products = array();

	if(isset($_GET["id"])){
		$query2 = "SELECT * FROM poke_types WHERE type = " . $_GET["id"];
		$result2 = $mysqli->query($query2);

		while($names = $result2->fetch_assoc()){
			$query3 = "SELECT * FROM pokemon WHERE name = " . $names["pok_id"];
			$result3 = $mysqli->query($query3);

			while($row = $result3->fetch_assoc()){
			$row["quantity"] = $row["stock"];
			unset($row["stock"]);

			$row["name"] = $names["name"];
			$row["category"] = "pokemon";
			
			$row["id"] = $row["pokemon_id"];
			unset($row["pokemon_id"]);

			array_push($products, $row);
			}
		}
		$json = json_encode($products);
		echo $json;
	}else{
		if(isset($_GET["min"]) && isset($_GET["max"])){
			if($_GET["min"] == '')
				$query .= " WHERE price < " . $_GET["max"];
			else if($_GET["max"] == '')
				$query .= " WHERE price > " . $_GET["min"];
			else
				$query .= " WHERE price > " . $_GET["min"] . " AND price < " . $_GET["max"];
		}
							 
		if ($result = $mysqli->query($query)) {
			while ($row = $result->fetch_assoc()) {
				$row["quantity"] = $row["stock"];
				unset($row["stock"]);

				$query2 = "SELECT name FROM poke_types WHERE pok_id = " . $row["name"];
				$result2 = $mysqli->query($query2);

				$pokname = $result2->fetch_assoc();

				$row["name"] = $pokname["name"];
				
				//$row["name"] = $names["name"];
    			$row["category"] = "pokemon";
    			
    			$row["id"] = $row["pokemon_id"];
    			unset($row["pokemon_id"]);

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