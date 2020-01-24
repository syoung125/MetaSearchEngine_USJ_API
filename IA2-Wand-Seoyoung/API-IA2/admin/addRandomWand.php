<?php
////////////////////////////////////////////////////////////////
/*
* This page add random wands.
*/
////////////////////////////////////////////////////////////////

require("../db.php");
require("../myFunction.php");

session_start();

if(!isset($_SESSION['login'])){
	header("Location: ../login.php");	
	exit;
}else if($_SESSION['user'] != 'admin'){
	echo "<p>You do not have permission.<p>
	<a href='../home.php'>Go home</a>";
	exit;
}

/*********************************************/

$number = 0;
$addSuccessWands = '';

if(isset($_POST['number'])){
	$number = $_POST['number'];
}

if($number > 0){
	$addSuccessWands = addRandomWands($mysqli, $number);
}

echo "<p><h1>Add Random Product</h1>
<a href = 'shopAdmin.php'>Go back</a></p>
<form method = 'post' action = '' enctype='multipart/form-data'>
	<input type = 'number' name = 'number' min = '0'>
	<input type = 'submit' value = 'Insert Wand'>
</form>
<div>$addSuccessWands</div>
";



function addRandomWands($mysqli, $number)
{
	$content = '';

	$randomNames = ["Harry Potter Wand", "Sirius Black wand", "The Elder Wand", "Snape Wand", "Hermione Granger Illuminating Wand", "Seraphina Picquery Wand", "Ron Weasley Wand", "Luna Lovegood Wand", "Magic Wand", "Toy Wand"];
	$randomImg = [
		"https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/13926/16850/api0pqlwc__17243.1529076240.jpg?c=2?imbypass=on",
		"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRu7BxJpO9SV15lErMUoMXJ0ZHvhowgZMZfYuKfyTIf1mgei1xt&s",
		"https://cdn11.bigcommerce.com/s-ojj1lff70z/images/stencil/1280x1280/products/250/5733/24120f01-1b6e-4e56-aecf-df423ec75fd4__78481.1566155832.jpg?c=2&imbypass=on?imbypass=on",
		"https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/16274/21135/09dbcc0b-de33-47b5-94da-ff5d7fb2c20d__24350.1542143436.jpg?c=2&imbypass=on?imbypass=on",
		"https://d8mkdcmng3.imgix.net/cefe/collectables-and-hobbies-props-and-replicas-harry-potter-the-wand-of-ginny-weasley.jpg?auto=format&bg=0FFF&fit=fill&h=600&q=100&w=600&s=4da5078c6dadfdad5c52b5a329c66ab0",
		"https://images-na.ssl-images-amazon.com/images/I/514dFlW6psL._UL1400_.jpg",
		"https://vignette.wikia.nocookie.net/harrypotter/images/9/93/Rowan.png/revision/latest?cb=20120718010524"
	];
	$widArr = getRows($mysqli, 'wood');
	$cidArr = getRows($mysqli, 'core');

	for($i=0;$i<$number;$i++){
		$id = makeNoneDuplicateId($mysqli, 'wands');
		$name = $randomNames[array_rand($randomNames,1)];
		$price = rand(5, 30);
		$wRow = $widArr[array_rand($widArr,1)];
		$wood_id = $wRow['id'];
		$cRow = $cidArr[array_rand($cidArr,1)];
		$core_id = $cRow['id'];
		$flexibility =  rand(1, 5);
		$length =  rand(5, 20);
		$quantity =  rand(10, 50); 
		$img =  $randomImg[array_rand($randomImg,1)];

		// insert into database
		$queryInsert = "INSERT INTO wands(id, name, price, wood_id, core_id, flexibility, length, quantity, img) VALUES ($id, '$name', $price, $wood_id, $core_id, $flexibility, $length, $quantity, '$img')";
		$result = $mysqli->query($queryInsert);

		if (!$result)
			die($mysqli->error);
		else{
			$content .= "<p>$queryInsert</p>";	
		}
	}

	return $content;
}

?>