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
	<title>Galderak</title>
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
	   <table align="right">
		<tr>
				<td><?php echo $ize?></td>
				<td><img src=data:image/jpeg;base64,<?php echo $argaz?> width="50" height="50"/></td>
			</tr>
	</table>
	  

    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout2.php'>Home</a></span>
		<span><a href='galderak.php'>Galderak ikusi</a></span>
		<span><a href='handlingQuizes.php'>Galderak sortu</a></span>
		<span><a href='credits2.php'>Credits</a></span>
	</nav>

<section class="main" id="s1">
<div align="center" style="overflow:auto;height:500px">
<?php
//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");

		$emaila=$_SESSION['username'];
		$kon=mysqli_query($link,"select KKodea from konexioak where Eposta='$emaila' order by KKodea desc limit 1");
		$row = mysqli_fetch_array($kon);
		$konID=intval($row['KKodea']);
		$mota="Galderak kontsultatu";
		$ordua= Date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$sql = "INSERT INTO ekintzak(KKodea,Eposta,Mota,Ordua,IP) 
		VALUES ('$konID','$emaila','$mota','$ordua','$ip')";	
	
		if (!$link -> query($sql)){
					die("<p>Errorea gertatu da: ".$link -> error ."</p>");
				}
	
	
		$ema=mysqli_query($link,"select * from galderak where EgileEposta='$emaila'order by (ZailMaila)");
		if (!$link -> query($sql)){
					die("<p>Errorea gertatu da: ".$link -> error ."</p>");
				}


			echo'<table border=2 align="center">
					<tr>
						<th>Galdera</th>
						<th>Zailtasuna</th>
					</tr>';
			
			while ($row=mysqli_fetch_array($ema,MYSQLI_ASSOC))
			{
				echo '<tr>
						<td>'.$row['Galdera'].'</td>
						<td>'.$row['ZailMaila'].'</td>
					</tr>';
			
			}
			echo'</table>';
			echo'</br></br>';
		
/*	mysqli_free_result($ema);
		mysqli_free_result($kop);*/
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