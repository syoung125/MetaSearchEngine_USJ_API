<?php

require("db.php");
session_start();

if(isset($_SESSION["login"]) && $_SESSION["login"] == 1){
	if(isset($_GET["item"])){
		$cid = "NULL";

		$pok_id = $_GET["item"];
		$user = $_SESSION["user"];

		$temp = selectQueryWhere($mysqli, "user_id", "users", "username", '"'.$user.'"');

		$user_id = $temp["user_id"];

		$stmt = $mysqli->prepare("INSERT INTO cart (user_id, pokemon_id, date) VALUES (?, ?, ?)");

		$date = date("Y-m-d H:i:s");

		$stmt->bind_param("sss", $user_id, $pok_id, $date);

		if($stmt->execute()){
			echo "<p>Pokemon has been added to your cart!</p>";

			$query2 = "UPDATE pokemon SET stock = stock - 1 WHERE pokemon_id = " . $pok_id; //bunlari da function
			$mysqli->query($query2);
		}
	}

	echo "<p>Your Cart: </p>";

	$query = "SELECT pokemon_id, cart_id FROM cart WHERE user_id = " . $_SESSION["id"];

	$totalprice = 0;

	echo '<table>
			<tr>
				<th> Pokemon </th>
				<th> Price </th>
			</tr>';

	$pid = array();
	$pidCount = -1;

	if($result = $mysqli->query($query)){
		while($row = $result->fetch_assoc()){
			array_push($pid, $row["pokemon_id"]);
			$pidCount++;

			$hold = selectQueryWhere($mysqli, "name, price", "pokemon", "pokemon_id", $pid[$pidCount]);

			$pname = $hold["name"];
			$price = $hold["price"];

			$hold2 = selectQueryWhere($mysqli, "name", "poke_types", "pok_id", $pname);

			$pokename = $hold2["name"];

			echo '<tr>
					<td> ' . $pokename . '</td>
					<td> ' . $price . '</td>';
			echo '<td><a href="deletedata.php?cart='.$row["cart_id"].'">Delete</a>';

			$totalprice += $price;
		}
		echo '</tr> </table> <br> Total Price: ' . $totalprice;
	}

	$url = '<br><a href="buy.php?pidCount='. $pidCount;

	foreach ($pid as $key => $value) {
		$url .= '&pid' . $key . '=' . $value; 
	}

	echo $url.'">Purchase</a>';
	echo  '<br><a href="index.php">Go Back</a>';
}

?>