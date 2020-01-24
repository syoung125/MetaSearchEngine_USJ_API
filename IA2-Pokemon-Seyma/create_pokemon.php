<?php

require("db.php");
session_start();

if(isset($_SESSION["user"])){
	if($_SESSION["user"] == "admin"){
			echo "
				<html>
					<head>
						<title>Add Pokemon</title>
					</head>
					<body>
					<form method='post' action=''>
						<p><label>Pokemon ID(1-54): </label>
						<input type='text' name='pid'></p>
						<p><label>Shiny:     </label>
						<input type='checkbox' name='shiny' value='1'>Yes
						<input type='checkbox' name='shiny' value='0'>No
						<p><label>Health Points: </label>
						<input type='number' name='health' min='0' max='100'></p>
						<p><label>Attack Points: </label>
						<input type='number' name='attack' min='0' max='100'></p>
						<p><label>Defense Points: </label>
						<input type='number' name='defense' min='0' max='100'></p>
						<p><label>Gender:     </label>
						<input type='checkbox' name='gender' value='Female'>Female
						<input type='checkbox' name='gender' value='Male'>Male
						<p><label>Price: </label>
						<input type='number' name='price' min='0'></p>
						<p><label>Stock: </label>
						<input type='number' name='stock' min='0'></p>
						<p><label>Img Url: </label>
						<input type='text' name='img'></p>
						<input type='submit'>
					</body>
				</html>";

			if(isset($_POST["pid"]) && isset($_POST["shiny"]) && isset($_POST["health"]) && isset($_POST["attack"]) && isset($_POST["defense"]) && isset($_POST["gender"]) && isset($_POST["price"]) && isset($_POST["stock"]) && isset($_POST["img"])){
				$pid = mysql_fix_string($mysqli, $_POST["pid"]);
				$shiny =  $_POST["shiny"];
				$health =  $_POST["health"];
				$attack = $_POST["attack"];
				$defense = $_POST["defense"];
				$gender = mysql_fix_string($mysqli, $_POST["gender"]);
				$price =  $_POST["price"];
				$stock =  $_POST["stock"];
				$img =  mysql_fix_string($mysqli, $_POST["img"]);

				$id = "NULL";

				if($shiny == 1){
					$shiny = true;
				}
				else{
					$shiny = false;
				}

				$img = $img;
				$gender = $gender;

				$stmt = $mysqli->prepare("INSERT INTO pokemon VALUES (name, shiny, health_point, attack_power, defense_power, price, gender, stock, img) (?, ?, ?, ?, ?, ?, ?, ?, ?)");

				$stmt->bind_param("sssssssss", $pid, $shiny, $health, $attack, $defense, $price, $gender, $stock, $img);

				if($stmt->execute()){
					echo "Pokemon added to the database!";
				}
				else{
					$errno = mysqli_connect_errno();
					print($errno);
					echo "<br>something went wrong";
				}
			}
			else{
				echo "fill everything!";
			}
	}
	else{
		echo 'access denided';
	}
}

?>