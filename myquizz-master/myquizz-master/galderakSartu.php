<?php
	
	//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	
	
	
	if ($link->connect_error)
		{
			
			die('Ez da datu basera ondo konektatu:'.$link->connect_error);
			//exit();
		} 

	
		
		$emaila=$_COOKIE["ErabilLog"];
		$galdera= $_GET["galdera"];
		echo '<p>Orain sartu duzun galdera honako hau da:</p></br>';
		echo($galdera);
		$erantzuna=$_GET["erantzuna"];
		$zailtasuna=$_GET["zailtasuna"];
		$gaia=$_GET["gaia"];
		/*$mota="Galdera Txertatu";
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
	*/
	$sql = "INSERT INTO galderak(EgileEposta,Galdera,Erantzuna,ZailMaila,Gaia) 
	VALUES ('$emaila','$galdera','$erantzuna','$zailtasuna','$gaia')";
	if (!$link -> query($sql)){
					die("<p>Errorea gertatu da: ".$link -> error ."</p>");
				}else{
					echo '</br>';
					$xml= simplexml_load_file('galderak.xml');
					$assessmentItem= $xml-> addChild('assessmentItem');
					$assessmentItem-> addAttribute('Zailtasuna',$zailtasuna);
					$assessmentItem -> addAttribute ('Gaia',$gaia);
					$itemBody= $assessmentItem ->addChild('itemBody');
					$itemBody->addChild('Galdera',$galdera);
					$correctResponse= $assessmentItem-> addChild('correctResponse');
					$correctResponse-> addChild('Erantzuna',$erantzuna);					
					$xml-> asXML('galderak.xml');
					echo 'Galdera zuzen sartu da, bai datu basean, baita XML-an ere.</br>';
				/*	echo "<a href ='seeXMLQuestions.php'>Ikusi galderak(XML)</a><br/>";
					echo "<a href ='galderak.xml'>Ikusi galderak(XML)Transformatua</a><br/>";
					echo "<a href ='Ekintzak.html'>Zer ekintza egin aukeratzeko sakatu hemen.</a><br/>";*/
		
				}		
	
	//header("Location:Ekintzak.html");
	
	mysqli_close($link);


?>