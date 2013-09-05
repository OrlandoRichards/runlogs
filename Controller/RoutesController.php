<?php

App::uses('AppController', 'Controller');

/**
 * Routes Controller
 *
 * @property Route $Route
 */
class RoutesController extends AppController {

    /**
     * recalculate_all method
     * 
     * @return void
     * 
     */
    public function recalculate_all() {

        $this->Route->recursive = 0;

        $route_ids = $this->Route->find('all', array('fields' => array('Route.id')));
        //debug($route_ids);

        foreach ($route_ids as $route) {
            $this->recalculate($route['Route']['id']);
        }
        $this->Session->setFlash(__('All route stats has been recalculated '));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * recalculate method
     * 
     * @return void
     * 
     */
    public function recalculate($id = null) {
        $this->Route->id = $id;
        if (!$this->Route->exists()) {
            throw new NotFoundException(__('Invalid route'));
        }

        $this->request->data = $this->Route->read(null, $id);

        $stats = $this->Route->calculateStats($id);

        $this->request->data['Route']['total_km'] = $stats['TotalDistanceRun']['km'];
        $this->request->data['Route']['avg_km'] = $stats['distance']['avg'];
        //debug($this->request->data);

        $this->Route->save($this->request->data);
            
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Route->recursive = 0;
        $this->set('routes', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Route->id = $id;
        if (!$this->Route->exists()) {
            throw new NotFoundException(__('Invalid route'));
        }
        $stats = $this->Route->calculateStats($id);
        //debug($stats);
        $this->set('route', $this->Route->read(null, $id));
        $this->set('stats', $stats);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Route->create();
            if ($this->Route->save($this->request->data)) {
                $this->Session->setFlash(__('The route has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The route could not be saved. Please, try again.'));
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
        $this->Route->id = $id;
        if (!$this->Route->exists()) {
            throw new NotFoundException(__('Invalid route'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Route->save($this->request->data)) {
                $this->Session->setFlash(__('The route has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The route could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Route->read(null, $id);
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
        $this->Route->id = $id;
        if (!$this->Route->exists()) {
            throw new NotFoundException(__('Invalid route'));
        }
        if ($this->Route->delete()) {
            $this->Session->setFlash(__('Route deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Route was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Route->recursive = 0;
        $this->set('routes', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Route->id = $id;
        if (!$this->Route->exists()) {
            throw new NotFoundException(__('Invalid route'));
        }
        $this->set('route', $this->Route->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Route->create();
            if ($this->Route->save($this->request->data)) {
                $this->Session->setFlash(__('The route has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The route could not be saved. Please, try again.'));
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
        $this->Route->id = $id;
        if (!$this->Route->exists()) {
            throw new NotFoundException(__('Invalid route'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Route->save($this->request->data)) {
                $this->Session->setFlash(__('The route has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The route could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Route->read(null, $id);
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
        $this->Route->id = $id;
        if (!$this->Route->exists()) {
            throw new NotFoundException(__('Invalid route'));
        }
        if ($this->Route->delete()) {
            $this->Session->setFlash(__('Route deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Route was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
