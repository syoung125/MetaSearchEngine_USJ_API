<?php

require("db.php");
session_start();

if(isset($_SESSION["user"])){
	if($_SESSION["user"] == "admin"){
		echo '<table>
			<tr>
				<th> user_id </th>
				<th> username </th>
				<th> password </th>
				<th> salt </th>
				<th> e-mail </th>
				<th> status </th>
			</tr>';

	$query = "SELECT * FROM users";

	if($result = $mysqli->query($query)){
		while($row = $result->fetch_assoc()){
			echo '<tr>
					';
			foreach ($row as $value) {
				echo '<td>'.$value.'</td>';
			}
			echo '<td><a href="deletedata.php?user='.$row["user_id"].'">Delete</a>';
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