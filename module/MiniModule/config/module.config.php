<?php

 return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'index',
                        'action' => 'index'
                    )
                )
            ),
            
            'default' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                	'route' => '/form',
	                    'constraints' => array(),
	                    'defaults' => array(
	                        'controller' => 'index',
	                        'action' => 'form'
	                    ),
                ),
           	),
        )
    ),
	'view_manager' => array(
		'template_map' => array(
			'error' => __DIR__.'/../view/error.phtml',
			'layout/layout' => __DIR__.'/../view/layout/layout.phtml',
			'mini-module/index/index' => __DIR__.'/../view/MiniModule/index/index.phtml',
			'index/gmaps' => __DIR__.'/../view/gmaps.phtml',
			'mini-module/index/form' => __DIR__.'/../view/MiniModule/index/form.phtml',
			'mini-module/index/traite' => __DIR__.'/../view/MiniModule/index/traite.phtml'
		),
	),

	'controllers' => array(
		'invokables' => array(
		'index' => 'MiniModule\Controller\IndexController',
		),
	),

    'service_manager' => array(
		'factories' => array(
            'MiniModule\Form\Authentification' => 'MiniModule\Form\AuthentificationFormFactory',
        ),
        'services' => array(
        	'config_authentification_form' => include __DIR__.'/authentification.form.config.php',
        ),
    ),
);

?>