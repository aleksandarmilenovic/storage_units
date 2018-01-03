<?php
App::uses('AppController', 'Controller');
//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * Users Controller
 */
class UsersController extends AppController {


public $components = array('Paginator', 'Flash');

// public function beforeFilter(){
// 	 parent::beforeFilter();
//     $this->Auth->allow();
// }

public function initDB() {
    $group = $this->User->Group;

    // Allow admins to everything
    $group->id = 1;
    $this->Acl->allow($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Users/index');
     $this->Acl->allow($group, 'controllers/Users/edit');
     $this->Acl->allow($group, 'controllers/Users/logout');

    // allow managers to posts and widgets
    $group->id = 2;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Users/add');
    $this->Acl->allow($group, 'controllers/Users/index');
    $this->Acl->allow($group, 'controllers/Users/logout');


    // allow users to only add and edit on posts and widgets
    $group->id = 3;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Group/index');
    // $this->Acl->allow($group, 'controllers/Posts/edit');
    // $this->Acl->allow($group, 'controllers/Widgets/add');
    // $this->Acl->allow($group, 'controllers/Widgets/edit');


    // allow basic users to log out
    $this->Acl->allow($group, 'controllers/Users/index');
    $this->Acl->allow($group, 'controllers/Users/logout');


    // we add an exit to avoid an ugly "missing views" error message
    echo "all done";
    exit;
}

	public function login(){
		if ($this->request->is('post')) {
			if($this->Auth->login()){
			return $this->redirect($this->Auth->redirectUrl());
		}else{
			$this->Flash->success(__('Invalid username or password'));
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
	//$this->Session->setFlash('The user has been saved.', 'success');
		if($this->request->is('post')){

			$this->User->create();
			$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);		
			$this->User->save($this->request->data);

			if($this->User->save($this->request->data)){
					$this->Flash->success(__('Uspesno ste se registrovali'));
					$this->redirect(array('action' => 'index' ));
			}else{
				$this->Flash->success(__('Doslo je do greske!Probajte ponovo!!'));
			}


			// $this->Session->setFlash('Uspesno ste se registrovali');
			// $this->redirect('index');
		}

	}

	public function edit($id){
        $data = $this->User->findById($id);

        if ($this->request->is(array('post', 'put'))){
            $this->User->id = $id;
            $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
            if($this->User->save($this->request->data)){
                $this->Flash->success(__('The user has been saved.', 'success'));
                return $this->redirect(array('action' => 'index'));
            } else {
            $this->Flash->success(__('The user could not be saved. Please, try again.'));
            } 
        }else {
            $this->request->data = $data;
        }
    }

    public function save_edit(){

    	    $this->User->create();
    	if($this->request->is('post')){

    		if($this->request->data['User']['USER_ID'] == null){

			$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);		
			$this->User->save($this->request->data);

			if($this->User->save($this->request->data)){
					$this->Flash->success(__('Uspesno ste se registrovali'));
					$this->redirect(array('action' => 'index' ));
			}else{
				$this->Flash->success(__('Doslo je do greske!Probajte ponovo!!'));
			}

    		}//REGISTRACIJA
    		else {
    		$this->User->id = $this->request->data['User']['USER_ID'];
            $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
            if($this->User->save($this->request->data)){
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
            $this->Flash->success(__('The user could not be saved. Please, try again.'));
            } 
    		}
    	$this->User->create();
    	debug($this->request->data);
    	$this->Flash->success(__($this->request->data['User']['USER_ID']));
    	
    }
    }


public function view($id = null) {

        if (!$this->User->exists($id)) {

            throw new NotFoundException(__('Invalid user'));

        }

        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));

        $this->set('user', $this->User->find('first', $options));

    }


    public function delete($id) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->success(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
