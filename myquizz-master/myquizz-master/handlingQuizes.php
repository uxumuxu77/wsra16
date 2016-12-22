<?php
	session_start();
	//$link = new mysqli("localhost","root","","quiz");
	$link=new mysqli("mysql.hostinger.es","u655664297_uxira","huM7AvQ1Lj","u655664297_quiz");
	
	if($_SESSION['logeatua'] != 'BAI' || $_SESSION['rola']!='IKASLE'){
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


<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>HandlingQuizes</title>
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
	

								
	
		xhttp=new XMLHttpRequest();
		
		xhttp.onreadystatechange= function()
		{
	
			//alert(xhttp.readyState);
			if ((xhttp.readyState==4)&&(xhttp.status==200))
			{ 	 
				document.getElementById("txtHint").innerHTML= xhttp.responseText;
			}
		}
		
		function erakutsiGalderak()
		{
			xhttp.open("GET","datuakIkusi.php",true);
			xhttp.send(null);
		}
		
		
		
		xhttp2=new XMLHttpRequest();
		
		xhttp2.onreadystatechange= function()
		{
	
			//alert(xhttp.readyState);
			if ((xhttp2.readyState==4)&&(xhttp2.status==200))
			{ 	 
				document.getElementById("txtHint2").innerHTML=xhttp2.responseText;
			}
		}


		
		function galderaGehitu()
		
		{
			var galdera = document.getElementById("gal").value;
			var erantzuna = document.getElementById("erantzuna").value;
			var zailtasuna = document.getElementById("zailtasuna").value;
			var gaia = document.getElementById("gaia").value;
			
			  if(galdera=="" || galdera.length==0)
			{
				alert( "Ez duzu galdera  idatzi");				
				return false;			
			}
                       else if(erantzuna=="" || erantzuna.length==0)
			{
				alert( "Ez duzu erantzuna idatzi");				
				return false;			
			}
                       else if(gaia=="" || gaia.length==0)
			{
				alert( "Ez duzu gaia idatzi");				
				return false;			
			} else 
                         {
			     xhttp2.open("GET","galderakSartu.php?galdera="+galdera+"&erantzuna="+erantzuna+"&zailtasuna="+zailtasuna+"&gaia="+gaia,true);
			     xhttp2.send(null);
                         }

		}
		
				
		xhttp3=new XMLHttpRequest();
		
		xhttp3.onreadystatechange= function()
		{
	
			//alert(xhttp.readyState);
			if ((xhttp3.readyState==4)&&(xhttp3.status==200))
			{ 	 
				document.getElementById("txtHint3").innerHTML=xhttp3.responseText;
			}
		}
		



		setInterval(function()
		{
			xhttp3.open("GET","galderaKopurua.php", true);
			xhttp3.send(null);
			
		},5000);
				
		
	
	</script>
  </head>
  
  <body>
   <div id='page-wrap'>
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
		<span><a href='layout2.php'>Home</a></span>

		<span><a href='galderak.php'>Galderak ikusi</a></span>
		<span><a href='handlingQuizes.php'>Galderak sortu</a></span>
		<span><a href='credits2.php'>Credits</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div align="center" style="overflow:auto;height:500px">
 <form id ="galdera" name ="galderasortu" method ="post" action="">

		<label>Galdera</label> <br/>
		<textarea id="gal" name="galdera" rows="4" cols="50"required></textarea><br/><br/>
		<label>Erantzuna</label><br/>
		<input type ="text" name="erantzuna" id="erantzuna" style="WIDTH: 200px; HEIGHT: 20px"required> <br/><br/>
		<label>Zailtasuna </label>
		<select name='zailtasuna' id='zailtasuna'>
			
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select><br><br>
		<label>Gaia</label><br/>
		<input type ="text" name="gaia" id="gaia" style="WIDTH: 200px; HEIGHT: 20px" required> <br/><br/>

			
		<input type="button" name="bidali" value="bidali" onClick="galderaGehitu()">
		<input type="reset" name="Garbitu" value="Garbitu">
	    <input type="button" name="GalIkusi" value="Nire galderak ikusi" onClick="erakutsiGalderak()" >

 </form>
	<br/>
 	<div id="txtHint3">
	<p> Zure galderak</p>
	</div>
	<br/>
 	<div id="txtHint2">
	<p> Galdera ondo txertatu den edo ez ikusiko da hemen...</p>
	</div>
	<br/>
	<div id="txtHint">
	<p> Galderak ikusteko hautatzen duzunean, hemen azalduko zaizkizu galderak.</p>
	</div>

		
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
  
  </body>
</html>

