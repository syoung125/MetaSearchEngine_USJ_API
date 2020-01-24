<?php

/**
* Select id by choosing name
* Using in 'insertWand', 'manageOrder'
*/
function makeList($mysqli, $tableName)
{	
	$list = "";
	$query = "SELECT * FROM $tableName";
	$result = $mysqli->query($query);

	if(!$result)
		die($mysqli->error);

	for ($i=0; $i < $result->num_rows; $i++) { 
		$result->data_seek($i);
		$row = $result ->fetch_array(MYSQLI_ASSOC);
		$tid = $row['id'];
		$tname = $row['name'];
		$list .= "<option value='$tid'>$tname</option>";
	}
	return $list;
}

/**
* Return the id that it's not duplicate
*/
function makeNoneDuplicateId($mysqli, $tableName){

	$randId = 0;
	while(1){
		$randId = rand(1,9999);
		
		/* Check duplication */
		$isExist = findById($mysqli, $tableName, $randId);
		if($isExist == false){
			return $randId;
		}
	}
	
}

/**
* This function return the proper row of the given id
* ex) Find out wand's Name in wands table by wand_id
*/
function findById($mysqli, $tableName, $id){
	$querySelect = "SELECT * FROM $tableName WHERE id = '{$id}'";
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

/**
* This function return the every rows of table
*/
function getRows($mysqli, $tableName){
	$arr = array();

	$querySelect = "SELECT * FROM $tableName";
	$result = $mysqli->query($querySelect); //query() : Performs a query on the database
	if(!$result)
		die($mysqli->error);	//prints given message while exiting the script 

	for ($i=0; $i < $result->num_rows; $i++) { 
		$result->data_seek($i);	//move to a specific row
		$row = $result->fetch_array(MYSQLI_ASSOC); // get the row as an array
		$arr[] = $row;
	}

	return $arr;
}

/**
* Hashing the password, return the hashing password.
*/
function passHashing($pass)
{
	$hashPass = md5($pass); 
	return $hashPass;
}



?>