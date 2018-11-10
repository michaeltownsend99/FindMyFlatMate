<?phprequire 'cred.php';?>
<form>
  First name:
  <input type="text" name="firstname"><br>
  Last name:
  <input type="text" name="lastname"><br>
  House address:
  <input type="text" name="firstname"><br>
  Total capacity:
  <input type="text" name="lastname"><br>
  Spaces:
  <input type="text" name="lastname"><br>
  Email:
  <input type="text" name="firstname"><br>
  Contact number (not necessary):
  <input type="text" name="lastname"><br>
  Spaces:
  <input type="text" name="lastname"><br>
</form>
<?php
  $doc = domxml_new_doc("1.0");
  $node = $doc->create_element("houses");
  $parnode = $doc->append_child($node);

  $connection=mysql_connect('wdit34254jcrnon57cewcbigvi@speckle-umbrella-22.iam.gserviceaccount.com', $username, $password);
  if(!$connection)
  {
    die('Not connection: ' . mysql_error());
  }

  $db_selected = mysql_select_db($database, $connection);
  if (!$db_selected)
  {
    die ('Can\'t use db : ' . mysql_error());
  }

  $query = "SELECT * FROM house";
  $result = mysql_query($query);
  if(!$result)
  {
    die('Invalid query: ' . mysql_error());
  }

  header("Content-type: text/xml");

  while($row = @mysql_fetch_assoc("houses"))
  {
    $node = $doc->create_element("house");
    $newnode = $parnode->append_child($node);

    $newnode->set_attribute("id", $row['id']);
    $newnode->set_attribute("address", $row['address']);
    $newnode->set_attribute("latitude", $row['latitude']);
    $newnode->set_attribute("longitude", $row['longitude']);
    $newnode->set_attribute("totalcapacity", $row['totalcapacity']);
    $newnode->set_attribute("spaces", $row['spaces']);
    $newnode->set_attribute("description", $row['description']);
    $newnode->set_attribute("personID", $row['personID']);
  }
  $xmlfile = $doc->dump_mem();
  echo $xmlfile;

 ?>
