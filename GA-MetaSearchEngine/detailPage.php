<?php
session_start();
require_once("db.php");
require_once("myFunction.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src='shop.js'></script>
</head>
<body>
<?php
////////////////////////////////////////////////
/*
This will show prodcuct detail.
*/
////////////////////////////////////////////////

	

	$user_id = '';	// user email
	// SESSION CHECK
	if(isset($_SESSION['login']) && ($_SESSION['login'] == 1)){
		$user_id = $_SESSION['user'];
		if(!checkUserVerification($mysqli, $user_id)){
			echo "You should verify your email. Check email.";
		}
	}else{
		// If it doesn't login, go to login page.
		header("Location: index.php");	
		exit;
	}

	/**************************************/

	$category = "";
	$id = "";	// product id
	$rlink = "";	//reduce stock Link
	if(isset($_GET['category']) && isset($_GET['id'])){
		$category = $_GET['category'];
		$id = $_GET['id'];
		echo $category.", ".$id;
	}

	if($category == 'wand'){
		$rlink = "http://apiwandshop.000webhostapp.com/API-IA2/give-data/addtoCart.php";
	}else if($category == 'pokemon'){
		$rlink = "https://apispamuk.000webhostapp.com/IA2/giveData/addtoCart.php";
	}else if($category == 'warcraft'){
		$rlink = "https://oykuyamako.000webhostapp.com/IA2/Warcraft/addtoCart.php";
	}

///////////////////////////////////////
/* Echo                              */
///////////////////////////////////////

	echo '
	<h1>Detail</h1>
	<a onclick="mergeProuct(getProduct)">Go back</a>
	<button type="button" value = "show" onclick="getProductDetail(\''.$category.'\', \''.$id.'\')"></button>
	<h2 id="pName"></h2>
	<img src="" id="pimg" width = "200">
	<h2 id="pPrice"></h2>
	<h2 id="pQuantity"></h2>
	<div id="detail"></div>
	<br>'
	."
	<h2>Add cart</h2>
	<form method = 'post' action = ''>
		<input type = 'number' name = 'quantity' id='bQuantity'>
		<input type = 'button' value = 'Add cart' onclick = \"reduceStock('$rlink','$user_id','$id')\">
	</form>
	<p id='giveMessage'></p>
	";
?>
</body>
</html>