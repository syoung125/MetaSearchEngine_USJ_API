<?php

require("db.php");
require("sendMail.php");
session_start();

$email = $_GET["email"];
$user_id = $_GET["user"];
$accode = $_GET["act"];

echo "<h1>You succesfully signed up! Go to your email to activate your account and enter the code here:</h1> 
				<form method='post' action=''>
				<p><label>Activation Code: </label>
				<input type='text' name='code'></p>
				<input type='submit'>
				";

		if(isset($_POST["code"])){
			

			$code = $_POST["code"];
					if($code == $accode){
						$stmt2 = $mysqli->prepare("UPDATE users SET ac_status = \"activated\" WHERE user_id = ?");
						$stmt2->bind_param("s", $user_id);
						$stmt2->execute();
						$_SESSION["login"] = 1;
						$_SESSION["user"] = $user;

						$query = "SELECT user_id FROM users WHERE fname = '". $user . "'";
						$result3 = $mysqli->query($query);

						$us_id = $result3->fetch_assoc();
						$user_id = $us_id["user_id"];

						$_SESSION["id"] = $user_id;


						echo "<p>you can now browse the website!
						<a href=\"neuroticalyours.php\"; class=\"button\">Browse</a>";
					}
					else{
						$errno = mysqli_connect_errno();
						//print($errno);
						echo "wrong activation code";
					}
		}

?>