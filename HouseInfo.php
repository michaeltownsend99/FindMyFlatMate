<!DOCTYPE html>
<html>

<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
body {
    background-color: #c8cbd1;
}
input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
textarea {
    resize: none;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
  
}
div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
body {
    text-align: center;
}
form {
    display: inline-block;
}
</style>

<body>
  <form action ="PutDataInTable.php" method="POST">
  First name: 
  <input type="text" name="firstname"><br>
  Last name: 
  <input type="text" name="lastname"><br>
  House address: 
  <input type="text" name="address"><br>
  Total capacity: 
  <input type="text" name="capacity"><br>
  Spaces: 
  <input type="text" name="spaces"><br>
  Email: 
  <input type="text" name="email"><br>
  Contact number (not necessary): 
  <input type="text" name="number"><br>
  Description:<br>
  <textarea maxlength="280" rows="5" name="description"></textarea><br>
  House password:<br>
  <input type="text" name="pwd"><br>
  <button type="submit" name="submit">Submit</button>
</form>
</body>
</html>

