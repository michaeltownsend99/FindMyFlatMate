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

input[type=textarea], select {
    resize: none;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: black;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: gray;
}


.area {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;

}

/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 50%;
    padding: 10px;
}


body {
    background-color: black;
}
</style>
<body>

<div class="column">
    <div class="area">
      <form action="/action_page.php">
        <label for="fname">First Name</label>

        <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

        <label for="lname">Last Name</label>

        <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

        <label for="address">House Address</label>

        <input type="text" id="address" name="Address" placeholder="Your address.." required>
        
        <label for="capacity">Last Name</label>

        <input type="text" id="capacity" name="Capacity" placeholder="House Capacity.." required>

        <label for="spaces">Spaces Left</label>

        <input type="text" id="spaces" name="spaces" placeholder="Spaces left in the house.." required>

        <label for="email">Email</label>

        <input type="text" id="email" name="email" placeholder="Your email.." required>

        <label for="phone">Phone Number (optional)</label>

        <input type="text" id="phone" name="phone" placeholder="Your phone number..">

        <label for="descreption">Description Of House</label>

        <input type="textarea" maxlength="280" id="descreption" name="descreption" placeholder="A descreption of the house.." required>
      
        <input type="submit" value="Done">
      </form>
    </div>
</div>

<!-- ADD MAP HERE IN BELOW DIV -->

<div class="column">

</div>
</body>
</html>
