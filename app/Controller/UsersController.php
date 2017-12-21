<?php
App::uses('AppController', 'Controller');
//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * Users Controller
 */
class UsersController extends AppController {
	//public $components = array('Session');
/**
 * Scaffold
 *
 * @var mixed
 */


	public $scaffold;

	public $components = array('Paginator');

	public function beforeFilter(){
		$this->Auth->allow('add');
		//$this->Auth->allow('index');
	}

	public function login(){
		if ($this->request->is('post')) {
			if($this->Auth->login()){
			return $this->redirect($this->Auth->redirectUrl());
		}else{
			$this->Session->setFlash('Invalid username or password');
		}
			
		}
		
	}

	public function logout(){
		$this->Auth->logout();
		$this->redirect('index');
	}

	public function index(){
		$this->User->recursive = 0;
		$this->set('Users',$this->Paginator->paginate());
	}

	public function add(){

		if($this->request->is('post')){

			$this->User->create();
			$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
		//	$PasswordHasher = new SimplePasswordHasher(); // or add array('hashType' => '...') to overwrite default "sha1" type
	//		$this->request->data['User']['password'] = $PasswordHasher->hash($this->request->data['User']['password']);

			$this->User->save($this->request->data);

			if($this->User->save($this->request->data)){
					$this->Session->setFlash('Uspesno ste se registrovali');
					$this->redirect(array('action' => 'index' ));
			}else{
				$this->Session->setFlash('Doslo je do greske!Probajte ponovo!!');
			}


			// $this->Session->setFlash('Uspesno ste se registrovali');
			// $this->redirect('index');
		}

	}

}
