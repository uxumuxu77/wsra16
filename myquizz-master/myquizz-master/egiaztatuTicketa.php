<?php
////nusoap.php klasea gehitzen dugu
require_once('nusoap/lib/nusoap.php');
require_once('nusoap/lib/class.wsdlcache.php');

$soaperabil = new nusoap_client('http://websistema16.esy.es/myquizz-master/ticketZerbitzari.php?wsdl',false);
//$soaperabil = new nusoap_client('http://localhost:1234/wsra16/myquizz-master/myquizz-master/ticketZerbitzari.php?wsdl',false);

$dago=$soaperabil->call('ticketZerbitzari',array('x'=>$_GET['ticketa']));

if ($dago=="BALIOGABEA"){
	echo 'BALIOGABEA';
}
else if ($dago=="BALIOZKOA"){
	echo 'BALIOZKOA';
}else if ($dago=="HUTSA"){
    echo 'Tiketa izatea beharrezkoa da';
}else 

	echo 'Erroreren bat gertatu da';
?>