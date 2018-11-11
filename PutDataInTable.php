<?php
if (isset($_POST['submit'])) {

    require 'cred.php';
    $connection=mysqli_connect('35.195.42.162', $username, $password, $database);
		if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
            header("Location: /HouseInfo.php?signup=empty");
            exit();
		}


    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['Address'];
    $capacity = $_POST['Capacity'];
    $spaces = $_POST['spaces'];
    $email = $_POST['email'];
    $description = $_POST['descreption'];
    $pwd = $_POST['password'];


    //Error handlers
    //empty fields check

	
    if (empty($firstname) || empty($lastname) || empty($address) || empty($capacity) || empty($spaces) || empty($email) || empty($description) || empty($pwd)) {
        header("Location: /HouseInfo.php?signup=empty");
        exit();
    } else {
	 //check email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: /HouseInfo.php?signup=empty");
            exit();
        } else {
            //insert the user into the database
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            $sql = "INSERT INTO houses (latitude, longitude, totalcapacity, spaces, housepassword, description, address, firstname, lastname, email, phonenumber) VALUES ('$longitude', '$latitude', '$capacity', '$spaces', '$hashedPwd', '$description', '$address', '$firstname', '$lastname', '$email', '0')";
			if ($connection->query($sql) === TRUE) {
                echo "New record created successfully";
                header("Location: /main.html?creation=success"); //change to the page
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
                header("Location: /main.html?creation=failed"); //change to the page
            }
            $connection->close();
           
            
             exit();
        }

   }
//
} else {
     header("Location: /HouseInfo.php?signup=didntclick");
     exit();

}
