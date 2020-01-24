<?php
////////////////////////////////////////////////////////////////
/*
* You can change the password, and this form will be sent from email when you request.
*/
////////////////////////////////////////////////////////////////

require("../db.php");
require("../myFunction.php");

$pass1 = '';
$pass2 = '';

$email = '';

if(isset($_GET['email'])){
	$email = $_GET['email'];
}

if(isset($_POST['pass1']) && isset($_POST['pass2'])){
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	chagePassword($mysqli, $email, $pass1, $pass2);
}

echo "
<h1>Change Password</h1>
<form method='post' action=''>
	<p><label>New password: </label>
	<input type='password' name='pass1'></p>
	<p><label>Type again: </label>
	<input type='password' name='pass2'></p>
	<input type='submit' value='Change'>
</form>
";

function chagePassword($mysqli, $email, $pass1, $pass2)
{
	$userRow = findById($mysqli, 'users', $email);
	if($userRow != false){
		if($pass1 == $pass2){
			$pass = passHashing($pass1);
			$queryUpdate = "UPDATE users SET pass='$pass' WHERE id='$email'";
			$result = $mysqli->query($queryUpdate);

			if (!$result)
				die($mysqli->error);

			echo "<p>Chage password successfully.</p>
			<a href='../login.php'>Login</a>";
		}else{
			echo "Both passwords aren't same.";
		}
	}
}

?>