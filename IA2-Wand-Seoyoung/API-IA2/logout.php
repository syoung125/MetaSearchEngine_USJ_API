<?php
////////////////////////////////////////////////////////////////
/*
* Log out - destory the session
*/
////////////////////////////////////////////////////////////////

	require_once("db.php");

	session_start();
	$_SESSION = array();
	setcookie(session_name(), '', time()-100000, '/');
	session_destroy();
	echo "
	<h1> logout </h1>
	<a href='home.php'>Go home</a>";
?>