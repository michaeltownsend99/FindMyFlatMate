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
      src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js";
      var map;
      var uluru = {lat: -25.344, lng: 131.036};
      function initMap() {

        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 59.32522, lng: 18.07002},
          zoom: 4
        });

        var image = {
          url: 'http://ecefff6c.ngrok.io/House.png',

          scaledSize: new google.maps.Size(30, 30)

        };

        var infoWindow = new google.maps.InfoWindow;


          //PUT THE downloadURL for xml here

          // Change this depending on the name of your PHP or XML file
          downloadUrl('getData.php', function(data) {
                      var xml = data.responseXML;
                      var markers = xml.documentElement.getElementsByTagName('house');
                      Array.prototype.forEach.call(houses, function(houseElem) {
                        var address = houseElem.getAttribute('address');
                        var totalcapacity = parseInt(houseElem.getAttribute('totalcapacity'));
                        var spaces = parseInt(houseElem.getAttribute('spaces'));
                        var description = houseElem.getAttribute('description');
                        var firstname = houseElem.getAttribute('firstname');
                        var lastname = houseElem.getAttribute('lastname');
                        var email = houseElem.getAttribute('email');
                        var phonenumber = parseInt(houseElem.getAttribute('phonenumber'));
                        var point = new google.maps.LatLng(
                            parseFloat(houseElem.getAttribute('latitude')),
                            parseFloat(houseElem.getAttribute('longitude')));

                        var infowincontent = document.createElement('div');
                        var strong = document.createElement('strong');
                        strong.textContent = address
                        infowincontent.appendChild(strong);
                        infowincontent.appendChild(document.createElement('br'));

                        var text = document.createElement('text');
                        text.textContent = "Descreption: " + descreption
                        infowincontent.appendChild(text);

                        infowincontent.appendChild(document.createElement('br'));
                        var text1 = document.createElement('text');
                        text1.textContent = spaces + "/" + totalcapacity + " free spaces"
                        infowincontent.appendChild(text1);

                        infowincontent.appendChild(document.createElement('br'));
                        var text3 = document.createElement('text');
                        text1.textContent = "Name: " + firstname + " " + lastname
                        infowincontent.appendChild(text3);

                        infowincontent.appendChild(document.createElement('br'));
                        var text2 = document.createElement('text');
                        text1.textContent = "Email: " + email
                        infowincontent.appendChild(text2);




                        //creation of marker
                        var marker = new google.maps.Marker({
                          position: point,
                          map: map, //or marker.setMap(map)
                          icon: image,
                          title: address
                        });


                        //on click it opens the window with the contets of //infowincontent
                        marker.addListener('click', function() {
                                infoWindow.setContent(infowincontent);
                                infoWindow.open(map, marker);
                        });



                      });
                    });
                  }//initMap
</html>
