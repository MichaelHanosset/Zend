<?php

namespace Upjv\LicPro;

require "./vendor/autoload.php";

class LicencePro {
	static $NbrInstance = 0 ;

	function __construct()
	{
		self::$NbrInstance++ ;
	}

	function __destruct()
	{
		self::$NbrInstance-- ;
	}

	static function getNbrInstance()
	{
		return self::$NbrInstance ;
	}
}
/* $config = array (
	'invokables' => array(
		'Upjv\LicPro\LicencePro' => '\Upjv\LicPro\LicencePro'
	)
)*/

$sm = new \Zend\ServiceManager\ServiceManager() ;
$smc = new \Zend\ServiceManager\Config(include 'conf.php') ;
$smc->configureServiceManager($sm);

/*$sm->setInvokableClass('promo', '\Upjv\LicPro\LicencePro') ;
$sm->setShared('promo', false) ;*/

$obj = $sm->get('Upjv\LicPro\LicencePro') ;
echo LicencePro::getNbrInstance()."\n" ;
$obj = $sm->get('Upjv\LicPro\LicencePro') ;
echo LicencePro::getNbrInstance()."\n" ;

?>