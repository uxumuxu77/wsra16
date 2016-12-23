<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>PasahitzaAldatu</title>
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
	  <span class="right"><a href="signUp.html"><img src="irudiak/signup.png" height="75" width="75"></a> </span>
	  	  	 <table align="right">
		<tr>
				<td>ANONIMOA</td>
				<td><img src=./irudiak/anonimo.png width="50" height="50"/></td>
			</tr>
	</table>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Home</a></span>
		<span><a href='GalderaAnonimo.php'>Galderak ikusi</a></span>
		<span><a href='credits.html'>Credits</a></span>
		<span><a href='getUserInform.html'>Ikasleak bilatu</a></span>
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
	session_start();
		$erabil=$_POST['posta'];
		$pasa1=$_POST['pasa1'];
		$pasa2=$_POST['pasa2'];
		//echo ($erabil);
		
		$erabili= $link -> query("SELECT * FROM erabiltzaile WHERE Eposta='".$erabil."'");
		$erabilkop=mysqli_num_rows($erabili);
								if($erabilkop<1)
								{
									echo 'Ez da erabiltzaile zuzena saiatu berriro.<a href="pasahitzaAldatu2.php">Itzuli</a>"';	
								}else 
								{
									if ($pasa1!=$pasa2)
									{
										echo 'Bi pasahitzak desberdinak dira, saiatu berriro.<a href="pasahitzaAldatu2.php">Itzuli</a>';
									}else //ERROREA EMATEN DU UPDATEAK
										{
											$fitxa=fopen("toppasswords.txt","r");
											$ahula="EZ";
													while (!feof($fitxa))
														{			
															if(trim(fgets($fitxa))==$pasa1)
																{
																	
																	$ahula="BAI";
																}

														}
											if ($ahula=="EZ")
											{
											$pasahitza=crypt($pasa1,'st');
											$pas=$link -> query ("Update erabiltzaile set Pasahitza='$pasahitza' where Eposta='$erabil'");
											echo 'Pasahitza aldatu duzu, logeatzeko prest zaude.';	
											} else if ($ahula=="BAI")
											{
												echo'Pasahitza berria ahula da. Saiatu berriro <a href="pasahitzaAldatu2.php">Itzuli</a>"';	
											}
											fclose ($fitxa);
										}
								}
								
							
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
			
			
