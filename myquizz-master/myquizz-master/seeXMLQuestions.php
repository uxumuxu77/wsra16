<!DOCTYPE html>
<html>
<head>
	<title>XML Bistaratu</title>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
</head>
<body>
		<hr>
		<h3>XML Fitxategia </h3>
	<table id ="taula" border="2" align="center">
		<tr>
			<th>Galdera</th>
			<th>Zailtasuna</th>
			<th>Gaia</th>
		</tr>

<?php

	//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	
	$xml = simplexml_load_file("galderak.xml");
	foreach($xml ->children() as $galdera){
		$zail = $galdera[0]['Zailtasuna'];
		$gaia = $galdera[0]['Gaia'];
		$galde = $galdera[0] -> itemBody -> Galdera;
		echo "<tr><td>".$galde."</td>";
		echo "<td style= 'text-align:center'>". $zail."</td>";
		echo "<td style= 'text-align:center'>". $gaia. "</td></tr>";
	}
	

?>
	</table>
<?php echo'</br></br><a href="Ekintzak.html"> <img src="./irudiak/atzera.jpg" height="50px"  width="50px"/></a>'; ?>

</body>
</html>