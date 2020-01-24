<?php

	$hostname = "localhost";
	$user = "id12196511_metasearchdb";
	$pass = "metasearchdb";
	$db = "id12196511_metasearchdb";

	$mysqli = new mysqli($hostname, $user, $pass, $db);

	if($mysqli->connect_errno != 0){
		die($mysqli->connect_error);
	}

	function mysql_fix_string($mysqli, $string)
	{
		if (get_magic_quotes_gpc()) {
			$string = stripslashes($string);
		}

		return $mysqli->real_escape_string($string);
	}

?>