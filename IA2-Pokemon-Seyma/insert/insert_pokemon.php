<?php

require("../db.php");

$img = [
	"https://c7.uihere.com/files/773/168/883/pokemon-go-pokemon-yellow-pikachu-ash-ketchum-pikachu-png-thumb.jpg",
	"https://i1.pngguru.com/preview/239/357/121/eeveelution-vaporeon-blue-pokemon-character-png-clipart.jpg",
	"https://p1.hiclipart.com/preview/190/609/86/jolteon-sitting-pokemon-pikachu-png-clipart.jpg",
	"https://img.pngio.com/mew-pokemon-pokedex-generazione-pokemon-png-download-671751-pokemon-mew-png-900_760.jpg",
	"https://www.pikpng.com/pngl/m/522-5220219_oddish-transparent-background-oddish-pokemon-hd-png-download.png",
	"https://i7.pngguru.com/preview/315/836/991/pokemon-diamond-and-pearl-pokemon-platinum-piplup-pokemon-png.jpg",
	"https://www.pikpng.com/pngl/m/574-5748940_sandslash-png-sandslash-pokemon-transparent-png.png"
	];

for($i = 0; $i < 20; $i++) {
	$poke = rand(1, 54);

	$stmt = $mysqli->prepare("INSERT INTO pokemon (name, shiny, health_point, attack_power, defense_power, price, gender, stock, img) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

	$health = rand(0, 100);
	$attack = rand(0, 100);
	$defense = rand(0, 100);

	$price = ($health + $attack + $defense) / 2; 

	if($poke % 4 == 0){
		$shiny = true;
		$price *= 2;
	}
	else{
		$shiny = false;
	}

	if($poke % 2 == 0){
		$gender = "Female";
	}
	else{
		$gender = "Male";
	}

	$stock = rand(0, 10);

	$pokeimg = $img[rand(0, count($img))];

	$id = "NULL";

	$stmt->bind_param("sssssssss", $poke, $shiny, $health, $attack, $defense, $price, $gender, $stock, $pokeimg);
	$stmt->execute();

	$stmt2 = $mysqli->prepare("UPDATE poke_types SET stock = stock + 1 WHERE pok_id = ?");
	$stmt2->bind_param("s", $poke);
	$stmt2->execute();
}

?>