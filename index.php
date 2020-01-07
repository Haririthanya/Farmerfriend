
<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: mysignin.html');
	exit();
}

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
      .navbar {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        flex-wrap: wrap;
        background-color: #3CB371;
        width: 100%;
        height: 60px;
        z-index: 1;
      }
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
		margin-top: 30px;
		padding: 0 10px;
		height:700px;
    width: 100%;
    background-repeat: no-repeat;
        -webkit-background-size :cover;
        background-size: cover;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Montserrat','sans-serif';
        scroll-behavior: smooth;
      }
      
      .nav {
        display: flex;
        justify-content: right;
        list-style: none;
        margin-right: 15%;
        }
        .logo {
        flex: 1 1 auto;
        margin-left: 10%;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: bold;
        font-size: 20px;
        }
        a{
        margin: 15px;
        color: whitesmoke;
        text-decoration: none;
        text-transform: uppercase;
        }
        a:hover {
        color: #000;
        }
        .home-area,.services-area,.about-area,.contact-area {
          position: relative;
          display: flex;
          justify-content: space-around;
          align-items: center;
          flex-wrap: wrap;
          flex-direction: row;
          height: 400px;
          width: 100%;
        }
        .text-area {
          width: 65%;
          height: 100%;
        }
        h1 {
          font-size: 30px;
          font-family: 'Montserrat','sans-serif';
        }
        p {
          font-size: 20px;
          line-height :25px;
        }
        .home-area, .about-area {
          background: #3CB371;
          color: #ffffff;
        }
        .contact-area, .services-area {
          background: #ffffff;
          color: #3CB371;
        }
    </style>
  </head>
  <body>
  
  <div class="navbar">
      <a href="#" class="logo">Farmer's Friend</a>
      <ul class="nav">
        <li><a href="#home">Home</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
  

    </div>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:10.9375, lng:76.9568},
          zoom: 10
    });
    	var myLatLng = {lat:10.9375,lng:76.9568}
		var marker = new google.maps.Marker({
    	position: myLatLng,
    	map: map,
    	title: 'Hello World!'
  });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPS1S7UUYaqZ3-SaYc-PUByxyRckuuHGI&callback=initMap"
    async defer></script>
    <div class="home-area" id="home">
      <div class="text-area">
        <p> <br><br><h1>HOME</h1><br> We at Farmer's Friend are here to help both the farmer and customer by connecting a network of logistics and warehouses. We provide a simple solution for connecting farmers and customers through a web app.</p>
      </div>
    </div>
    <div class="services-area" id="services">
      <div class="text-area">
        <p><br><br><h1>SERVICES</h1><br>provide business solutions for farmers , warehouses and wholesale buyers.</p>
      </div>
    </div>
    <div class="about-area" id="about">
      <div class="text-area">
        <p><br><br><h1>ABOUT</h1><br>We are company that sparked with a small group of crazy people who thought we can solve the farmers and customers problem.</p>
      </div>
    </div>
    <div class="contact-area" id="contact">
      <div class="text-area">
        <p><br><br><h1>CONTACT US:</h1><br>
          <ul>
            <li>Hr</li>
            <li>Jacksie</li>
            <li>Gurumatha</li>
            <li>ka-roll</li>
            <li>DP</li>
            <li>meenatchi</li>
          </ul>
        </p>
      </div>
    </div>
    
  </body>
</html>


