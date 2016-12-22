
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>SignUp</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
		   </head>
  
  <body>
   <div id='page-wrap'>
	<header class='main' id='h1'>

          <span class="right"><a href="SignIn.php"><img src="irudiak/login.jpg"  height="75" width="75"></a> </span>
	  <span class="right"><a href="signUp.html"><img src="irudiak/signUp.png"  height="75" width="75"></a> </span>
	  	  	 <table align="right">
		<tr>
				<td>ANONIMOA</td>
				<td><img src=./irudiak/anonimo.png width="50" height="50"/></td>
			</tr>
	</table>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Home</a></span>
		<span><a href='/quizzes'>Quizzes</a></span>
		<span><a href='GalderaAnonimo.php'>Galderak ikusi</a></span>
		<span><a href='credits.html'>Credits</a></span>
		<span><a href='getUserInform.html'>Ikasleak bilatu</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div align="center" style="overflow:auto;height:500px">
<?php
	//$link = new mysqli("localhost","root","","quiz");
		$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	

	
	if ($link->connect_error)
		{
			
			die('Ez da datu basera ondo konektatu:'.$link->connect_error);
			//exit();
		} 
		if($_FILES['fitx1']['error']!=0){

		
			$image=null;
            $image_name="";
                }
		else
		{
            $file= $_FILES['fitx1']['tmp_name'];
			$image= addslashes(file_get_contents($_FILES['fitx1']['tmp_name']));
			$image_name= addslashes($_FILES['fitx1']['name']);
		}


		
	$email=$_POST['posta'];
	$izena=$_POST['izena'];
	$abize1=$_POST['abizena1'];
	$abize2=$_POST['abizena2'];
	$telef=$_POST['telefonoa'];
	$pasa=$_POST['pasahitza'];
	$pasaZer=$_POST['pasahitzaZer'];
	$postaZer=$_POST['postaZer'];
	$ticketZer=$_POST['ticketZer'];
	
	if (filter_var($email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[a-z]+\d{3}@ikasle\.ehu\.e(s|us)/"))) === false) 
	{
	echo("Emaila ez da zuzena, formatua honako hau da: aaaaaa000@ikasle.ehu.es/eus <a href='signUp.html'>Formulariora itzuli</a>");
	echo ('</br></br></br><img src="./irudiak/bera.jpg" height="200px"	width=" 150px"/>');
	
	} else if (filter_var($izena, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/([A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]+(\s){0,1})+/"))) === false)
		{
			echo("Izena ez da zuzena, formatua honako hau da: Aaaa Aaaa<a href='signUp.html'>Formulariora itzuli</a>");
				echo ('</br></br></br><img src="./irudiak/bera.jpg" height="200px"	width=" 150px"/>');
		}else if (filter_var($abize1, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/([A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]+(\s){0,1})+/"))) === false)
			{	
				echo("Lehenengo abizena ez da zuzena, formatua honakoa da: Aaaa Aaaa<a href='signUp.html'>Formulariora itzuli</a>");
					echo ('</br></br></br><img src="./irudiak/bera.jpg" height="200px"	width=" 150px"/>');
			}else if (filter_var($abize2, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/([A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]+(\s){0,1})+/"))) === false)
				{
					echo("Bigarren abizena ez da zuzena, formatua honakoa da: Aaaa Aaaa<a href='signUp.html'>Formulariora itzuli</a>");
						echo ('</br></br></br><img src="./irudiak/bera.jpg" height="200px"	width=" 150px"/>');
				}else if (filter_var($telef, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/\d{9}/"))) === false)
					{
						echo("Telefonoaren formatua ez da zuzena, 9 zenbaki izan behar ditu: 000000000<a href='signUp.html'>Formulariora itzuli</a>");
							echo ('</br></br></br><img src="./irudiak/bera.jpg" height="200px"	width=" 150px"/>');
					}else if (filter_var($pasa, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[a-zñáéíóúA-ZÑ0-9]{6,}/"))) === false)
						{
							echo("Pasahitza ez da zuzena, gutxienez 6 karaktere izan behar ditu<a href='signUp.html'>Formulariora itzuli</a>");
								echo ('</br></br></br><img src="./irudiak/bera.jpg" height="200px"	width=" 150px"/>');
							}else if ($pasaZer=="BALIOGABEA")
								{
								echo ("Idatzi duzun pasahitza ez da gogorra<a href='signUp.html'>Formulariora itzuli</a>");
									echo ('</br></br></br><img src="./irudiak/bera.jpg" height="200px"	width=" 150px"/>');
								} /*else if ($postaZer!="MATRIKULATUA")
									{
										echo("Zure posta ez dago matrikulatuta web sistema irakasgaian<a href='signUp.html'>Formulariora itzuli</a>");
									}*/ else if ($ticketZer=="BALIOGABEA")
									{
										echo("Zure ticketa ez da zuzena<a href='signUp.html'>Formulariora itzuli</a>");
											echo ('</br></br></br><img src="./irudiak/bera.jpg" height="200px"	width=" 150px"/>');
									}
	else
	{
		$pasaZifra=crypt($pasa,'st');
	if ($_POST['espezialitatea']=='Besterik')
	{
		$sql="INSERT INTO erabiltzaile(Izena,Abizena1,Abizena2,Eposta,Pasahitza,Telefonoa,Espezialitatea,Interesak,Argazkia,ArgazkiMota) 
	VALUES ('$_POST[izena]','$_POST[abizena1]','$_POST[abizena2]','$_POST[posta]','$pasaZifra','$_POST[telefonoa]','$_POST[testua]','$_POST[interesak]','$image','$image_name')";
	} 
	else 
	{
		$sql="INSERT INTO erabiltzaile(Izena,Abizena1,Abizena2,Eposta,Pasahitza,Telefonoa,Espezialitatea,Interesak,Argazkia,ArgazkiMota) 
		VALUES ('$_POST[izena]','$_POST[abizena1]','$_POST[abizena2]','$_POST[posta]','$pasaZifra','$_POST[telefonoa]','$_POST[espezialitatea]','$_POST[interesak]','$image','$image_name')";
		
	}
	

	
	$ema=mysqli_query($link,$sql);
	if(!$ema)
	{
		die("Email hori badago datu basean sartuta, beste batekin probatu");
		//echo "<a href='signUp.html'>Formulariora itzuli</a>";
		//die("Errorea datubasean datuak sartzean".mysqli_error());
	}
	else 
	{
		
		echo("Datuak ondo sartu dira. Prest dago zure erabiltzailea login egiteko. ");
		echo ('</br><img src="./irudiak/gora.jpg" height="200px"	width=" 150px"/>');
	}
	//mysqli_free_result($ema);
	mysqli_close($link);
	}
?>

</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
  
  </body>
</html>
