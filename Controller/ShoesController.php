<?php
App::uses('AppController', 'Controller');
/**
 * Shoes Controller
 *
 * @property Shoe $Shoe
 */
class ShoesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Shoe->recursive = 0;
		$this->set('shoes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Shoe->id = $id;
		if (!$this->Shoe->exists()) {
			throw new NotFoundException(__('Invalid shoe'));
		}
                $this->Shoe->updateShoeMileage($id);
		$this->set('shoe', $this->Shoe->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Shoe->create();
			if ($this->Shoe->save($this->request->data)) {
				$this->Session->setFlash(__('The shoe has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shoe could not be saved. Please, try again.'));
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
		$this->Shoe->id = $id;
		if (!$this->Shoe->exists()) {
			throw new NotFoundException(__('Invalid shoe'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Shoe->save($this->request->data)) {
				$this->Session->setFlash(__('The shoe has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shoe could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Shoe->read(null, $id);
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
		$this->Shoe->id = $id;
		if (!$this->Shoe->exists()) {
			throw new NotFoundException(__('Invalid shoe'));
		}
		if ($this->Shoe->delete()) {
			$this->Session->setFlash(__('Shoe deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Shoe was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Shoe->recursive = 0;
		$this->set('shoes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Shoe->id = $id;
		if (!$this->Shoe->exists()) {
			throw new NotFoundException(__('Invalid shoe'));
		}
		$this->set('shoe', $this->Shoe->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Shoe->create();
			if ($this->Shoe->save($this->request->data)) {
				$this->Session->setFlash(__('The shoe has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shoe could not be saved. Please, try again.'));
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
		$this->Shoe->id = $id;
		if (!$this->Shoe->exists()) {
			throw new NotFoundException(__('Invalid shoe'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Shoe->save($this->request->data)) {
				$this->Session->setFlash(__('The shoe has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shoe could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Shoe->read(null, $id);
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
		$this->Shoe->id = $id;
		if (!$this->Shoe->exists()) {
			throw new NotFoundException(__('Invalid shoe'));
		}
		if ($this->Shoe->delete()) {
			$this->Session->setFlash(__('Shoe deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Shoe was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
