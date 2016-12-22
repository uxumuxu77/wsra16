<?php
	//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	

	
	if ($link->connect_error)
		{
			
			die('Ez da datu basera ondo konektatu:'.$link->connect_error);
			//exit();
		} 
	$galzenbaki=$_POST['zenbakia'];
	
	$galdera= $link->query("DELETE FROM galderak WHERE GalderaZenbakia='".$galzenbaki."'");
	header("Location:galderaEzabatu.php");		
	mysqli_close($link);
	?>