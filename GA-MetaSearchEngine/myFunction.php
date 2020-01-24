<?php

/**
* This function return the proper row of the given property
*/
function findByProperty($mysqli, $tableName, $property, $value){
	$querySelect = "SELECT * FROM $tableName WHERE $property = '$value'";
	$result = $mysqli->query($querySelect);
	if(!$result)
		die($mysqli->error);
	else{
		if($result->data_seek(0)){
			$row = $result->fetch_array(MYSQLI_ASSOC);
			return $row;
		}
	}
	return false;	// Couldn't find
}


function checkUserVerification($mysqli, $user_id){
	$user = findByProperty($mysqli, 'users', 'email', $user_id);
	if($user['status'] == 1){	// you need to verify email.
		return true;
	}
	return false;
}

?>