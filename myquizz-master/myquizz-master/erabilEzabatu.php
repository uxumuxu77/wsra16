<?php
	session_start();
	$link = new mysqli("localhost","root","","quiz");
	//$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	
	if($_SESSION['logeatua'] != 'BAI' || $_SESSION['rola']!='IRAKASLE'){
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
	<title>Erabiltzailea ezabatu</title>
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

      <span class="right"><a href="logOut.php"> <img src="irudiak/logout.jpg" height="75" width="75"> </a> </span>
	  	  	  <table align="right">
		<tr>
				<td><?php echo $ize?></td>
				<td><img src=data:image/jpeg;base64,<?php echo $argaz?> width="50" height="50"/></td>
			</tr>
	</table>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout3.php'>Home</a></span>
		<span><a href='/quizzes'>Quizzes</a></span>
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
	<?php
	
	//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	

	
	if ($link->connect_error)
		{
			
			die('Ez da datu basera ondo konektatu:'.$link->connect_error);
			//exit();
		} 
		
	
	
	
		$era= $link->query("SELECT * FROM erabiltzaile");
		echo'<p>Datu basean sartuta dauden erabiltzaileen kopurua:</p>';
		echo $era->num_rows;
		echo'<p>Orriaren behealdean aukeratu behar duzu zein erbailtzaile ezabatu nahi duzun.</p>';
		echo'</br>';
	
			echo'<table border=2 align="center">
		<tr>
			<th>Izena</th>
			<th>1.Abizena</th>
			<th>2.Abizena</th>
			<th>Posta</th>
			<th>Telefonoa</th>
			<th>Espezialitatea</th>
			<th>Interesak</th>
			<th>Argazkia</th>
		</tr>';
		
	while ($row=mysqli_fetch_array($era,MYSQLI_ASSOC))
	{
		echo '<tr>
				<td>'.$row['Izena'].'</td>
				<td>'.$row['Abizena1'].'</td>
				<td>'.$row['Abizena2'].'</td>
				<td>'.$row['Eposta'].'</td>
				<td>'.$row['Telefonoa'].'</td>
				<td>'.$row['Espezialitatea'].'</td>
				<td>'.$row['Interesak'].'</td>
				<td><img src=data:image/jpeg;base64,'.base64_encode( $row['Argazkia'] ).' width="50" height="50"/></td>
			</tr>';
	}
	
	echo'</table>';
	echo'</br></br>';

		echo'Erabiltzailearen posta';
		echo'<form id="erabilaukera" method="post" action="erabilEzabatu2.php">';
		
		echo'<input type="text" id="posta" name="posta">';
		echo'<input type="submit" id="erabilEzabatu" value="Erabiltzailea ezabatu">';
		echo'</form>';
	
	
	echo'</br></br>';
	
	
mysqli_close($link);
?>
		</div>
		    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>