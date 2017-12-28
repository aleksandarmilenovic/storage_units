<?php
App::uses('AppController', 'Controller');
/**
 * MeasurementUnits Controller
 *
 * @property MeasurementUnit $MeasurementUnit
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class MeasurementUnitsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MeasurementUnit->recursive = 0;
		$this->set('measurementUnits', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MeasurementUnit->exists($id)) {
			throw new NotFoundException(__('Invalid measurement unit'));
		}
		$options = array('conditions' => array('MeasurementUnit.' . $this->MeasurementUnit->primaryKey => $id));
		$this->set('measurementUnit', $this->MeasurementUnit->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MeasurementUnit->create();
			if ($this->MeasurementUnit->save($this->request->data)) {
				$this->Flash->success(__('The measurement unit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The measurement unit could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MeasurementUnit->exists($id)) {
			throw new NotFoundException(__('Invalid measurement unit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MeasurementUnit->save($this->request->data)) {
				$this->Flash->success(__('The measurement unit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The measurement unit could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MeasurementUnit.' . $this->MeasurementUnit->primaryKey => $id));
			$this->request->data = $this->MeasurementUnit->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MeasurementUnit->id = $id;
		if (!$this->MeasurementUnit->exists()) {
			throw new NotFoundException(__('Invalid measurement unit'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MeasurementUnit->delete()) {
			$this->Flash->success(__('The measurement unit has been deleted.'));
		} else {
			$this->Flash->error(__('The measurement unit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
