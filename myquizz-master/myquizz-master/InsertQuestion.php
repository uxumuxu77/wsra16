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
		<label>Gaia</label></br>
		<input type ="text" name="gaia" id="gaia" required> <br/><br/>

			
		<input type="submit" name="bidali" value="bidali">
		<input type="reset" name="Garbitu" value="Garbitu">
 </form>

		
  <a href="Ekintzak.html"> <img src="./irudiak/atzera.jpg" height="50px"  width="50px"/></a>
  
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
	$xml= simplexml_load_file('galderak.xml');
	if(isset($_POST['bidali']))
		
	{ /*NONBAITEN BIDALI BEHAR DIRA*/
		
		$emaila=$_COOKIE["ErabilLog"];
		$galdera = $_POST['galdera'];
		$erantzuna =$_POST['erantzuna'];
		$zailtasuna =$_POST['zailtasuna'];
		$gaia=$_POST['gaia'];
		$mota="Galdera Txertatu";
		$ordua= Date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$kon=mysqli_query($link,"select KKodea from konexioak where Eposta='$emaila' order by KKodea desc limit 1");
		$row = mysqli_fetch_array($kon);
		$konID=intval($row['KKodea']);
		
	$sql = "INSERT INTO ekintzak(Kkodea,Eposta,Mota,Ordua,IP) 
	VALUES ('$konID','$emaila','$mota','$ordua','$ip')";	
	
	if (!$link -> query($sql)){
					die("<p>Errorea gertatu da: ".$link -> error ."</p>");
				}
	
	$sql = "INSERT INTO galderak(EgileEposta,Galdera,Erantzuna,ZailMaila,Gaia) 
	VALUES ('$emaila','$galdera','$erantzuna','$zailtasuna','$gaia')";
	if (!$link -> query($sql)){
					die("<p>Errorea gertatu da: ".$link -> error ."</p>");
				}else{
					echo 'Galdera zuzen sartu da</br>';
				
					$assessmentItem= $xml-> addChild('assessmentItem');
					$assessmentItem-> addAttribute('Zailtasuna',$zailtasuna);
					$assessmentItem -> addAttribute ('Gaia',$gaia);
					$itemBody= $assessmentItem ->addChild('itemBody');
					$itemBody->addChild('Galdera',$galdera);
					$correctResponse= $assessmentItem-> addChild('correctResponse');
					$correctResponse-> addChild('Erantzuna',$erantzuna);					
					$xml-> asXML('galderak.xml');
					echo "<a href ='seeXMLQuestions.php'>Ikusi galderak(XML)</a><br>";
					echo "<a href ='Ekintzak.html'>Zer ekintza egin aukeratzeko sakatu hemen.</a><br>";
				
				}		
	//header("Location:Ekintzak.html");
	}
	
	mysqli_close($link);


?>