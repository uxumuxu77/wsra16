<?php
//nusoap.php klasea gehitzen dugu
require_once('nusoap/lib/nusoap.php');
require_once('nusoap/lib/class.wsdlcache.php');

//soap_server motako objektua sortzen dugu
$ns="http://websistema16.esy.es/myquizz-master/";  //name of the service
//$ns="http://localhost:1234/wsra16/myquizz-master/myquizz-master/";

$server = new soap_server;
$server->configureWSDL('ticketZerbitzari',$ns);
$server->wsdl->schemaTargetNamespace=$ns;

//inplementatu nahi dugun funtzioa erregistratzen dugu
$server->register('ticketZerbitzari',array('x'=>'xsd:string'),array('z'=>'xsd:string'),$ns);

//funtzioa inplementatzen dugu

function ticketZerbitzari($x)
{
	
	if ($x=="1234" || $x=="5678")
		{
			return "BALIOZKOA";
		} else return "BALIOGABEA";
}

//nusoap klaseko sevice metodoari dei egiten diogu

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>