<?php  
require("db.php"); 
session_start();

if(isset($_SESSION["user"])){
	if($_SESSION["user"] == "admin"){
		header("Location: index_admin.php");
	}
}

?>


<html>
	<head>
		<title>Welcome</title>
		<link rel="stylesheet" href="style.css">

		<style>
			html, body{
			height: 100%;
			margin: 0px;
			}
			#top{
				text-align: right;
				background-color: lightgreen;
			}
			#middle{

			}
			#left{
				display:inline-block;
				float:left;
				width:20%;
				background-color: pink;
			}
			#center{
				display:inline-block;
				float:right;
				width:80%;
				background-color:powderblue;
			}
		</style>
	</head>
	<body>
		<div id="top"> 
			<form action="">
				<input type="text" placeholder="search pokemon" name="search">
     			<button type="submit">Search</button>
     		</form>
     		<form method="post" action="" id="orderform">
     			<select name="order" form="orderform">
     				<option value="ascending">ascending price</option>
     				<option value="descending">descending price</option>
     			</select>
     			<input type="submit">
     		</form>
			<?php 
				if(isset($_SESSION["login"]) && $_SESSION["login"] == 1){
					echo "<p>Welcome back " . $_SESSION["user"];
					echo '<br>
					<a href="cart.php"; class="button">Your Cart</a>
					<a href="logout.php"; class="button">Logout</a>';
				}
				else{
					echo '
						<p>Are you a member?</p>
						<a href="sign_up.php"; class="button">Sign Up</a>
						<a href="login.php"; class="button">Login</a>
					';
				}
			?>
		</div>
		<div id="middle">
			<div id="left">
				<form action="">
				<?php
					echo '<p> TYPES </p>';
					$t_query = "SELECT * FROM types";
					if ($t_result = $mysqli->query($t_query)) {
					    while ($t_row = $t_result->fetch_assoc()) {
					        $t_id = $t_row["type_id"];
					        $t_name = $t_row["type_name"];

					        echo '<input type="radio" name="type" value="'. $t_id . '">'. $t_name . '</br>';
					    }
					$t_result->free();
					}
					echo '<p> GENERATIONS </p>';
					$g_query = "SELECT * FROM generations";
					if ($g_result = $mysqli->query($g_query)) {
					    while ($g_row = $g_result->fetch_assoc()) {
					        $g_id = $g_row["generation"];
					        $g_name = $g_row["gen_name"];

					        echo '<input type="radio" name="generation" value="'. $g_id . '">'. $g_name . '</br>';
					    }
					$g_result->free();
					}
					echo '<p> SPECIAL QUALITIES </p>';
					$s_query = "SELECT * FROM special";
					if ($s_result = $mysqli->query($s_query)) {
					    while ($s_row = $s_result->fetch_assoc()) {
					        $s_id = $s_row["special_id"];
					        $s_name = $s_row["special"];

					        echo '<input type="radio" name="special" value="'. $s_id . '">'. $s_name . '</br>';
					    }
					$s_result->free();
					}
				?>
				<input type="submit" value="Submit">
				</form>
			</div>
			<div id="center">
				<?php
			if(isset($_GET['type'])){
						filterByType($mysqli, 'type');
					}
					else if(isset($_GET['generation'])){
						filterByType($mysqli, 'generation');
					}
					else if(isset($_GET['special'])){
						filterByType($mysqli, 'special');
					}
					else if(isset($_GET['search'])){
						$search = $_GET['search'];

						$query = "SELECT pok_id, name FROM poke_types WHERE name LIKE \"" . $search . "\"";
						$result = $mysqli->query($query);
						$hold = $result->fetch_assoc();

						$name = $hold["name"];
						$pid = $hold["pok_id"];

						$query2 = "SELECT price, img FROM pokemon WHERE name = " . $pid;
						$result2 = $mysqli->query($query2);

						while($row = $result2->fetch_assoc()){
							$price = $row["price"];

							$imgurl = $row["img"];

						    echo '<div id="item"> <a href="item_view.php?item='. $pid .'";>'.$name.'</a><br>'.$price.'<br><img src="' . $imgurl .'"width="50%" height="50%"></div>';
						}

						$result2->free();		
					}
					else if(isset($_POST["order"])){
					    		if($_POST["order"] == "ascending"){
							$query = "SELECT * FROM pokemon ORDER BY price ASC";
						}
						else{
							$query = "SELECT * FROM pokemon ORDER BY price DESC";
						}
						 
						if ($result = $mysqli->query($query)) {
						    while ($row = $result->fetch_assoc()) {
						        $name = $row["name"];
						        
						        $query2 = "SELECT name FROM poke_types WHERE pok_id = " . $name;
						        $result2 = $mysqli->query($query2);

						        $pokname = $result2->fetch_assoc();

						        $price = $row["price"];
						        $imgurl = $row["img"];

						        echo '<div id="item"> <a href="item_view.php?item='. $name .'";>'.$pokname["name"].'</a><br>'.$price.'<br><img src="' . $imgurl .'"width="50%" height="50%"></div>';

						        $result2->free();
						    }
						$result->free();
						}
					}
					else{
						$query = "SELECT * FROM pokemon";
						 
						if ($result = $mysqli->query($query)) {
						    while ($row = $result->fetch_assoc()) {
						        $name = $row["name"];
						        
						        $query2 = "SELECT name FROM poke_types WHERE pok_id = " . $name;
						        $result2 = $mysqli->query($query2);

						        $pokname = $result2->fetch_assoc();

						        $price = $row["price"];
						        $imgurl = $row["img"];

						        echo '<div id="item"> <a href="item_view.php?item='. $name .'";>'.$pokname["name"].'</a><br>'.$price.'<br><img src="' . $imgurl .'"width="50%" height="50%"></div>';

						        $result2->free();
						    }
						$result->free();
						}
					}
				?>
			</div>
		</div>
	</body>
