
	
	function funtzioei_deia(formularioa)
		{
			var bet=denabeteta(formularioa);
			var izen=izena(formularioa);
			var abi1=abizena1(formularioa);
			var abi2=abizena2(formularioa);
			var pas=pasahitza(formularioa);
			var pos=posta(formularioa);
			var tel=telefonoa(formularioa);


			
			if (bet&&izen&& abi1&& abi2&&pas&&pos&&tel) 
			{
				formularioa.submit();
				return true;
			}
			else
			{
				return false;
			}
			
		}
		
/* 			function funtzioei_deia(formularioa)
		{
			denabeteta(formularioa);
			izena(formularioa);
			abizena1(formularioa);
			abizena2(formularioa);
			pasahitza(formularioa);
			posta(formularioa);
			telefonoa(formularioa);
			formularioa.submit();
		}
	 */
	
	
	function denabeteta(formularioa)
		{

			//Izena beteta  dagoen kontrolatu	
			bal_izen=formularioa.izena.value;
			if(bal_izen=="" || bal_izen.length==0)
			{
				alert( "Ez duzu izena idatzi");				
				return false;			
			}

			
			//Abizena1 beteta  dagoen kontrolatu	
			bal_abi1=formularioa.abizena1.value;
			if(bal_abi1=="" || bal_abi1.length==0)
			{
				alert( "Ez duzu lehenengo abizena idatzi");				
				return false;			
			}
			//Abizena2 beteta  dagoen kontrolatu	
			bal_abi2=formularioa.abizena2.value;
			if(bal_abi2=="" || bal_abi2.length==0)
			{
				alert( "Ez duzu bigarren abizena idatzi");				
				return false;			
			}

			
			//Posta beteta  dagoen kontrolatu	
			bal_posta=formularioa.posta.value;
			if(bal_posta=="" || bal_posta.length==0)
			{
				alert( "Ez duzu posta idatzi");				
				return false;			
			}
						
			//Pasahitza beteta dagoen kontrolatu
			bal_pas=formularioa.pasahitza.value;
			if(bal_pas=="" || bal_pas.length==0)
			{
				alert( "Ez duzu pasahitza idatzi");
				return false;
			}	
			
			//Telefonoa beteta  dagoen kontrolatu	
			bal_tel=formularioa.telefonoa.value;
			if(bal_tel=="" || bal_tel.length==0)
			{
				alert( "Ez duzu telefonoa idatzi");				
				return false;			
			}

			//Interesak beteta dagoen kontrolatu
			bal_inte=formularioa.interesak.value;
			if(bal_inte=="" || bal_inte.length==0)
			{
				alert( "Ez dituzu interesak idatzi");
				return false;
			}
			else
			{
				return true;
			}
		
		}
		
		
		 function izena(formularioa)
		{
			// Izenak bi hizki izan behar ditu minimo eta ezin du balore numerikorik izan
			bal_izen=formularioa.izena.value;
			var iz=/^([A-ZÑ][a-zñáéíóú]+(\s)*)+$/;
			if(! (iz.test(bal_izen)))
			{
				alert( "Izena ez duzu zuzen idatzi,lehen hizkia larriz eta ondorengoa xehez idatzi behar dituzu. ");
				return false;
			}
			else 
			{
				return true;
			}
		
		
		}
		
		
		function abizena1(formularioa)
		{
		// Abizenak bi hizki izan behar ditu minimo eta ezin du balore numerikorik izan	
			bal_abi1=formularioa.abizena1.value;
			var abiz1=/^([A-ZÑ][a-zñáéíóú]+(\s)*)+$/;
			if(! (abiz1.test(bal_abi1)))
			{
				alert( "Lehenengo abizena ez duzu zuzen idatzi, lehen hizkia larriz eta ondorengoak xehez idatzi behar dituzu. Abizen konposatua baduzu, formatu berdina jarraitu behar duzu.");
				return false;
			}
			else 
			{
				return true;
			}
		
		
		}
		
		function abizena2(formularioa)
		{
			// Abizenak bi hizki izan behar ditu minimo eta ezin du balore numerikorik izan
			bal_abi2=formularioa.abizena2.value;
			var abiz2=/^([A-ZÑ][a-zñáéíóú]+(\s)*)+$/;
			if(! (abiz2.test(bal_abi2)))
			{
				alert( "Bigarren abizena ez duzu zuzen idatzi, lehen hizkia larriz eta ondorengoak xehez idatzi behar dituzu. Abizen konposatua baduzu, formatu berdina jarraitu behar duzu.");
				return false;
			}
			else 
			{
				return true;
			}
		
		
		}
		
		function pasahitza(formularioa)
		{
			// Pasahitzak minimo 6 karaktere dituela kontrolatu
			bal_pas=formularioa.pasahitza.value;
			if(bal_pas.length<6 && bal_pas.length>1)
			{
				alert( "Pasahitzak 6 karaktere izan behar ditu gutxienez");
				return false;
			}
			else 
			{
				return true;
			}
		
		
		} 
		
		  function posta(formularioa)
		{
			bal_posta=formularioa.posta.value;
			
				var pos=/[a-z]+\d{3}@ikasle\.ehu\.e(s|us)/;

				if (! (pos.test(bal_posta)))
				{
					alert( "Postaren formatua gaizki dago: aaa000@ikasle.ehu.(eus/es)");
					return false;
				}
				else 
				{
					return true;
				}
					
		}   
		function telefonoa(formularioa)
		{
			bal_tel=formularioa.telefonoa.value;
		
			if( !(/^\d{9}$/.test(bal_tel)) && bal_tel.length >1 ) 
			{
				alert( "Ez duzu telefonoa ondo idatzi, 9 digitu izan behar ditu");	
				return false;
			}
			else 
			{
				return true;
			}
		} 
		
		function zuzena()
		{
			if (!(pasa=="BALIOZKOA"&& post=="MATRIKULATUA"))
			{
				return false;
			} else {
				return true;
			}
						
			
		}
		