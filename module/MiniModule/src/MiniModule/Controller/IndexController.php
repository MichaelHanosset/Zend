<?php
namespace MiniModule\Controller ;

//use Zend\Form\Factory ;
use Zend\Form\Form ;
use Zend\Mvc\Controller\AbstractActionController ;
use Zend\view\Model\ViewModel ;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return array('nom' => 'Titnitntintiitnitn');
    }

    /*public function gmapsAction()
    {
	    $markers = array(
	        'Mozzat Web Team' => '17.516684,79.961589',
	        'Home Town' => '16.916684,80.683594'
	    );  //markers location with latitude and longitude

	    $config = array(
	        'sensor' => 'true',         //true or false
	        'div_id' => 'map',          //div id of the google map
	        'div_class' => 'grid_6',    //div class of the google map
	        'zoom' => 5,                //zoom level
	        'width' => "600px",         //width of the div
	        'height' => "300px",        //height of the div
	        'lat' => 16.916684,         //lattitude
	        'lon' => 80.683594,         //longitude 
	        'animation' => 'none',      //animation of the marker
	        'markers' => $markers       //loading the array of markers
	    );

	    $map = $this->getServiceLocator()->get('GMaps\Service\GoogleMap'); //getting the google map object using service manager
	    $map->initialize($config);     //loading the config   
	    $html = $map->generate();      //genrating the html map content  
	    return new ViewModel(array('map_html' => $html));                //passing it to the view
    }*/

    public function formAction()
    {
    	/*$configForm = array(
            'elements' => array(
                // la saisie du login (type text)
                array(
                    'spec' => array(
                        'type' => 'Zend\Form\Element\Text',
                        'name' => 'log',
                        'attributes' => array(
                            'size' => '20',
                        ),
                        'options' => array(
                          'label' => 'Login : ',
                        ),
                    ),
                ),
                // le boutton de validation
                array(
                    'spec' => array(
                        'type' => 'Zend\Form\Element\Submit',
                        'name' => 'submit',
                        'attributes' => array(
                            'value' => 'Suite',
                        ),
                    ),
                ),
            ),
        );
        $factory = new Factory();
        $form = $factory->createForm( $configForm );*/

        $services = $this->getServiceLocator();
        $form = $services->get('MiniModule\Form\Authentification');

        if ( $this->getRequest()->isPost() ) {
            $form->setData( $this->getRequest()->getPost());
            if ($form->isValid()) {
                $vm = new ViewModel();
                $vm->setVariables( $form->getData() );
                $vm->setTemplate('mini-module/index/traite');
                return $vm;
            }
        }
        $form->setAttribute('action', $this->url()->fromRoute('default', array('action' => 'form' )) );
        return array( 'form' => $form );
    }

    public function traiteAction()
    {
        return array('login' => $_GET['log'] );
    }
}

?>