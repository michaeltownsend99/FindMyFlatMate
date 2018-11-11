<!DOCTYPE html>
<html>
<style>


input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=email], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    /* display: inline-block; */
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}





input[type=submit]:hover {
    background-color: gray;

}


input[type=submit] {
  width: 100%;
  background-color: very-light-gray;
  color: ;
  padding: 14px 20px;
  margin: 8px 0;
  border: 1px solid light-gray;
  border-radius: 4px;
  cursor: pointer;
}


.area {
    border-radius: 5px;
    background-color: light-gray;
    padding: 20px;
    padding-left: 20%;
    padding-right: 20%;
    padding-top: 200px;
}

/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 40%;
    padding: 10px;
    height: auto;
}

.area label
{
  font-size: 20px;
}

body {
    background-color: white;
    padding-left: 30%;
    padding-right: 30%;
    padding-top: 10%;
}


}
</style>
<body>
    <center>
    <div class="area">
      <form action ="PwdCheck.php" method="POST">
         <label for="email">Enter the house details: </label>

        <input type="email" id="email" name="email" placeholder="Your email.." required>

        <!-- <label for="pass">House Password</label> -->

        <input type="password" id="pass" name="pass" placeholder="Your house password.." required>

        <input type="submit" name="submit" value="Delete">
      </form>
    </div>
    </center>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgYKliWrj5R0-7dXRZIagge7vPkTSzHFY&callback=initMap">
</script>
</body>
</html>
