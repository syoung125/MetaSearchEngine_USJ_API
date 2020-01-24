<?php 

	$hostname="localhost";
	$user="id12341166_wartest";
	$pass="12341234";
	$db="id12341166_warcraft" ;

	$mysqli= new mysqli($hostname, $user, $pass, $db);

	function mysql_fix_string($mysqli,$string){
		if(get_magic_quotes_gpc()){
			$string = stripslashes($string);
		}
		return $mysqli->real_escape_string($string);
	}
	 


?>