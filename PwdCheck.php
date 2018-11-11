<?php

$connection=mysqli_connect('35.195.42.162', $username, $password, $database);
	if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
        header("Location: /HouseInfo.php?signup=empty");
        exit();
	}

if (isset($_POST['submit'])) {
	include 'config.inc.php';
	$uid = mysqli_real_escape_string($conn, $_POST['user_name']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//error handlers
	//Check if inputs are empty

	if (empty($uid) || empty($pwd)) {
		  header("Location: ../index.php?login=empty");
	    exit();

	} else {

		$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
		$sql= "SELECT * FROM user WHERE password = '$hashedPwd'";
		$result = mysqli_query($con,$sql);
		$check = mysqli_fetch_array($result);
		if(isset($check)){


		} else {
			header("Location: ../index.php?login=wrongpassword");
			exit();
		}
		
	}
} else {
	header("Location: ../index.php?login=buttonnotpressed");
	exit();
}