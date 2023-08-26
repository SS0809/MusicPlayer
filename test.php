<?php

	$servername = "mysql-docker-ckia.onrender.com";	$username = "your_mysql_user_name";

	$password = "your_mysql_root_password";

	$port=3306;

	// Create a connection

	$conn = mysqli_connect($servername,

		$username, $password,$port);

	// Code written below is a step taken

	// to check that our Database is

	// connected properly or not. If our

	// Database is properly connected we

	// can remove this part from the code

	// or we can simply make it a comment

	// for future reference.

	if($conn) {

	echo "success";

	}

	else {

		die("Error". mysqli_connect_error());

	}

?>
