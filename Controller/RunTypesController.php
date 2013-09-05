<?php
App::uses('AppController', 'Controller');
/**
 * RunTypes Controller
 *
 * @property RunType $RunType
 */
class RunTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RunType->recursive = 0;
		$this->set('runTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->RunType->id = $id;
		if (!$this->RunType->exists()) {
			throw new NotFoundException(__('Invalid run type'));
		}
		$this->set('runType', $this->RunType->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RunType->create();
			if ($this->RunType->save($this->request->data)) {
				$this->Session->setFlash(__('The run type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The run type could not be saved. Please, try again.'));
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
		$this->RunType->id = $id;
		if (!$this->RunType->exists()) {
			throw new NotFoundException(__('Invalid run type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RunType->save($this->request->data)) {
				$this->Session->setFlash(__('The run type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The run type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RunType->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->RunType->id = $id;
		if (!$this->RunType->exists()) {
			throw new NotFoundException(__('Invalid run type'));
		}
		if ($this->RunType->delete()) {
			$this->Session->setFlash(__('Run type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Run type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->RunType->recursive = 0;
		$this->set('runTypes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->RunType->id = $id;
		if (!$this->RunType->exists()) {
			throw new NotFoundException(__('Invalid run type'));
		}
		$this->set('runType', $this->RunType->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->RunType->create();
			if ($this->RunType->save($this->request->data)) {
				$this->Session->setFlash(__('The run type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The run type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->RunType->id = $id;
		if (!$this->RunType->exists()) {
			throw new NotFoundException(__('Invalid run type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RunType->save($this->request->data)) {
				$this->Session->setFlash(__('The run type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The run type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RunType->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->RunType->id = $id;
		if (!$this->RunType->exists()) {
			throw new NotFoundException(__('Invalid run type'));
		}
		if ($this->RunType->delete()) {
			$this->Session->setFlash(__('Run type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Run type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
