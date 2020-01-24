<?php

require("db.php");
session_start();

if(isset($_SESSION["user"])){
	if($_SESSION["user"] == "admin"){
		echo '<table>
			<tr>
				<th> purchase_id </th>
				<th> user_id </th>
				<th> pokemon_id </th>
				<th> address </th>
				<th> status </th>
			</tr>';

	$query = "SELECT * FROM purchases";

	if($result = $mysqli->query($query)){
		while($row = $result->fetch_assoc()){
			echo '<tr>
					';
			foreach ($row as $value) {
				echo '<td>'.$value.'</td>';
			}
			echo '<td><a href="editdata.php?purchase='.$row["purchase_id"].'">Edit</a>';
			echo '<td><a href="deletedata.php?purchase='.$row["purchase_id"].'">Delete</a>';
		}
		echo '</tr> </table> <br>';
		echo '<a href="index_admin.php">Go Back</a>';
	}

	}
	else{
		echo "access denied";
	}
}

else{
	echo "access denied";
}