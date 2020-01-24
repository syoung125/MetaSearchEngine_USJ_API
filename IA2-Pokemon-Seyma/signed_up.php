<?php

require("db.php");
require("sendMail.php");

$email = $_GET["email"];
$user = $_GET["user"];
$act_code = $_GET["act"];

echo "<p>you succesfully signed up! please go to your email to activate your account or enter the code here: 
				<form method='post' action=''>
				<p><label>Activation Code: </label>
				<input type='text' name='code'></p>
				<input type='submit'>
				";

		if(isset($_POST["code"])){
			$code = $_POST["code"];
					if($code == $act_code){
						$stmt = $mysqli->prepare("UPDATE users SET status = \"activated\" WHERE username = ?");
						$stmt->bind_param("s", $user);
						$stmt->execute();

						echo "<p>you can now browse the website!
						<a href=\"index.php\"; class=\"button\">Browse</a>";
					}
					else{
						$errno = mysqli_connect_errno();
						print($errno);
					}
		}

?>