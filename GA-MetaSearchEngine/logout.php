<?php
////////////////////////////////////////////////////////////////
/*
* Log out - destory the session
*/
////////////////////////////////////////////////////////////////

require_once("db.php");

session_start();

// SESSION CHECK
if(!isset($_SESSION['login'])){
	// If it doesn't login, go to login page.
	header("Location: index.php");	
	exit;
}

/**************************************/

$_SESSION = array();
setcookie(session_name(), '', time()-100000, '/');
session_destroy();
echo "
<h1> Logout </h1>
<a href='index.php'>Go home</a>";

?>