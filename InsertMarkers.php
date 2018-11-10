<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <link rel="stylesheet" href="map-icons-master\dist\css\map-icons.css">

  </head>
  <body>
    <div id="map"></div>
     <script src="map-icons-master\dist\js\map-icons.js"></script> 
    <script>
      var map;
      var uluru = {lat: -25.344, lng: 131.036};
      function initMap() {
        
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 59.32522, lng: 18.07002},
          zoom: 4
        });

        var image = {
          url: 'http://1d113c6e.ngrok.io/House.png',
       
          scaledSize: new google.maps.Size(30, 30),
         
        };

        var infoWindow = new google.maps.InfoWindow;


          //PUT THE downloadURL for xml here

          // var address = marker.getAttribute('address');
          // var text = document.createElement('text');
          // text.textContent = address
          //infowincontent.appendChild(text);


        var infowincontent = document.createElement('div');
        var strong = document.createElement('strong');
        strong.textContent = "Information";
        infowincontent.appendChild(strong);
        infowincontent.appendChild(document.createElement('br'));

        var text = document.createElement('text');
        text.textContent = "again more information";

        infowincontent.appendChild(text);

        //creation of marker 
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(59.32522, 18.07002),
          map: map, //or marker.setMap(map)
          icon: image,
          title: "Dickson lives here"
        });

        //on click it opens the window with the contets of //infowincontent
        marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
        });


}




    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgYKliWrj5R0-7dXRZIagge7vPkTSzHFY&callback=initMap"
    async defer></script>
  </body>
</html>