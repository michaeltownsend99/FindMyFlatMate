<?php
  require 'cred.php';

  function parseToXML($htmlStr)
  {
  $xmlStr=str_replace('<','&lt;',$htmlStr);
  $xmlStr=str_replace('>','&gt;',$xmlStr);
  $xmlStr=str_replace('"','&quot;',$xmlStr);
  $xmlStr=str_replace("'",'&#39;',$xmlStr);
  $xmlStr=str_replace("&",'&amp;',$xmlStr);
  return $xmlStr;
  }

  // Opens a connection to a MySQL server
  $connection=mysqli_connect('35.195.42.162:3306', $username, $password, $database);
  if (!$connection) {
  die('Not connected : ' . mysqli_error());
  }

  // Set the active MySQL database
  $db_selected = mysqli_select_db($database, $connection);
  if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_error());
  }

  // Select all the rows in the markers table
  $query = "SELECT * FROM houses";
  $result = mysqli_query($query);
  if (!$result) {
  die('Invalid query: ' . mysqli_error());
  }

  header("Content-type: text/xml");

  // Start XML file, echo parent node
  echo "<?xml version='1.0' ?>";
  echo '<houses>';
  $ind=0;
  // Iterate through the rows, printing XML nodes for each
  while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<house ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'latitude="' . $row['latitude'] . '" ';
  echo 'longitude="' . $row['longitude'] . '" ';
  echo 'totalcapacity="' . $row['totalcapacity'] . '" ';
  echo 'spaces="' . $row['spcaes'] . '" ';
  echo 'description="' . $row['description'] . '" ';
  echo 'firstname="' . $row['firstname'] . '" ';
  echo 'lastname="' . $row['lastname'] . '" ';
  echo 'email="' . $row['email'] . '" ';
  echo 'phonenumber="' . $row['phonenumber'] . '" ';





  echo '/>';
  $ind = $ind + 1;
  }

  // End XML file
  echo '</houses>';

?>
