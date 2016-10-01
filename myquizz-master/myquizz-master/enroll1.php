$link = new mysqli("localhost","root","","quiz");
//$link=mysqli_connect("hostinger.es","uxumuxu77","pasahitza","Quiz")
	if ($link->connect_error)
		{
			
			die('Ez da datu basera ondo konektatu:'.$link->connect_error);
			//exit();
		} 
		
	/* 	$izena= $_POST['izena'];
		$abizena1= $_POST['abizena1'];
		$abizena2= $_POST['abizena2'];
		$posta= $_POST['posta'];
		$pasahitza= $_POST['pasahitza'];
		$telefonoa=$_POST['telefonoa'];
		$espezialitatea= $_POST['espezialitatea'];
		$interesak= $_POST['interesak']; */
	

	$sql="INSERT INTO erabiltzaile(Izena,Abizena1,Abizena2,Eposta,Pasahitza,Telefonoa,Espezialitatea,Interesak) 
	VALUES ('$_POST[izena]','$_POST[abizena1]','$_POST[abizena2]','$_POST[posta]','$_POST[pasahitza]','$_POST[telefonoa]','$_POST[espezialitatea]','$_POST[interesak]')";
	
	$ema=mysqli_query($link,$sql);
	if(!$ema)
	{
		die("Errorea datubasean datuak sartzean".mysqli_error());
	}
	else {
		
		echo("Datuak ondo sartu dira");
	}
	//mysqli_free_result($ema);
	mysqli_close($link);
	