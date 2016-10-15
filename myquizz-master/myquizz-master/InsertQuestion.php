<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>InsertQuestion</title>
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
  
 <form id ="galdera" name ="galderasortu" method ="post" action="">

		<label>Galdera</label></br>
		<textarea id ="galdera" name="galdera" rows="4" cols="50" required></textarea><br/><br/>
		<label>Erantzuna</label></br>
		<input type ="text" name="erantzuna" id="erantzuna" required> <br/><br/>
		<label>Zailtasuna </label>
		<select name='zailtasuna' id='zailtasuna'>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select><br><br>

			
		<input type="submit" name="bidali" value="bidali">
		<input type="reset" name="Garbitu" value="Garbitu">
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
	if(isset($_POST['bidali']))
		
	{ /*NONBAITEN BIDALI BEHAR DIRA*/
	
		$emaila=$_COOKIE["ErabilLog"];
		$galdera = $_POST['galdera'];
		$erantzuna =$_POST['erantzuna'];
		$zailtasuna =$_POST['zailtasuna'];
				
		echo'galdera sartzeko prest dago';
		echo("$emaila");
		echo("$galdera");
		echo("$erantzuna");
		echo("$zailtasuna");
		echo("$galzenbakia");
	$sql = "INSERT INTO galderak(EgileEposta,Galdera,Erantzuna,ZailMaila) 
	VALUES ('$emaila','$galdera','$erantzuna','$zailtasuna')";
	if (!$link -> query($sql)){
					die("<p>Errorea gertatu da: ".$link -> error ."</p>");
				}else{
					echo 'Galdera zuzen sartu da';
				}
	header("Location:galderak.php");
	}
	
	mysqli_close($link);


?>