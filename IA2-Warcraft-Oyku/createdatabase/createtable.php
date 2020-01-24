<?php

	require("../db.php");

	$address = "CREATE TABLE address (
	address_id INT(30) PRIMARY KEY,
	address_name VARCHAR(30) NOT NULL,
	city_name VARCHAR(30) NOT NULL,
	country VARCHAR(30) NOT NULL,
	postal_code INT(30) NOT NULL
	)";

	if ($mysqli->query($address) === TRUE) {
	    echo "Table Adress created successfully";
	} else {
    	echo "Error creating table: " . $mysqli->error;
	}

	$user = "CREATE TABLE users (
	user_id INT(6) PRIMARY KEY,
	fname VARCHAR(30) NOT NULL,
	lname VARCHAR(30) NOT NULL,
	email VARCHAR(30) NOT NULL,
	password VARCHAR(100) NOT NULL,
	accode VARCHAR(30) NOT NULL,
	ac_status VARCHAR(30) NOT NULL,
	salt VARCHAR(30) NOT NULL,
	address_id INT(30) NOT NULL,
	CONSTRAINT FK_ADDRESS FOREIGN KEY (address_id)
    REFERENCES address(address_id)
	)";

	if ($mysqli->query($user) === TRUE) {
	    echo "Table Users created successfully";
	} else {
    	echo "Error creating table: " . $mysqli->error;
	}

	$class = "CREATE TABLE class (
	class_id INT(30) PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	description VARCHAR(30) NOT NULL
	)";

	if ($mysqli->query($class) === TRUE) {
	    echo "Table Class created successfully";
	} else {
    	echo "Error creating table: " . $mysqli->error;
	}

	$race = "CREATE TABLE race (
	race_id INT(30) PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	faction VARCHAR(30) NOT NULL,
	description VARCHAR(30) NOT NULL
	)";

	if ($mysqli->query($race) === TRUE) {
	    echo "Table Race created successfully";
	} else {
    	echo "Error creating table: " . $mysqli->error;
	}

	$image = "CREATE TABLE image (
	im_id INT(30) PRIMARY KEY,
	im_name VARCHAR(30) NOT NULL
	)";

	if ($mysqli->query($image) === TRUE) {
	    echo "Table Images created successfully";
	} else {
    	echo "Error creating table: " . $mysqli->error;
	}

	$product = "CREATE TABLE product (
	product_id INT(30) PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	price INT(30) NOT NULL,
	img VARCHAR(126) NOT NULL,
	quantity INT(30) NOT NULL,
	class_id INT(30) NOT NULL,
	CONSTRAINT FK_CLASS FOREIGN KEY (class_id)
    REFERENCES class(class_id),
	race_id INT(30) NOT NULL,
	CONSTRAINT FK_RACE FOREIGN KEY (race_id)
    REFERENCES race(race_id),
	age INT(30) NOT NULL,
	gender VARCHAR(30) NOT NULL
	
	)";

	if ($mysqli->query($product) === TRUE) {
	    echo "Table Product created successfully";
	} else {
    	echo "Error creating table: " . $mysqli->error;
	}

	$shopping_list = "CREATE TABLE shopping_list (
	shopping_id INT(30) PRIMARY KEY,
	product_id INT(30),
	CONSTRAINT FK_PRODUCT FOREIGN KEY (product_id)
    REFERENCES product(product_id),
    mseid VARCHAR(126) NOT NULL,
	quantity INT(30) NOT NULL,
	price_total INT(30) NOT NULL,
	user_id INT(30),
	CONSTRAINT FK_USERS FOREIGN KEY (user_id)
    REFERENCES users(user_id)
	)";

	if ($mysqli->query($shopping_list) === TRUE) {
	    echo "Table Shopping List created successfully";
	} else {
    	echo "Error creating table SHOPPP: " . $mysqli->error;
	}


	$orders = "CREATE TABLE orders (
	order_id INT(30) PRIMARY KEY,
	user_id INT(30),
	CONSTRAINT FK_USERSORD FOREIGN KEY (user_id)
    REFERENCES users(user_id),
	product_id INT(30),
	CONSTRAINT FK_PRODUCTORD FOREIGN KEY (product_id)
    REFERENCES product(product_id),
    mseid VARCHAR(126) NOT NULL,
	quantity INT(30) NOT NULL,
	price_total INT(30) NOT NULL,
	ship_date INT(30) NOT NULL,
	ship_adress INT(30) NOT NULL,
	order_date INT(30) NOT NULL

	)";

	if ($mysqli->query($orders) === TRUE) {
	    echo "Table Order created successfully";
	} else {
    	echo "Error creating table ORDER: " . $mysqli->error;
	}


?>



