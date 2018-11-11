<?php

if (isset($_POST['submit'])) {
	require 'cred.php';
	$connection=mysqli_connect('35.195.42.162', $username, $password, $database);
	if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
        header("Location: /HouseInfo.php?signup=empty");
        exit();
	}
	
	$email = $_POST['email'];
	$pwd = $_POST['pass'];

	//error handlers
	//Check if inputs are empty

	if (empty($pwd)) {
		header("Location: /delete.php?password=empty");
	    exit();

	} else {

		
		$sql= "SELECT * FROM houses WHERE housepassword = '$pwd' AND email = '$email'";
		$result = mysqli_query($connection,$sql);
		$check = mysqli_fetch_array($result);
		if(isset($check)){

			//you can delete or add stuff here 
			$sql = "DELETE FROM houses WHERE housepassword = '$pwd' AND email = '$email'";


			if ($connection->query($sql) === TRUE) {
                echo "House Deleted successfully";
                header("Location: /main.html?creation=success"); //change to the page
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
               // header("Location: /main.html?creation=failed"); //change to the page
            }
            $connection->close();
           

		} else {
			header("Location: /delete.php?password=wrongpassword");
			exit();
		}
		
	}
} else {
	header("ocation: /delete.php?password==buttonnotpressed");
	exit();
}