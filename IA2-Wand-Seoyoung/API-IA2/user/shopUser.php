<?php
////////////////////////////////////////////////////////////////
/*
* View wand list
* You can also search, filter, and sort item.
*/
////////////////////////////////////////////////////////////////

require("../db.php");
require("../myFunction.php");

session_start();
$user_id = '';

if(!isset($_SESSION['login']) || !isset($_SESSION['user'])){
	header("Location: ../login.php");	
	exit;
}else if(isset($_SESSION['user'])){
	$user_id = $_SESSION['user'];
	$user = findById($mysqli, 'users', $user_id);
	if($user['status'] == 0){	// you need to verify email.
		header("Location: ../login.php");	
		exit;
	}
}


/************************************************************/

// make wand list and core list
$wid_list = makeList($mysqli, 'wood');
$cid_list = makeList($mysqli, 'core');

$search = '';

$wood_id = '';
$core_id = '';
$min = '';
$max = '';

$wName = '';
$cName = '';

$sortType = '';

$page = 1;

$wandListHtml = '';


if(isset($_GET['search'])){
	$search = $_GET['search'];
}

if(isset($_GET['wid'])){
	$wood_id = $_GET['wid'];
}
if(isset($_GET['cid'])){
	$core_id = $_GET['cid'];
}
if(isset($_GET['min'])){
	$min = $_GET['min'];
}
if(isset($_GET['max'])){
	$max = $_GET['max'];
}

if(isset($_GET['sort'])){
	$sortType = $_GET['sort'];
}
if(isset($_GET['page'])){
	$page = $_GET['page'];
}

/************************************************************/

$wands = getRows($mysqli, 'wands');
$resultArr = $wands;

$wandListHeader = "<h2>All List</h2>";

if($search != ''){
	$wandListHeader = "<h2>Result of searching '".$search."'</h2>";
	$resultArr = searchList($wands, $search);
}

if($wood_id != '' || $core_id != '' || $min != '' || $max != '' ){

	$wRow = findById($mysqli, 'wood', $wood_id);
	$cRow = findById($mysqli, 'core', $core_id);
	$wName = $wRow['name'];
	$cName = $cRow['name'];

	if($wood_id == '') $wName = 'All';
	if($core_id == '') $cName = 'All';

	$wandListHeader = "<h2>Result of filtering</h2>";
	$resultArr = filteringList($resultArr, $wood_id, $core_id, $min, $max);
}

if($sortType != ''){
	$wandListHeader = "<h2>Sorting</h2>";
	$resultArr = sortList($resultArr, $sortType);
}

/************************************************************/

// pagination mechanism
$showLimit = 6;
$firstPage = 1;
$backPage = $page-1;
$nextPage = $page+1;
$maxPage = intval(count($resultArr)/$showLimit) + 1;
if((count($resultArr)%$showLimit) == 0) $maxPage -= 1;

if($page <= $firstPage){
	$page = $backPage = $firstPage;
}
if($page >= $maxPage){
	$page = $nextPage = $maxPage;
}

if(count($resultArr) > 0){
	$wandListHtml = makeWandList($resultArr, $page, $showLimit);
}else{
	$wandListHtml = 'No Result';
}


// URL
$params = array();
parse_str($_SERVER['QUERY_STRING'], $params);
unset($params['page']);
$urlQuery = '';
$urlQuery = http_build_query($params);




///////////////////////////////////////
/* echo                              */
///////////////////////////////////////


echo "
<style>
	#left{
		display:inline-block;
		float:left;
		width:19%;
		height:85%;
		margin: 0;
		border-top: 1px solid black;
		padding-left: 1%;
	}
	#center{
		display:inline-block;
		float:left;
		width:75%;
		height:85%;
		margin: 0;
		border-top: 1px solid black;
		border-left: 1px solid black;
		padding-left: 4%;
	}
	.grid-container {
	  display: grid;
	  grid-template-columns: auto auto auto;
	  padding: 10px;
	}
