<?php
	//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	

	
	if ($link->connect_error)
		{
			
			die('Ez da datu basera ondo konektatu:'.$link->connect_error);
			//exit();
		} 
	$galzenbaki=$_POST['zenbakia'];
	
	$galdera= $link->query("SELECT * FROM galderak WHERE GalderaZenbakia='".$galzenbaki."'");
				while($row = mysqli_fetch_assoc($galdera))
			{
						$posta=$row['EgileEposta'];
						$Galdera=$row['Galdera'];
						$Erantzuna=$row['Erantzuna'];
						$Zailtasuna=$row['ZailMaila'];
						$Gaia=$row['Gaia'];
			}





	
	mysqli_close($link);
	?>
	
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>GalderaAldatu</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
		   
	<script type="text/javascript">
			/*function zailtasun(){
				$zailtasuna=document.getElementById("zailtasun").value;
				alert("$zailtasuna");
				if ($zailtasuna>5 && $zailtasuna!='4' && $zailtasuna!='3' && $zailtasuna!='2' && $zailtasuna!='1')
					alert("Ezin duzu 5 baino handiagoa den zailtasuna jarri");
				
			}*/

	</script>
  </head>
  <body>
  </br></br>
 <form id="galaldatu" method="post" action="galderaGorde.php">
	<textarea id="egilepost" rows="1" cols="20"  name="egilepost" style="visibility:hidden;"><?php echo $posta?></textarea>
	<textarea id="galdeZenbaki" rows="1" cols="20"  name="galdeZenbaki" style="visibility:hidden;"><?php echo $galzenbaki?></textarea></br>
 	Galdera:<textarea id="galde" rows="1" cols="150"  name="galde" ><?php echo $Galdera?></textarea></br>
	Erantzuna:<textarea id="erantzun" rows="1" cols="150"  name="erantzun" ><?php echo $Erantzuna?></textarea></br>
	<!--Zailtasuna:<textarea id="zailtasun" rows="1" cols="3"  name="zailtasun" onchange="zailtasun()" ><?php echo $Zailtasuna?></textarea></br>-->
	Zailtasuna:<input type="number" id="zailtasun" name="zailtasun" min="1" max="5" value="<?php echo $Zailtasuna?>"  ></br>
	Gaia:<textarea id="gaia" rows="1" cols="20"  name="gaia" ><?php echo $Gaia?></textarea></br></br>
	<input type="submit" value="Aldaketa Gorde "id="aldaketaGorde" >
	</form>

			<br/><br/>
			<a href="reviewingQuizes.php"> <img src="./irudiak/atzera.jpg" height="50px"  width="50px"/></a>
			
 </form>
		
 
  
  </body>
</html>
