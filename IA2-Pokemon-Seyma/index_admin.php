<?php

require("db.php");
session_start();

if(isset($_SESSION["user"])){
	if($_SESSION["user"] == "admin"){
		echo '<a href="create_pokemon.php"; class="button">Add Pokemon</a><br>';
		echo '<a href="insert/insert_pokemon.php"; class="button">Generate Data</a><br>';
		echo '<a href="manage_user.php"; class="button">Manage Users</a><br>';
		echo '<a href="manage_order.php"; class="button">Manage Orders</a><br>';
		echo '<a href="logout.php"; class="button">Logout</a><br>';
	}
	else{
		echo "access denied";
	}
}

else{
	echo "access denied";
}