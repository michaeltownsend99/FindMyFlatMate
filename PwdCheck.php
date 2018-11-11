<?php

if (isset($_POST['submit'])) {
	include 'config.inc.php';
	$connection=mysqli_connect('35.195.42.162', $username, $password, $database);
	if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
        header("Location: /HouseInfo.php?signup=empty");
        exit();
	}
	
	$pwd = $_POST['pass'];

	//error handlers
	//Check if inputs are empty

	if (empty($pwd)) {
		  header("Location: /delete.php?password=empty");
	    exit();

	} else {

		$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
		$sql= "SELECT * FROM user WHERE password = '$hashedPwd'";
		$result = mysqli_query($con,$sql);
		$check = mysqli_fetch_array($result);
		if(isset($check)){


		} else {
			header("Location: /delete.php?password=wrongpassword");
			exit();
		}
		
	}
} else {
	header("ocation: /delete.php?password==buttonnotpressed");
	exit();
}