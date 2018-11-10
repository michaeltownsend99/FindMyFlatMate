<?php
if (isset($_POST['submit'])) {


	include 'cred.php';

    $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);
    $latitude = mysqli_real_escape_string($conn, $_POST['latitude']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
    $spaces = mysqli_real_escape_string($conn, $_POST['spaces']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    $connection = new mysqli('35.195.42.162:3306', $username, $password, $database);
    //Error handlers
    //empty fields check


    if (empty($firstname) || empty($lastname) || empty($address) || empty($capacity) || empty($spaces) || empty($email) || empty($number) || empty($description) || empty($pwd)) {
        header("Location: /HouseInfo.php?signup=empty");
	    exit();
    } else {

    	//check email
    	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    		header("Location: /HouseInfo.php?signup=empty");
    	    exit();
		} else {
                
                //insert the user into the database
        $stmt = $connection->prepare("INSERT INTO houses (latitude, longitude, totalcapacity, spaces, housepassword, description, address, firstname, lastname, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ddiissssss", $latitude, $longitude, $totalcapacity, $spaces, $housepassword, $description, $address, $firstname, $lastname, $email);
            $stmt->execute();                     
            header("Location: /main.html"); //change to the page
            exit();
        }	
    		
    
    }
    


} else {
	header("Location: /HouseInfo.php");
	exit();

}