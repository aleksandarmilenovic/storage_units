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
		$this->Auth->allow('initDB');
	}

	public function initDB(){
		$group = $this->User->Group;

   	
   		$group->id = 1;
    	$this->Acl->allow($group, 'controllers');

    	
   		$group->id = 2;
    	$this->Acl->deny($group, 'controllers');
    	$this->Acl->allow($group, 'controllers/Users');
   	 	$this->Acl->allow($group, 'controllers/Groups');

  
   		$group->id = 3;
    	$this->Acl->deny($group, 'controllers');
   		$this->Acl->allow($group, 'controllers/Users/index');
   		$this->Acl->deny($group,'controllers/Users/add');
   		// $this->Acl->allow($group, 'controllers/Posts/edit');
   	 // 	$this->Acl->allow($group, 'controllers/Widgets/add');
    	// $this->Acl->allow($group, 'controllers/Widgets/edit');

    
    	$this->Acl->allow($group, 'controllers/users/logout');

    // we add an exit to avoid an ugly "missing views" error message
    echo "all done";
    exit;


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
		$this->redirect('../');
	}

	public function index(){
		$this->User->recursive = 0;
		$this->set('Users',$this->Paginator->paginate());
	} 

	public function add(){

		if($this->request->is('post')){

			$this->User->create();
			$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);		
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
