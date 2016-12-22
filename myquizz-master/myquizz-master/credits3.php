<?php
	session_start();
//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	
	
	$erabiltzailea=$_SESSION['username'];
	$e=$link->query("SELECT * FROM erabiltzaile WHERE Eposta='$erabiltzailea'");
	$row=mysqli_fetch_array($e,MYSQLI_ASSOC);
	$ize=$row['Izena'];
	$argaz=base64_encode($row['Argazkia']);
	
mysqli_close($link);
?>
<!DOCTYPE html> <!-- IKASLE-->
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<title>Kredituak</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   href='kredituak_estiloa.css'/>
		   <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<style> #map { width: 100%; height: 300px; border: 1px solid #d0d0d0; } </style>
		   
		   <script>
function localize() {
if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(mapa,error);
} else {
alert('Tu navegador no soporta geolocalizacion.');
}
}
function mapa(pos) { /************************ Aqui están las variables que te interesan***********************************/
var latitud = pos.coords.latitude;
var longitud = pos.coords.longitude;
var precision = pos.coords.accuracy;
var contenedor = document.getElementById("map")
document.getElementById("lti").innerHTML=latitud;
document.getElementById("lgi").innerHTML=longitud;
document.getElementById("psc").innerHTML=precision;
var centro = new google.maps.LatLng(latitud,longitud);
var propiedades = { zoom: 15, center: centro, mapTypeId: google.maps.MapTypeId.ROADMAP };
var map = new google.maps.Map(contenedor, propiedades);
var marcador = new google.maps.Marker({ position: centro, map: map, title: "Tu posicion actual" });
}
function error(errorCode) {
if(errorCode.code == 1)
alert("No has permitido buscar tu localizacion")
else if (errorCode.code==2)
alert("Posicion no disponible")
else
alert("Ha ocurrido un error")
} 
</script>
</head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
	
<span ><a href="logOut.php"> <img src="irudiak/logout.jpg" height="75" width="75"> </a> </span>
	  	  <table align="right">
		<tr>
				<td><?php echo $ize?></td>
				<td><img src=data:image/jpeg;base64,<?php echo $argaz?> width="50" height="50"/></td>
			</tr>
	</table>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout3.php'>Home</a></span>
		<span><a href='reviewingQuizes.php'>Galderak ikusi</a></span>
		<span><a href='galderaEzabatu.php'>Galderak ezabatu</a></span>
		<span><a href='erabilGalderakEzabatu.php'>Erabiltzaile baten galderak ezabatu</a></span>
		<span><a href='ShowUsersWithImage.php'>Erabiltzaileak bistaratu</a></span>
		<span><a href='erabilEzabatu.php'>Erabiltzaileak Ezabatu</a></span>
		<span><a href='credits3.php'>Credits</a></span>
		<!--<span><a href='getUserInform.html'>Ikasleak bilatu</a></span>-->
	</nav>

<section class="main" id="s1">
<div align="center" style="overflow:auto;height:500px">
	<h1 align="center"> EGILEAK </h1>
		<hr/>
		<br/>
	<div>
		<div align="center">
			<h2> UXUE ALBERDI</h2>
			<p>  Informatika fakultateko 4. mailako ikaslea</p>
			<p>Konputagailuen ingeniaritzan espazializatua </p>
			<br/>
			<img class="argazki" src="./irudiak/uxue.jpg" height="150px"	width=" 180px"/>
			<br/><br/><br/>
		 </div>

		
		 <div align="center">
			<h2> IRATI URIARTE</h2>
			<p> Informatika fakultateko 4. mailako ikaslea</p>
			<p>Konputagailuen ingeniaritzan espazializatua </p>
			<br/>
			<img class="argazki" src="./irudiak/irati.jpg" height="150px"	width=" 180px" />
			<br/><br/>
		  </div>
	</div>
	
	<div>
		<h1>Google Maps KOKAPENA</h1>
		
		<input type="button" value="Kokapena Lortu" onClick="localize()">
		<p>Latitudea: <span id="lti"></span></p>
		<p>Longitudea: <span id="lgi"></span></p>
		<p>Prezisioa: <span id="psc"></span></p>
		<div id="map" ></div> 
	</div>

	<div>	 
		 <h3>Hemen aurki gaitzakezu (Zerbitzaria)</h3>
		 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.336877454775!2d-2.0130306851077955!3d43.30720688275383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd51b074753cca0d%3A0x6b04b77ccb51f778!2sInformatika+Fakultatea+-+Facultad+de+Inform%C3%A1tica!5e0!3m2!1ses!2ses!4v1478520889780" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
		 
		 <br/>
		
</div> 
	

	
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>