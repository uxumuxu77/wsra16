<?php
//$link=new mysqli("localhost","root", "","quiz");
$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
$ema=mysqli_query($link,"select * from erabiltzaile");
echo'<table border=2 align="center">
		<tr>
			<th>Izena</th>
			<th>1.Abizena</th>
			<th>2.Abizena</th>
			<th>Posta</th>
			<th>Pasahitza</th>
			<th>Telefonoa</th>
			<th>Espezialitatea</th>
			<th>Interesak</th>
		</tr>';
		
	while ($row=mysqli_fetch_array($ema,MYSQLI_ASSOC))
	{
		echo '<tr>
				<td>'.$row['Izena'].'</td>
				<td>'.$row['Abizena1'].'</td>
				<td>'.$row['Abizena2'].'</td>
				<td>'.$row['Eposta'].'</td>
				<td>'.$row['Pasahitza'].'</td>
				<td>'.$row['Telefonoa'].'</td>
				<td>'.$row['Espezialitatea'].'</td>
				<td>'.$row['Interesak'].'</td>
			</tr>';
	}
	
	echo'</table>';
	echo'</br>';
	echo'</br>';
	echo "Hasierako orrira joan nahi baduzu klikatu hemen:";
	echo'<a href="layout.html"> <img src="./irudiak/etxea.jpg" height="50px"  width="50px"/></a>';
	mysqli_free_result($ema);
	mysqli_close($link);
?>