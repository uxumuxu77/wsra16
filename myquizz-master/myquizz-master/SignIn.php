<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>LogIn</title>
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
  
 <form id ="erregistro" name ="erregistro" method ="post" action="">
			<br/><br/>
			<b> Eposta*:</b><input type="text" name="posta" required>
			<br/><br/>
			<b> Pasahitza*:</b><input type="password" name="pasahitza" required>
			<br/><br/>
			
			
			<input type="reset" name="Garbitu" value="Garbitu">
			<input type="submit" name="logeatu" value="Logeatu">
			<br/><br/>
			<a href="layout.html"> <img src="./irudiak/atzera.jpg" height="50px"  width="50px"/></a>
 </form>
		
 
  
  </body>
</html>

<?php

	//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	

	
	if ($link->connect_error)
		{
			
			die('Ez da datu basera ondo konektatu:'.$link->connect_error);
			//exit();
		} 
	session_start();	


	if (isset($_POST['logeatu']))
	{
			

		if (!empty($_POST['posta'])&& !empty($_POST['pasahitza']))
		{
			$erabilposta=$_POST['posta'];
			$pasahitz=$_POST['pasahitza'];
			$posta2=null;
			

			$erabil= $link -> query("SELECT * FROM erabiltzaile WHERE Eposta='".$erabilposta."'");

			if ($erabil){
					while($row = mysqli_fetch_assoc($erabil))
						{
									$posta2=$row['Eposta'];
									$pas2=$row['Pasahitza'];
						}
			}else{
						die("<p>Errorea gertatu da:</p>");
						
				}
						if($posta2 == $erabilposta && $pas2 ==$pasahitz)
						{
							$_SESSION['username'] = $erabilposta;
							$ordua= Date('Y-m-d H:i:s');
							$sql="INSERT INTO konexioak(Eposta,Ordua) 
							VALUES ('$erabilposta','$ordua')";
							if (!$link -> query($sql)){
								die("<p>Errorea gertatu da: ".$link -> error ."</p>");
							}else{
								echo 'konexioa zuzen sartu da';
								$_SESSION['logeatua']='BAI';
								if ($_SESSION['username']=="web000@ehu.es")
								{
									header("Location:reviewingQuizes.php");
								} else{
										header("Location:handlingQuizes.php");
									}
							}
						}else 
							{
								echo ("</br></br>Sartutako datuak ez dira zuzenak, saiatu berriro ");
								$_SESSION['logeatua']='EZ';
							}
				
				

				

			
			
			
			
		}

	}
	
mysqli_close($link);


?>