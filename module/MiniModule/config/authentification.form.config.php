<?php
return array(
    'elements' => array(
        // la saisie du login (type text)
        array(
            'spec' => array(
                'type' => 'Zend\Form\Element\Text',
                'name' => 'login',
                'attributes' => array(
                    'size' => '20',
                ),
                'options' => array(
                    'label' => 'Login : ',
                ),
            ),
        ),
        array(
            'spec' => array(
                'type' => 'Zend\Form\Element\Text',
                'name' => 'Mdp',
                'attributes' => array(
                    'size' => '20',
                ),
                'options' => array(
                    'label' => 'Mot de passe : ',
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
?>