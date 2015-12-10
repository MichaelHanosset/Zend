<?php

	namespace MiniModule ;

	use Zend\ModuleManager\Feature\BootstrapListenerInterface ;
	use Zend\EventManager\EventInterface ;
	use Zend\View\Resolver\TemplateMapResolver ;
	use Zend\ModuleManager\Feature\ConfigProviderInterface ;
	use Zend\Mvc\Application ;
	use Zend\Mvc\MvcEvent ;
	use Zend\Mvc\Router\Http\Literal ;
	use Zend\ModuleManager\Feature\AutoloadProviderInterface ;

	class Module implements ConfigProviderInterface, BootstrapListenerInterface {
		public function onBootstrap (EventInterface $e) {
			/*$sm = $e->getTarget()->getServiceManager() ;
			$view = $sm->get('ViewManager') ;
			$resolv = new TemplateMapResolver(array(
				'error' => __DIR__.'/view/error.phtml',
				'layout/layout' => __DIR__.'/view/layout/layout.phtml',
			)
		) ;
		$view->getRenderer()->setResolver($resolv) ;*/

			$application = $e->getTarget() ;
			$event = $application->getEventManager() ;
				$event->attach( MvcEvent::EVENT_DISPATCH_ERROR, function(MvcEvent $e) {
					error_log($e->getError() ) ;
					error_log($e->getControllerClass().' '.$e->getController() ) ;
				}
				) ;

				$event->attach(MvcEvent::EVENT_RENDER_ERROR, function($e) {
					$exception=$e->getParam('exception') ;

					error_log($exception->getMessage()) ;
				}) ;

				$sm = $application->getServiceManager() ;
				/*$router = $sm->get('Router') ;
				$router->addRoute('principale', Literal::factory(array(
					'route' => '/',
					'defaults' => array(
						'controller' => 'index',
						'action' => 'index'
					)
				))) ;*/

		}

		public function getConfig(){
			return include __DIR__."/config/module.config.php" ;
		}

		public function getAutoloaderConfig(){
			return array(
				'Zend\Loader\StandardAutoloader' => array(
					'namespaces' => array(
						__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
					),
				),
			);
		}
	}
?>