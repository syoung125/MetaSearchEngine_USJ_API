<?php
////////////////////////////////////////////////////////////////
/*
* Main page of admin
*/
////////////////////////////////////////////////////////////////

session_start();

if(!isset($_SESSION['login'])){
	header("Location: ../login.php");	
	exit;
}else if($_SESSION['user'] == 'admin'){
	echo "
	<p>
		<h1>Shop - admin</h1>
		<a href='../logout.php'>Log out</a>
	</p>

	<ol>
		<li><a href='insertWand.php'>Add wand</a></li>
		<li><a href='addRandomWand.php'>Add random wand</a></li>
		<li><a href='manageWand.php'>Manage wand list</a></li>
		<li><a href='manageOrder.php'>Manage order list</a></li>
		<li><a href='manageUser.php'>Manage user list</a></li>
	</ol>
	";
}else{
	echo "<p>You do not have permission.<p>
	<a href='../home.php'>Go home</a>";
}


?>