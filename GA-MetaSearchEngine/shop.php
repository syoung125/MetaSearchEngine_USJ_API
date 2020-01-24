<?php
////////////////////////////////////////////////
/*
This is the main page of meta-search engine.
*/
////////////////////////////////////////////////

require_once("db.php");
require_once("myFunction.php");
session_start();

$user_id = '';
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


///////////////////////////////////////
/* Echo                              */
///////////////////////////////////////

echo "<script src='shop.js'></script>";

$header_content = "";
$sidebar_content = "";
$product_content = "";



$header_content .= "
<div>
	<h1>Shop</h1>
	<p>Welcom ".$user_id."</p>
	<a href='cart.php'>My cart</a>
	<a href='order.php'>My order</a>
	<a href='logout.php'>Log out</a>
<div><br>
";


$sidebar_content .= "
<br>
<div id='left'>
	<p><h3>Search</h3>
	<form method='POST'>
        <input type=\"text\" id=\"searchStr\">
        <input type=\"button\" value = 'search' onclick=\"mergeProuct(getProduct)\">
    </form>
    <p><h3>Filter</h3>
    <form method='POST'>
        <input type=\"number\" id=\"min\">
        <input type=\"number\" id=\"max\">
        <input type=\"button\" value = 'search' onclick=\"mergeProuct(filterByPrice)\">
    </form>
    <h4>Category</h4>
       <form>
       		<select id='category'>
				<option value='pokemon'>Pokemon</option>
				<option value='wand'>Wand</option>
				<option value='warcraft'>Warcraft</option>
				<input type=\"button\" value = 'search' onclick=\"createFilters()\">
			</select>
    </form>
    <div id='ctgList'></div>
</div>
";



$product_content .= "
<div id='center'>
	<div style = 'overflow: hidden;' class = 'grid-container' id = 'productListDiv'>
	</div>

</div>
";


///////////////////////////////////////
/* echo                              */
///////////////////////////////////////

echo "<link rel='stylesheet' type='text/css' href='shop.css'>"
.$header_content
."<div id='content'>"
.$sidebar_content.$product_content
."</div>";



?>