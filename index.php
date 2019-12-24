<?php


require_once('geoplugin.class.php');
$geoplugin = new geoPlugin();

$geoplugin->locate();
?>
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
		margin-top: 150px;
		padding: 0 10px;
		height: 350px;
		width: 100%;
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
          center: {lat:<?php echo $geoplugin->latitude; ?>, lng:<?php echo $geoplugin->longitude;?>},
          zoom: 10
		});
		var myLatLng = {lat:<?php echo $geoplugin->latitude;?>,lng:<?php echo $geoplugin->longitude;?>}
		var marker = new google.maps.Marker({
    	position: myLatLng,
    	map: map,
    	title: 'Hello World!'
  });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPS1S7UUYaqZ3-SaYc-PUByxyRckuuHGI&callback=initMap"
    async defer></script>
  </body>
</html>


