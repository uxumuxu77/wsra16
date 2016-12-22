
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>GalderaAnonimo</title>
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
      <span class="right"><a href="SignIn.php"><img src="irudiak/login.jpg"  height="75" width="75"></a> </span>
	  <span class="right"><a href="signUp.html"><img src="irudiak/signUp.png"  height="75" width="75"></a> </span>
	    	  <table align="right">
		<tr>
				<td>ANONIMOA</td>
				<td><img src=./irudiak/anonimo.png width="50" height="50"/></td>
			</tr>
	</table>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Home</a></span>
		<span><a href='/quizzes'>Quizzes</a></span>
		<span><a href='GalderaAnonimo.php'>Galderak ikusi</a></span>
		<span><a href='credits.html'>Credits</a></span>
		<span><a href='getUserInform.html'>Ikasleak bilatu</a></span>
	</nav>

<section class="main" id="s1">
<div align="center" style="overflow:auto;height:500px">


    
      
        
	<?php
//$link=new mysqli("localhost","root", "","quiz");
$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	
		$emaila=null;
		$konID=null;		
		$mota="Galderak kontsultatu";
		$ordua= Date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$sql = "INSERT INTO ekintzak(KKodea,Eposta,Mota,Ordua,IP) 
		VALUES ('$konID','$emaila','$mota','$ordua','$ip')";	
	
		if (!$link -> query($sql)){
					die("<p>Errorea gertatu da: ".$link -> error ."</p>");
				}
	
	
		$ema=mysqli_query($link,"select * from galderak order by (ZailMaila)");
		echo '<p>Datu basean dauden galdera guztiak ondorengo taulan ageri dira:</p>';
		echo '</br></br>';
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

	mysqli_free_result($ema);
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