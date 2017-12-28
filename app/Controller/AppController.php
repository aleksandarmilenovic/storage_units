<?php


App::uses('Controller', 'Controller');


class AppController extends Controller {



public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session'
    );
    public $helpers = array('Html', 'Form', 'Session');

public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow();
}


}
