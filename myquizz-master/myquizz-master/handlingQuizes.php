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
			xhttp2.open("GET","galderakSartu.php?galdera="+galdera+"&erantzuna="+erantzuna+"&zailtasuna="+zailtasuna+"&gaia="+gaia,true);
			xhttp2.send(null);
			
		}
	
	</script>
  </head>
  
  <body>
 <form id ="galdera" name ="galderasortu" method ="post" action="">

		<label>Galdera</label> <br/>
		<textarea id="gal" name="galdera" rows="4" cols="50" required></textarea><br/><br/>
		<label>Erantzuna</label><br/>
		<input type ="text" name="erantzuna" id="erantzuna" required> <br/><br/>
		<label>Zailtasuna </label>
		<select name='zailtasuna' id='zailtasuna'>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select><br><br>
		<label>Gaia</label><br/>
		<input type ="text" name="gaia" id="gaia" required> <br/><br/>

			
		<input type="button" name="bidali" value="bidali" onClick="galderaGehitu()">
		<input type="reset" name="Garbitu" value="Garbitu">
	    <input type="button" name="GalIkusi" value="Nire galderak ikusi" onClick="erakutsiGalderak()" >

 </form>
 	<div id="txtHint2">
	<p> Galdera ondo txertatu den edo ez ikusiko da hemen...</p>
	</div>
	</br>
	<div id="txtHint">
	<p> Galderak ikusteko hautatzen duzunean, hemen azalduko zaizkizu galderak.</p>
	</div>

		
  <a href="Ekintzak.html"> <img src="./irudiak/atzera.jpg" height="50px"  width="50px"/></a>
  
  </body>
</html>

