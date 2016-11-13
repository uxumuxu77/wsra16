<?php
	//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	

	
	if ($link->connect_error)
		{
			
			die('Ez da datu basera ondo konektatu:'.$link->connect_error);
			//exit();
		} 
		$pos=$_POST['egilepost'];
		$galzen=$_POST['galdeZenbaki'];
		$galBerria=$_POST['galde'];
		$erantzunBerria=$_POST['erantzun'];
		$zailtasunBerria=$_POST['zailtasun'];
		$gaiBerria=$_POST['gaia'];
		

			echo $galzen;
		$sql ="DELETE from galderak WHERE GalderaZenbakia='".$galzen."'"; 
		if (!$link -> query($sql)){
					die("<p>Errorea gertatu da: ".$link -> error ."</p>");
				}else{
					$sqli="INSERT INTO galderak (GalderaZenbakia,EgileEposta,Galdera,Erantzuna,ZailMaila,Gaia)VALUES('$galzen','$pos','$galBerria','$erantzunBerria','$zailtasunBerria','$gaiBerria')";
					if (!$link -> query($sqli))
					die("<p>Errorea gertatu da: ".$link -> error ."</p>");
					else
						echo'Galdera zuzen aldatu da.';
						header ("Location:reviewingQuizes.php");
				}
		
			
	
		
	mysqli_close($link);
?>