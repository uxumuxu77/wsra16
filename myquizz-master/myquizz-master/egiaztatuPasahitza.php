<?php
////nusoap.php klasea gehitzen dugu
require_once('nusoap/lib/nusoap.php');
require_once('nusoap/lib/class.wsdlcache.php');

$soaperabil = new nusoap_client('http://websistema16.esy.es/myquizz-master/pasaZerbitzari.php?wsdl',false);


$dago=$soaperabil->call('pasaZerbitzari',array('x'=>$_GET['pas']),array('z'=>$_GET['ticket']));

if ($dago=="EZZUZENA"){
	echo 'Ez duzu tiket zuzenik, erosi bat erregistratu nahi baduzu.';
}
if ($dago=="BALIOGABEA"){
	echo 'Ezin da pasahitz hori erabili.Beste batekin saiatu';
}
else if ($dago=="BALIOZKOA"){
	echo 'BALIOZKOA';
}else{
    echo 'Errorea gertatu da.';
}
?>