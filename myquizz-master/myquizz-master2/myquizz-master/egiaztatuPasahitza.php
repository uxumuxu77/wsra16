<?php
////nusoap.php klasea gehitzen dugu
require_once('nusoap/lib/nusoap.php');
require_once('nusoap/lib/class.wsdlcache.php');

$soaperabil = new nusoap_client('http://websistema16.esy.es/myquizz-master/pasaZerbitzari.php?wsdl',true);


$dago=$soaperabil->call('pasaZerbitzari',array('x'=>$_GET['pas']));

if ($dago=="BALIOGABEA"){
	echo 'Ezin da pasahitz hori erabili.';
}
else if ($dago=="BALIOZKOA"){
	echo 'Pasahitz hori zuzena da eta erabil dezakezu.';
}else{
    echo 'Errorea gertatu da.';
}
?>