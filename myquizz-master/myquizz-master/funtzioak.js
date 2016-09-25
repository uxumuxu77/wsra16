
	
	function funtzioei_deia(formularioa)
		{
			denabeteta(formularioa);
			pasahitza(formularioa);
			posta(formularioa);
			telefonoa(formularioa);
			formularioa.submit();
		}
	
	
	
	function denabeteta(formularioa)
		{

			//Izena beteta  dagoen kontrolatu	
			bal_izen=formularioa.izena.value;
			if(bal_izen=="" || bal_izen.length==0)
			{
				alert( "Ez duzu izena idatzi");				
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
		
		
		} 
		
		  function posta(formularioa)
		{
			bal_posta=formularioa.posta.value;
			
				var pos=/[a-z]+\d{3}@ikasle.ehu.e[s|us]/;

				if (! (pos.test(bal_posta)))
				{
					alert( "Postaren formatua gaizki dago: aaa000@ikasle.ehu.(eus/es)");
					return false;
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
		} 
