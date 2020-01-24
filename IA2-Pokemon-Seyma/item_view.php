<?php

require("db.php");
session_start();

if(isset($_GET["item"])){
	$item = $_GET["item"];

	$pokerows = selectQueryWhere($mysqli, "*", "pokemon", "name", $item);

	$poktypes = selectQueryWhere($mysqli, "*", "poke_types", "pok_id", $item);

	$ty_id = $poktypes["type"];
	$gen_id = $poktypes["generation"];
	$sp_id = $poktypes["special"];

	$t = selectQueryWhere($mysqli, "type_name", "types", "type_id", $ty_id);

	$type = $t["type_name"];

	$g = selectQueryWhere($mysqli, "gen_name", "generations", "generation", $gen_id);

	$generation = $g["gen_name"];

	$s = selectQueryWhere($mysqli, "special", "special", "special_id", $sp_id);

	$special = $s["special"];

	echo "Name: " . $poktypes["name"] . "<br>" . "Shiny: " . $pokerows["shiny"] . "<br> Stock: " . $pokerows["stock"] . "<br> Type: " . $type . "<br> Generation: " . $generation . "<br> Special: " . $special . "<br> Price: " . $pokerows["price"] .
		"<br><a href=\"cart.php?item=" . $pokerows["pokemon_id"] . "\";>Buy Here!</a>";

	echo  '<br><a href="index.php">Go Back</a>';
}

else{
	echo "something went wrong";
}


?>