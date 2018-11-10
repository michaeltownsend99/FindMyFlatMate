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
    <input type="text" name="address">
    <button type="button" name="show">Show on map</button><br>
    <input type="hidden" name="latitude">
    <input type="hidden" name="longitude">
    Total capacity:
    <input type="text" name="capacity"><br>
    Spaces:
    <input type="text" name="spaces"><br>
    Email:
    <input type="text" name="email"><br>
    Description:<br>
    <textarea maxlength="280" rows="5" name="description"></textarea><br>
    House password:<br>
    <input type="text" name="pwd"><br>
    <button type="submit" name="submit">Submit</button>
  </form>
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
