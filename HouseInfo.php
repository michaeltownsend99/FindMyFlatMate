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

input[type=password], select {
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
      <form action ="PutDataInTable.php" method="POST">
        <label for="fname">First Name</label>

        <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

        <label for="lname">Last Name</label>

        <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

        <label for="address">House Address</label>

        <input type="text" id="address" name="Address" placeholder="Your address.." required>
        <button type="button" name="show">Show on map</button><br>
        <input type="hidden" name="latitude">
        <input type="hidden" name="longitude">

        <label for="capacity">Last Name</label>

        <input type="text" id="capacity" name="Capacity" placeholder="House Capacity.." required>

        <label for="spaces">Spaces Left</label>

        <input type="text" id="spaces" name="spaces" placeholder="Spaces left in the house.." required>

        <label for="email">Email</label>

        <input type="text" id="email" name="email" placeholder="Your email.." required>

        <label for="descreption">Description Of House</label>

        <input type="textarea" maxlength="280" id="descreption" name="descreption" placeholder="A descreption of the house.." required>

        <label for="password">Password</label>

        <input type="password" id="password" name="password" placeholder="Your house password.." required>

        <input type="submit" value="Done">
      </form>
    </div>
</div>

<!-- ADD MAP HERE IN BELOW DIV -->

<div class="column">

</div>
<script>
  var map, infoWindow, marker, geocoder;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 46.3256, lng: 5.36194},
      zoom: 4
    });
    infoWindow = new google.maps.InfoWindow;

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };


        map.setCenter(pos);
        map.setZoom(8);
      }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
      });
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }

    geocoder = new google.maps.Geocoder();

    document.getElementById('show').addEventListener('click', function() {
    geocodeAddress(geocoder, map);
    });

  }

  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
                          'Error: The Geolocation service failed.' :
                          'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
  }

  function geocodeAddress(geocoder, resultsMap) {
    if (marker != null){
      marker.setMap(null);
    }
    var address = document.getElementById('address').value;
    geocoder.geocode({'address': address}, function(results, status) {
      if (status === 'OK') {
        resultsMap.setCenter(results[0].geometry.location);
        marker = new google.maps.Marker({
          map: resultsMap,
          position: results[0].geometry.location
        });
        map.setZoom(16);
        document.getElementById('latitude').value = results[0].geometry.location.lat;
        document.getElementById('longitude').value = results[0].geometry.location.lng;
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
  }
  /*function validate(){
    var address = document.getElementById('address').value;
  }*/
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgYKliWrj5R0-7dXRZIagge7vPkTSzHFY&callback=initMap">
</script>
</body>
</html>
