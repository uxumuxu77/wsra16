<?php

session_start();

if (!isset($_SESSION['Erabiltzaile'])){
$_SESSION['Erabiltzaile']=$_POST['nick'];
$_SESSION['Zuzen']=0;
$_SESSION['Oker']=0;
}


	//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Jokoa</title>
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
      <span class="right"><a href="SignIn.php"><img src="irudiak/login.jpg" height="75" width="75"></a> </span>
	  <span class="right"><a href="signUp.html"><img src="irudiak/signUp.png" height="75" width="75"></a> </span>
	  	  	 <table align="right">
		<tr>
				<td><?php echo $_SESSION['Erabiltzaile']?></td>
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
	<form id="galderak" method="POST" action="quizzes3.php">
		Galderaren zenbakia*:<input type="text" id="galzen" name="galzen"></br>
		Erantzuna*:<input type="text" id="erantzuna" name="erantzuna"> </br>
				<input type="submit" name="zuzendu" id="zuzendu" value="zuzendu"/> </br>
	
	
	<?php
	
	
	$link = new mysqli("localhost","root","","quiz");
	//$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	$galderaa= $link->query("SELECT * FROM galderak");

			echo'<table border=2 align="center">
				<tr>
					<th>GalderaZenbakia</th>
					<th>Galdera</th>

					
				</tr>';

			while($rowgal = $galderaa -> fetch_row())
	


	{
		echo "<tr>
				<td>".$rowgal[0]."</td>
				<td>".$rowgal[2]."</td>
			</tr>";
	}
	
	?>
	</form>
	</div>
	
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>