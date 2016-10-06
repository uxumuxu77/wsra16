<?php
	$link = new mysqli("localhost","root","","quiz");
	//$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	if ($link->connect_error)
		{
			
			die('Ez da datu basera ondo konektatu:'.$link->connect_error);
			//exit();
		} 
		
		$file= $_FILES['fitx1']['tmp_name'];
		if(!isset($file))
			echo "Argazkirik gabeko erabiltzailea";
		else
		{
			$image= addslashes(file_get_contents($_FILES['fitx1']['tmp_name']));
			$image_name= addslashes($_FILES['fitx1']['name']);
		}

	
	if ($_POST['espezialitatea']=='Besterik')
	{
		$sql="INSERT INTO erabiltzaile(Izena,Abizena1,Abizena2,Eposta,Pasahitza,Telefonoa,Espezialitatea,Interesak,Argazkia,ArgazkiMota) 
	VALUES ('$_POST[izena]','$_POST[abizena1]','$_POST[abizena2]','$_POST[posta]','$_POST[pasahitza]','$_POST[telefonoa]','$_POST[testua]','$_POST[interesak]','$image','$image_name')";
	} 
	else 
	{
		$sql="INSERT INTO erabiltzaile(Izena,Abizena1,Abizena2,Eposta,Pasahitza,Telefonoa,Espezialitatea,Interesak,Argazkia,ArgazkiMota) 
		VALUES ('$_POST[izena]','$_POST[abizena1]','$_POST[abizena2]','$_POST[posta]','$_POST[pasahitza]','$_POST[telefonoa]','$_POST[espezialitatea]','$_POST[interesak]','$image','$image_name')";
		
	}
	
	
	$ema=mysqli_query($link,$sql);
	if(!$ema)
	{
		die("Email hori badago datu basean sartuta, beste batekin probatu.<a href='signUp.html'>Formulariora itzuli</a>");
		//echo "<a href='signUp.html'>Formulariora itzuli</a>";
		//die("Errorea datubasean datuak sartzean".mysqli_error());
	}
	else 
	{
		
		echo("Datuak ondo sartu dira. Datu baseko datuak ikusteko jo esteka honetara: ");
		echo "<a href='ShowUsersWithImage.php'>Erabiltzaileak ikusi</a>";
	}
	//mysqli_free_result($ema);
	mysqli_close($link);
?>

