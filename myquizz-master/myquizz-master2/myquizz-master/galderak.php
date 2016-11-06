<?php
//$link=new mysqli("localhost","root", "","quiz");
$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");

		$emaila=$_COOKIE['ErabilLog'];
		$kon=mysqli_query($link,"select KKodea from konexioak where Eposta='$emaila' order by KKodea desc limit 1");
		$row = mysqli_fetch_array($kon);
		$konID=intval($row['KKodea']);
		$mota="Galderak kontsultatu";
		$ordua= Date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];

		$sql = "INSERT INTO ekintzak(KKodea,Eposta,Mota,Ordua,IP) 
		VALUES ('$konID','$emaila','$mota','$ordua','$ip')";	
	
		if (!$link -> query($sql)){
					die("<p>Errorea gertatu da: ".$link -> error ."</p>");
				}else{
					echo 'Ekintza zuzen sartu da';
				}
	
	
		$ema=mysqli_query($link,"select * from galderak order by (ZailMaila)");

		echo'<table border=2 align="center">
				<tr>
					<th>Galdera</th>
					<th>Zailtasuna</th>
				</tr>';
		
	while ($row=mysqli_fetch_array($ema,MYSQLI_ASSOC))
	{
		echo '<tr>
				<td>'.$row['Galdera'].'</td>
				<td>'.$row['ZailMaila'].'</td>
			</tr>';
	}
	
	echo'</table>';
	echo'</br></br>';
	echo'<a href="Ekintzak.html"> <img src="./irudiak/atzera.jpg" height="50px"  width="50px"/></a>';
	mysqli_free_result($ema);
	mysqli_close($link);
?>