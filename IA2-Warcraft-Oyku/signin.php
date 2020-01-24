<?php

	require("db.php");
	require("sendMail.php");

	
	$fname='';
	$lname='';
	$password='';
	$email='';
	
if(isset($_POST['fname']))
  $fname = $_POST['fname'];

if(isset($_POST['lname']))
  $lname = $_POST['lname'];

if(isset($_POST['password']))
  $password = $_POST['password'];

if(isset($_POST['email']))
  $email = $_POST['email'];



	if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["password"]) && isset($_POST["email"])){
		$id= rand(1,1000);
		$accode = random_bytes(10);
		$accode = bin2hex($accode);
		$salt = random_bytes(10);
		$salt = bin2hex($salt);
		$address=$id;
		$ac_status = 'not_activated';

		$salt_pass = $salt . $password . $salt;
		$salt_pass = hash("haval160,4", $salt_pass);

		$queryInsert0 = "INSERT INTO address(address_id) VALUES ('$address')";
        $result = $mysqli->query($queryInsert0);



        $stmt = $mysqli->prepare("INSERT INTO users VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)");

		$stmt->bind_param("sssssssss", $id, $fname,$lname,$email,$salt_pass,$accode,$ac_status,$salt, $address);

		if($stmt->execute()){
				sendMail($email, $id, $accode);
				//exit();
	
		}

	 	else{
				$errno = mysqli_connect_errno();
				print($errno);
				echo "something went wrong";
				echo $stmt->$error;
		}
	}
		
	else{

		echo "
    <html>
		<head>
			<title>Insert Student</title>
		</head>
		<body>
			<p>Hello enter credentials dostum</p>
			<form method='post' action =''>
				<label>Name </label>
				<input type='text' name='fname'>
				<label>Surname </label>
				<input type='text' name='lname'>
				<label>password </label>
				<input type='text' name='password'>
				<label>email </label>
				<input type='text' name='email'>
				<input type='submit'>
			</form>

		</body>
		</html>


	";
	
	
	}
?>



