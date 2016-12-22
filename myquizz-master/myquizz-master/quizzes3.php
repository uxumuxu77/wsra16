<?php

session_start();


	//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");

	$zenbakia=$_POST['galzen'];
	$erabilerantzun=$_POST['erantzuna'];
	
	
	
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
		   
		  <script type="text/javascript">
		  

		  </script>
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
		<span><a href='quizzes2.php'>Quizzes</a></span>
		<span><a href='GalderaAnonimo.php'>Galderak ikusi</a></span>
		<span><a href='credits.html'>Credits</a></span>
		<span><a href='getUserInform.html'>Ikasleak bilatu</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div align="center" style="overflow:auto;height:500px">
<?php 
$link = new mysqli("localhost","root","","quiz");
	//$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");

$zuzen=$link->query("SELECT * FROM galderak Where GalderaZenbakia='$zenbakia' and Erantzuna='$erabilerantzun'");
	$zuzenkop=mysqli_num_rows($zuzen);
	if ($zuzenkop> 0){
	$_SESSION['Zuzen'] = $_SESSION['Zuzen']+1;
	echo "<p>Erantzuna zuzena da. ".$_SESSION['Zuzen']." galdera zuzen erantzun dituzu, eta oker berriz ".$_SESSION['Oker']." galdera.</p>";
}else{
	$_SESSION['Oker'] = $_SESSION['Oker']+1;
	echo "<p>Erantzuna okerra da. ".$_SESSION['Zuzen'] ." galdera zuzen erantzun dituzu, eta oker berriz ".$_SESSION['Oker']." galdera.</p>";
}
echo 'Berriro jolasteko sakatu Quizzes atalari.';
echo 'Irten nahi baduzu layoutera joan behar zara.';

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