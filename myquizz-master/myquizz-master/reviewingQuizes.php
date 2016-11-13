<?php
	//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	

	
	if ($link->connect_error)
		{
			
			die('Ez da datu basera ondo konektatu:'.$link->connect_error);
			//exit();
		} 
		session_start();
			if($_SESSION['logeatua'] != 'BAI'){
		header("Location:Location.html");
		exit();
	}
	$emaila=$_SESSION['username'];
	
		$galde= $link->query("SELECT * FROM galderak");
		echo'<p>Datu basean sartuta dauden galderen kopurua:</p>';
		echo $galde->num_rows;
		echo'<p>Ikasleen galderak</p>';
	
			echo'<table border=2 align="center">
				<tr>
					<th>GalderaZenbakia</th>
					<th>Egilea</th>
					<th>Galdera</th>
					<th>Erantzuna</th>
					<th>Konplexutasuna</th>
					<th>Gaia</th>
					
				</tr>';

			while($rowgal = $galde -> fetch_row())
	


	{
		echo "<tr>
				<td>".$rowgal[0]."</td>
				<td>".$rowgal[1]."</td>
				<td>".$rowgal[2]."</td>
				<td>".$rowgal[3]."</td>
				<td>".$rowgal[4]."</td>
				<td>".$rowgal[5]."</td>
			</tr>";
	}
		echo'</table>';
		echo'Aldatu nahi duzun galderaren zenbakia idatzi hemen';
		echo'<form id="galaukera" method="post" action="galderaAldatu.php">';
		
		echo'<input type="text" id="zenbakia" name="zenbakia">';
		echo'<input type="submit" id="galderaAldatu" value="Galdera aldatu">';
		echo'</form>';
	
	
	 echo'<a href="logOut.php"> <img src="./irudiak/logout.jpg" height="50px"  width="50px"/></a>';
	echo'</br></br>';
	
	
mysqli_close($link);
?>