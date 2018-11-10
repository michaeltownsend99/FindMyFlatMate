<?php
// if (isset($_POST['submit'])) {
//
//
    require 'cred.php';
    $connection=mysqli_connect('35.195.42.162', $username, $password, $database);
		if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
		}

//
//     $longitude = mysqli_real_escape_string($connection, $_POST['longitude']);
//     $latitude = mysqli_real_escape_string($connection, $_POST['latitude']);
//     $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
//     $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
//     $address = mysqli_real_escape_string($connection, $_POST['address']);
//     $capacity = mysqli_real_escape_string($connection, $_POST['capacity']);
//     $spaces = mysqli_real_escape_string($connection, $_POST['spaces']);
//     $email = mysqli_real_escape_string($connection, $_POST['email']);
//     $description = mysqli_real_escape_string($connection, $_POST['description']);
//     $pwd = mysqli_real_escape_string($connection, $_POST['pwd']);
//
//
//     //Error handlers
//     //empty fields check
//
		//
    // if (empty($firstname) || empty($lastname) || empty($address) || empty($capacity) || empty($spaces) || empty($email) || empty($number) || empty($description) || empty($pwd)) {
    //     header("Location: /HouseInfo.php?signup=empty");
    //     exit();
    // } else {
		//
    //     //check email
    //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         header("Location: /HouseInfo.php?signup=empty");
    // 			   exit();
    //     } else {

                //insert the user into the database
            $sql = "INSERT INTO houses (latitude, longitude, totalcapacity, spaces, housepassword, description, address, firstname, lastname, email, phonenumber) VALUES (1.0, 1.0, 4, 2, 'bob', 'describe', '143 road road', 'john', 'smith', 'm@gmail.com', '0')";
						if ($connection->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
            // $stmt->bind_param("ddiissssss", $latitude, $longitude, $totalcapacity, $spaces, $housepassword, $description, $address, $firstname, $lastname, $email);
            // $stmt->execute();
            // header("Location: /main.html"); //change to the page
//             exit();
//         }
//
//     }
//
//
// } else {
//     header("Location: /HouseInfo.php?signup=didntclick");
//     exit();
//
// }
