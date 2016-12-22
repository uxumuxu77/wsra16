<?php
////nusoap.php klasea gehitzen dugu
require_once('nusoap/lib/nusoap.php');
require_once('nusoap/lib/class.wsdlcache.php');

$soaperabil = new nusoap_client('http://websistema16.esy.es/myquizz-master/pasaZerbitzari.php?wsdl',false);
//$soaperabil = new nusoap_client('http://localhost:1234/wsra16/myquizz-master/myquizz-master/pasaZerbitzari.php?wsdl',false);

$dago=$soaperabil->call('pasaZerbitzari',array('x'=>$_GET['pas']));

if ($dago=="BALIOGABEA"){
	echo 'BALIOGABEA';
}
else if ($dago=="BALIOZKOA"){
	echo 'BALIOZKOA';
}else if ($dago=="FITXA"){
    echo 'Errorea Fitxategia irakurtzean.';
}else 

	echo 'Erroreren bat gertatu da';
?>