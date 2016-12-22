

<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>SignIn</title>
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
      <span class="right"><a href="SignIn.php"><img src="irudiak/login.jpg" height="75" width="75"></a> </span>
	  <span class="right"><a href="signUp.html"><img src="irudiak/signUp.png" height="75" width="75"></a> </span>
	  <table align="right">
		<tr>
				<td>ANONIMOA</td>
				<td><img src=./irudiak/anonimo.png width="50" height="50"/></td>
			</tr>
	</table>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Home</a></span>
		<span><a href='GalderaAnonimo.php'>Galderak ikusi</a></span>
		<span><a href='credits.html'>Credits</a></span>
		<span><a href='getUserInform.html'>Ikasleak bilatu</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div align="center" style="overflow:auto;height:500px">
	<form id ="erregistro" name ="erregistro" method ="post" action="">
			<br/><br/>
			<b> Eposta*:</b><input type="text" name="posta" required>
			<br/><br/>
			<b> Pasahitza*:</b><input type="password" name="pasahitza" required>
			<br/><br/>
			
			<input type="reset" name="Garbitu" value="Garbitu">
			<input type="submit" name="logeatu" value="Logeatu">
			<a href="pasahitzaAldatu2.php">Ez zara pasahitzaz gogoratzen?</a>
			
			<br/><br/>

 </form>
	
 <?php

//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	

	
	if ($link->connect_error)
		{
			
			die('Ez da datu basera ondo konektatu:'.$link->connect_error);
			//exit();
		} 
	session_start();	

	$Ip=$_SERVER['REMOTE_ADDR'];
	if (isset($_POST['logeatu']))
	{
			

		if (!empty($_POST['posta'])&& !empty($_POST['pasahitza']))
		{
			$erabilposta=$_POST['posta'];
			$pasahitz=$_POST['pasahitza'];
			$posta2=null;
			

			$erabil= $link -> query("SELECT * FROM erabiltzaile WHERE Eposta='".$erabilposta."'");
			$orain=date('Y-m-d');
			
			$link ->query("INSERT INTO saiakera(ErabilEposta,Data) VALUES('$erabilposta','$orain')");
		
			
			$nireSai=$link -> query("SELECT * FROM saiakera WHERE data='".$orain."' AND ErabilEposta='".$erabilposta."'");
			$sai=mysqli_num_rows($nireSai);
			
			if($sai<3){
				if ($erabil){
						while($row = mysqli_fetch_assoc($erabil))
							{
										$posta2=$row['Eposta'];
										$pas2=$row['Pasahitza'];
							}
				}else{
							die("<p>Errorea gertatu da:</p>");
							
					}
							if($posta2 == $erabilposta &&(hash_equals($pas2,crypt($pasahitz,$pas2))))
							{
								$_SESSION['username'] = $erabilposta;
								
								$sql= $link -> query("DELETE FROM saiakera WHERE ErabilEposta='".$erabilposta."'");	
								$ordua= Date('Y-m-d H:i:s');
								$sql="INSERT INTO konexioak(Eposta,Ordua) 
								VALUES ('$erabilposta','$ordua')";
								if (!$link -> query($sql)){
									die("<p>Errorea gertatu da: ".$link -> error ."</p>");
								}else{
									echo 'konexioa zuzen sartu da';
									$_SESSION['logeatua']='BAI';
									if ($_SESSION['username']=="web000@ehu.es")
									{
										$_SESSION['rola']='IRAKASLE';
										header("Location:reviewingQuizes.php");
									} else{
											$_SESSION['rola']='IKASLE';
											header("Location:handlingQuizes.php");
										}
								}
							}else 
								{
									echo ('<p style="color:red;">Sartutako datuak ez dira zuzenak, saiatu berriro </p>');
									$_SESSION['logeatua']='EZ';
									
								}
			}	else 
			{
				echo'3 aldiz huts egin duzu. Gaur ezingo zara berriro sartu';
			}					
		}

	}
	
mysqli_close($link);
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