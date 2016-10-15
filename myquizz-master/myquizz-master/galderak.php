<?php
//$link=new mysqli("localhost","root", "","quiz");
$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");

$ema=mysqli_query($link,"select * from galderak");

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
	echo "Hasierako orrira joan nahi baduzu klikatu hemen:";
	echo'<a href="layout.html"> <img src="./irudiak/etxea.jpg" height="50px"  width="50px"/></a>';
	mysqli_free_result($ema);
	mysqli_close($link);
?>