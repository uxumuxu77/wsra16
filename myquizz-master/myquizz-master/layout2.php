<?php
	session_start();
	//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	
	if($_SESSION['logeatua'] != 'BAI' || $_SESSION['rola']!='IKASLE'){
		header("Location:Location.html");
		exit();
	}
	$erabiltzailea=$_SESSION['username'];
	$e=$link->query("SELECT * FROM erabiltzaile WHERE Eposta='$erabiltzailea'");
	$row=mysqli_fetch_array($e,MYSQLI_ASSOC);
	$ize=$row['Izena'];
	$argaz=base64_encode($row['Argazkia']);
	
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Layout</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
	  <span class="right"><a href="logOut.php"> <img src="irudiak/logout.jpg"  height="75" width="75"> </a> </span>
	   <table class="right" align="right">
		<tr>
				<td><?php echo $ize?></td>
				<td><img src=data:image/jpeg;base64,<?php echo $argaz?> width="50" height="50"/></td>
			</tr>
	</table>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout2.php'>Home</a></span>
		<span><a href='/quizzes'>Quizzes</a></span>
		<span><a href='galderak.php'>Galderak ikusi</a></span>
		<span><a href='handlingQuizes.php'>Galderak sortu</a></span>
		<span><a href='credits2.php'>Credits</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
	Quizzes and credits will be displayed in this spot in future laboratories ...
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>