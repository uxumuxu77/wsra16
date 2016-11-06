<?php
	//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	

	
	if ($link->connect_error)
		{
			
			die('Ez da datu basera ondo konektatu:'.$link->connect_error);
			//exit();
		} 
	$emaila=$_COOKIE["ErabilLog"];
	
		$galde= $link->query("SELECT * FROM galderak WHERE EgileEposta='$emaila'");
		echo'<p>Datu basean sartuta dituzun galderen kopurua:</p>';
		echo $galde->num_rows;
		echo'<p>Zure galderak</p>';
		//$galde=mysqli_query($link,"select * from galderak where Eposta='$emaila'");
			echo'<table border=2 align="center">
				<tr>
					<th>Galdera</th>
				</tr>';

			while($rowgal = $galde -> fetch_row())
	

	//while($rowgal = mysqli_fetch_array($galde,MYSQLI_ASSOC))
	{
		echo "<tr>
				<td>".$rowgal[2]."</td>
			</tr>";
	}
		echo'</table>';

	echo'</br></br>';
	
	
mysqli_close($link);
?>