</style>
<div><h1>Shop - user</h1>
<label>$user_id </label>
<a href='../logout.php'>Log out</a>
<a href='./basket.php'>My cart</a></div>
<br>
<div id='left'>
		<form method = 'get' action = ''>
			<p><h3>Search</h3>
				<input type = 'text' name = 'search' value = '$search'>
				<input type = 'submit' value = 'search'>

			<p><h3>Filtering</h3>
			<ul>
				<li>
					<p><b> Material </b></p>
					<p>
						<label> Wood : $wName</label>
						<select name='wid'>
							<option value=''>All</option>
							$wid_list
						</select>
					</p>
					<p>
						<label> Core : $cName</label>
						<select name='cid'>
							<option value=''>All</option>
							$cid_list
						</select>
					</p>
				</li>
				<li>
					<p><b> Price </b></p>
					<p>
						<label> min : </label>
						<input type = 'text' name = 'min' value = '$min'>
					</p>
					<p>
						<label> max : </label>
						<input type = 'text' name = 'max' value = '$max'>
					</p>
				</li>
				<input type = 'submit' value = 'filtering'>
			</ul>
			</p>

			<p><h3>Sorting</h3>
				<label>$sortType</label><br>
				<select name='sort'>
					<option value='Default'>Default</option>
					<option value='Asending price'>Asending price</option>
					<option value='Desending price'>Desending price</option>
				</select>
				<input type = 'submit' value = 'sort'>
			</p>
		</form>
</div>

<div id='center'>
	$wandListHeader
	<div style = 'overflow: hidden;' class = 'grid-container'>
		$wandListHtml
	</div>
	<div style = 'text-align: center;'>
		<a href='?$urlQuery&page={$firstPage}'><<</a>
		<a href='?$urlQuery&page={$backPage}'><</a>
		<label>$page</label>
		<a href='?$urlQuery&page={$nextPage}'>></a>
		<a href='?$urlQuery&page={$maxPage}'>>></a>
	</div>
</div>

";




///////////////////////////////////////
/* Functions                         */
///////////////////////////////////////


/**
* return wand array after searching
*/
function searchList($arr, $word)
{
	$rArr = array();

	for ($i=0; $i < count($arr); $i++) { 
		$row = $arr[$i];
		if(strpos(strtolower($row['name']), strtolower($word)) !== false){
			$rArr[] = $row;
		}
	}

	return $rArr;
}


/**
* return wand array after filtering
*/
function filteringList($arr, $wood_id, $core_id, $min, $max){

	$rArr = array();

	for ($i=0; $i < count($arr); $i++) { 
		$row = $arr[$i];

		if(($wood_id != '' && $row['wood_id']!=$wood_id) || ($core_id != '' && $row['core_id']!=$core_id)
			|| ($min != '' && $row['price']<=$min) || ($max != '' && $row['price']>=$max)){
			
		}else{
			$rArr[] = $arr[$i];
		}
	}

	return $rArr;
}


/**
* return wand list to HTML code
*/
function makeWandList($resultArr, $page, $showLimit){
	$content = '';

	for ($i = ($page-1)*$showLimit; $i < (($page-1)*$showLimit + $showLimit) && $i < count($resultArr); $i++) { 
		$row = $resultArr[$i];
		$content .= "
		<div>
			<h3>$i</h3>
			<a href='detailedView.php?id={$row['id']}'>
			<img src='{$row['img']}' alt='wand img' height='100'>
			<h3>{$row['name']}";
		if($row['quantity'] <= 0){
			$content .= "<b> [Sold out]</b>";
		}
		$content .="</h3>
		<p>Price: {$row['price']}  €</p></a></div>";

	}

	return $content;
}


/**
* Sort the list by sortType.
* sortType - 0: ascending, 1: desending 
*/
function sortList($resultArr, $sortType){


	foreach($resultArr as $i_key=>$iRow){
	    foreach($resultArr as $j_key=>$jRow){

	    	if($i_key >= $j_key){
	    		continue;
	    	}

	    	$i_row = $resultArr[$i_key];
			$j_row = $resultArr[$j_key];
	    	
			if(($sortType == 'Asending price' && $i_row['price'] > $j_row['price'])
				||($sortType == 'Desending price' && $i_row['price'] < $j_row['price'])){
				$temp = $resultArr[$i_key];
				$resultArr[$i_key] = $resultArr[$j_key];
				$resultArr[$j_key] = $temp;
			}

	    }
	}


	return $resultArr;
}



?>