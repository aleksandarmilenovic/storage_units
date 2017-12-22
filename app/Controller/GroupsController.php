<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 */
class GroupsController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;

	public function add(){

		if($this->request->is('post')){

			$this->Group->create();
			$this->Group->save($this->request->data);

			if($this->Group->save($this->request->data)){
					$this->Session->setFlash('Uspesno ste napravili grupu');
					$this->redirect(array('action' => 'index' ));
			}else{
				$this->Session->setFlash('Doslo je do greske!Probajte ponovo!!');
			}
		}

}



}
