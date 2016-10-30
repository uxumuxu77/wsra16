<?php
	
	//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	
	
	
	if ($link->connect_error)
		{
			
			die('Ez da datu basera ondo konektatu:'.$link->connect_error);
			//exit();
		} 

else{
	$emaila=$_COOKIE["ErabilLog"];
	$galguztiak=$link->query("SELECT * FROM galderak");
	$niregal=$link->query("SELECT * FROM galderak WHERE EgileEposta='$emaila';");
		if(!($niregal && $galguztiak)){
			echo "Errore bat gertatu da: ";
		}else{
			$niregal_kop=mysqli_num_rows($niregal);
			$galguztiak_kop=mysqli_num_rows($galguztiak);
			echo '<br/>Nire galderak/Galderak guztira DB:'.$niregal_kop.'/'.$galguztiak_kop.'';
		}
}
mysqli_close ($link);
?>