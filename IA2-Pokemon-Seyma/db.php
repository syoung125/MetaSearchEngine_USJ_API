<?php

$hostname = 'localhost';
$user = 'id10844796_admin';
$pass = 'admin';
$db = "id10844796_pokemon";

$mysqli = new mysqli($hostname, $user, $pass, $db);

if($mysqli->connect_errno != 0)
	die($mysqli->connect_error);

function mysql_fix_string($mysqli, $string){
	if(get_magic_quotes_gpc()){
		$string = stripslashes($string);
	}
	return $mysqli->real_escape_string($string);
}

function selectQueryWhere($mysqli, $select, $table, $row, $value){
	$query = "SELECT " . $select . " FROM " . $table . " WHERE " . $row . " = " . $value;
	$result = $mysqli->query($query);

	return $result->fetch_assoc();
}

function filterByType($mysqli, $get_name){
		$filter = $_GET[$get_name];

			$query = "SELECT * FROM pokemon";

						if($result = $mysqli->query($query)){
							while ($row = $result->fetch_assoc()) {
								$name = $row["name"];

								$query2 = "SELECT name FROM poke_types WHERE pok_id = " . $name . " AND ".  $get_name ." = " . $filter;

								$result2 = $mysqli->query($query2);

							    while($pokname = $result2->fetch_assoc()){
							    	$price = $row["price"];

							    	$imgurl = $row["img"];

						       		 echo '<div id="item"> <a href="item_view.php?item='. $name .'";>'.$pokname["name"].'</a><br>'.$price.'<br><img src="' . $imgurl .'"width="50%" height="50%"></div>';
							    }

							    $result2->free();
							}
						}
						$result->free();
}

?>