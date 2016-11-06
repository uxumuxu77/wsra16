<?php
////nusoap.php klasea gehitzen dugu
require_once('nusoap/lib/nusoap.php');
require_once('nusoap/lib/class.wsdlcache.php');

$soaperabil = new nusoap_client('http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl',true);

$eposta=$_GET['posta'];
$dago=$soaperabil->call('egiaztatuE',array('x'=>$_GET['posta']));

if ($dago=='BAI'){
	echo 'MATRIKULATUA';
}
else{
	echo 'Eposta ez dago Web Sistemak irakasgaian matrikulatuta';
}
?>