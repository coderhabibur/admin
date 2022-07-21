<?php 
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'admin';
	date_default_timezone_set('Asia/Dhaka');
	// Create Connection
	$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

	// Check Connetion
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

 ?>