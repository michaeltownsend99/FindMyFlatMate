<!DOCTYPE html>
<html>
  <head>
    
   <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Simple Map</title>
   
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
   
  </head>
  <body>
    <div id="map"></div>
   
    <script>
      
      var map;
     
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
                      var houses = xml.documentElement.getElementsByTagName('house');
                      Array.prototype.forEach.call(houses, function(houseElem) {
                        var address = houseElem.getAttribute('address');
                        var totalcapacity = parseInt(houseElem.getAttribute('totalcapacity'));
                        var spaces = parseInt(houseElem.getAttribute('spaces'));
                        var description = houseElem.getAttribute('description');
                        var firstname = houseElem.getAttribute('firstname');
                        var lastname = houseElem.getAttribute('lastname');
                        var email = houseElem.getAttribute('email');

                        // var latitude = parseFloat(houseElem.getAttribute('latitude'));

                        // var longitude = parseFloat(houseElem.getAttribute('longitude'));


                        var phonenumber = parseInt(houseElem.getAttribute('phonenumber'));


                        var point = new google.maps.LatLng(
                  parseFloat(houseElem.getAttribute('latitude')),
                  parseFloat(houseElem.getAttribute('longitude')));


                        console.log(point.lat());
                        // var point = {lat: parseFloat(houseElem.getAttribute('latitude')), lng: parseFloat(houseElem.getAttribute('longitude')) };

                        var infowincontent = document.createElement('div');
                        var strong = document.createElement('strong');
                        strong.textContent = address

                      

                        infowincontent.appendChild(strong);
                        infowincontent.appendChild(document.createElement('br'));

                

                        var text = document.createElement('text');
                        text.textContent = "Description: " + description
                        infowincontent.appendChild(text);

                        infowincontent.appendChild(document.createElement('br'));
                        var text1 = document.createElement('text');
                        text1.textContent = spaces + "/" + totalcapacity + " free spaces"
                        infowincontent.appendChild(text1);

                        infowincontent.appendChild(document.createElement('br'));
                        var text3 = document.createElement('text');
                        text3.textContent = "Name: " + firstname + " " + lastname
                        infowincontent.appendChild(text3);

                        infowincontent.appendChild(document.createElement('br'));
                        var text2 = document.createElement('text');
                        text2.textContent = "Email: " + email
                        infowincontent.appendChild(text2);

                        console.log(infowincontent);




                        //creation of marker
                        var house = new google.maps.Marker({
                          map: map,
                         // position: {lat: latitude, lng: longitude},
                          position: point,
                           //or marker.setMap(map)
                          icon: image,
                          title: address
                        });

                        console.log(house.position.lat());

                        //on click it opens the window with the contets of //infowincontent
                        house.addListener('click', function() {
                                infoWindow.setContent(infowincontent);
                                infoWindow.open(map, house);
                        });



                      });
                    });
                  }//initMap



                  function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}

             </script>

             <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgYKliWrj5R0-7dXRZIagge7vPkTSzHFY&callback=initMap">
</script>
             </body>     
</html>
