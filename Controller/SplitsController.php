<?php
App::uses('AppController', 'Controller');
/**
 * Splits Controller
 *
 * @property Split $Split
 */
class SplitsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Split->recursive = 0;
		$this->set('splits', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Split->id = $id;
		if (!$this->Split->exists()) {
			throw new NotFoundException(__('Invalid split'));
		}
		$this->set('split', $this->Split->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Split->create();
			if ($this->Split->save($this->request->data)) {
				$this->Session->setFlash(__('The split has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The split could not be saved. Please, try again.'));
			}
		}
		$runs = $this->Split->Run->find('list', array('order'=>array('Run.date_time DESC')));
		$this->set(compact('runs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Split->id = $id;
		if (!$this->Split->exists()) {
			throw new NotFoundException(__('Invalid split'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Split->save($this->request->data)) {
				$this->Session->setFlash(__('The split has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The split could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Split->read(null, $id);
		}
		$runs = $this->Split->Run->find('list');
		$this->set(compact('runs'));
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
		$this->Split->id = $id;
		if (!$this->Split->exists()) {
			throw new NotFoundException(__('Invalid split'));
		}
		if ($this->Split->delete()) {
			$this->Session->setFlash(__('Split deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Split was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Split->recursive = 0;
		$this->set('splits', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Split->id = $id;
		if (!$this->Split->exists()) {
			throw new NotFoundException(__('Invalid split'));
		}
		$this->set('split', $this->Split->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Split->create();
			if ($this->Split->save($this->request->data)) {
				$this->Session->setFlash(__('The split has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The split could not be saved. Please, try again.'));
			}
		}
		$runs = $this->Split->Run->find('list');
		$this->set(compact('runs'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Split->id = $id;
		if (!$this->Split->exists()) {
			throw new NotFoundException(__('Invalid split'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Split->save($this->request->data)) {
				$this->Session->setFlash(__('The split has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The split could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Split->read(null, $id);
		}
		$runs = $this->Split->Run->find('list');
		$this->set(compact('runs'));
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
		$this->Split->id = $id;
		if (!$this->Split->exists()) {
			throw new NotFoundException(__('Invalid split'));
		}
		if ($this->Split->delete()) {
			$this->Session->setFlash(__('Split deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Split was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
