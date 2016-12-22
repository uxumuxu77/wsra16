<?php
	session_start();
//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	
	if($_SESSION['logeatua'] != 'BAI' || $_SESSION['rola']!='IRAKASLE'){
		header("Location:Location.html");
		exit();
	}
	$erabiltzailea=$_SESSION['username'];
	$e=$link->query("SELECT * FROM erabiltzaile WHERE Eposta='$erabiltzailea'");
	$row=mysqli_fetch_array($e,MYSQLI_ASSOC);
	$ize=$row['Izena'];
	$argaz=base64_encode($row['Argazkia']);
	
mysqli_close($link);
?>
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
	<title>Galdera Aldatu eta Ikusi</title>
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
  <body><div id='page-wrap'>
	<header class='main' id='h1'>
<span class="right"><a href="logOut.php"> <img src="irudiak/logout.jpg" height="75" width="75"> </a> </span>
	  	  <table align="right">
		<tr>
				<td><?php echo $ize?></td>
				<td><img src=data:image/jpeg;base64,<?php echo $argaz?> width="50" height="50"/></td>
			</tr>
	</table>
    </header>
	<nav class='main' id='n1' role='navigation'>
			<span><a href='layout3.html'>Home</a></span>
		<span><a href='reviewingQuizes.php'>Galderak aldatu eta ikusi</a></span>
		<span><a href='galderaEzabatu.php'>Galderak ezabatu</a></span>
		<span><a href='erabilGalderakEzabatu.php'>Erabiltzaile baten galderak ezabatu</a></span>
		<span><a href='ShowUsersWithImage.php'>Erabiltzaileak bistaratu</a></span>
		<span><a href='erabilEzabatu.php'>Erabiltzaileak Ezabatu</a></span>
		<span><a href='credits3.html'>Credits</a></span>
		<!--<span><a href='getUserInform.html'>Ikasleak bilatu</a></span>-->

	</nav>
    <section class="main" id="s1">
    
	
	<div align="center" style="overflow:auto;height:500px">
  </br></br>
 <form id="galaldatu" method="post" action="galderaGorde.php">
	<textarea id="egilepost" rows="1" cols="20"  name="egilepost" style="visibility:hidden;"><?php echo $posta?></textarea>
	<textarea id="galdeZenbaki" rows="1" cols="20"  name="galdeZenbaki" style="visibility:hidden;"><?php echo $galzenbaki?></textarea></br>
 	Galdera:<textarea id="galde" rows="1" cols="125"  name="galde" ><?php echo $Galdera?></textarea></br></br>
	Erantzuna:<textarea id="erantzun" rows="1" cols="125"  name="erantzun" ><?php echo $Erantzuna?></textarea></br></br>
	<!--Zailtasuna:<textarea id="zailtasun" rows="1" cols="3"  name="zailtasun" onchange="zailtasun()" ><?php echo $Zailtasuna?></textarea></br>-->
	Zailtasuna:<input type="number" style="WIDTH: 50px; HEIGHT: 30px" id="zailtasun" name="zailtasun" min="1" max="5" value="<?php echo $Zailtasuna?>"  ></br></br>
	Gaia:<textarea id="gaia" rows="1" cols="20"  name="gaia" ><?php echo $Gaia?></textarea></br></br>
	<input type="submit" value="Aldaketa Gorde "id="aldaketaGorde" >
	</form>

			<br/><br/>
			
			
 </form>
		
 </div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
  
  </body>
</html>
