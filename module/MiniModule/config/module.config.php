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
			'mini-module/index/form' => __DIR__.'/../view/MiniModule/index/form.phtml'
		),
	),

	'controllers' => array(
		'invokables' => array(
		'index' => 'MiniModule\Controller\IndexController',
		),
	),
);

?>