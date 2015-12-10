<?php
require "./vendor/autoload.php";

$myEventManager = new \Zend\EventManager\EventManager();

$listener = function($e) {
	$param = $e->getParams() ;
	echo "Bonjour $param[0]\n" ;
} ;

$autre = function($e) {
	echo "Bye\n" ;
} ;

$myEventManager->attach('lundi', $listener, 1) ;
$myEventManager->attach('lundi', $autre, 100) ;

$myEventManager->trigger('lundi',null,array('Nous sommes lundi')) ;

?>