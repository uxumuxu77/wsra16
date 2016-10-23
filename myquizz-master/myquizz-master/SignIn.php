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
		
	if(isset($_SESSION["session_username"])){
		header("Location: InsertQuestion.php");
	}

	if (isset($_POST['logeatu']))
	{
			

		if (!empty($_POST['posta'])&& !empty($_POST['pasahitza']))
		{
			$erabilposta=$_POST['posta'];
			$pasahitz=$_POST['pasahitza'];

			$erabil= $link -> query("SELECT * FROM erabiltzaile WHERE Eposta='".$erabilposta."'");
			setcookie("ErabilLog",$erabilposta);
			while($row = mysqli_fetch_assoc($erabil))
			{
						$posta2=$row['Eposta'];
						$pas2=$row['Pasahitza'];
			}
			if($posta2 == $erabilposta && $pas2 ==$pasahitz)
			{
				$ordua= Date('Y-m-d H:i:s');
				$sql="INSERT INTO konexioak(Eposta,Ordua) 
				VALUES ('$erabilposta','$ordua')";
				if (!$link -> query($sql)){
					die("<p>Errorea gertatu da: ".$link -> error ."</p>");
				}else{
					echo 'konexioa zuzen sartu da';
				}
				header("Location:Ekintzak.html");

			}
			else {
			
				echo ("</br></br>Sartutako datuak ez dira zuzenak, saiatu berriro ");


			}
			
			
		}

	}
	
mysqli_close($link);


?>