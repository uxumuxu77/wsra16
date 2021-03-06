<?php
//nusoap.php klasea gehitzen dugu
require_once('nusoap/lib/nusoap.php');
require_once('nusoap/lib/class.wsdlcache.php');

//soap_server motako objektua sortzen dugu
$ns="http://websistema16.esy.es/myquizz-master/";  //name of the service
//$ns="http://localhost:1234/wsra16/myquizz-master/myquizz-master/";

$server = new soap_server;
$server->configureWSDL('pasaZerbitzari',$ns);
$server->wsdl->schemaTargetNamespace=$ns;

//inplementatu nahi dugun funtzioa erregistratzen dugu
$server->register('pasaZerbitzari',array('x'=>'xsd:string'),array('z'=>'xsd:string'),$ns);

//funtzioa inplementatzen dugu

function pasaZerbitzari($x)
{
	$fitxa=fopen("toppasswords.txt","r");
	if ($fitxa==NULL)
	{	
		return'FITXA';
	}else {
			while (!feof($fitxa))
				{			
					if(trim(fgets($fitxa))==$x)
						{
							fclose ($fitxa);
							return "BALIOGABEA";    
						}

				}
				 fclose ($fitxa);
			return "BALIOZKOA";
           
			}
}

//nusoap klaseko sevice metodoari dei egiten diogu

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>