<?php

App::uses('AppController', 'Controller');

/**
 * Runs Controller
 *
 * @property Run $Run
 */
class RunsController extends AppController {

    public function stats() {
        $this->Run->recursive = 0;
//		$stats['total_km'] 
//		$query = $this -> Run -> query ("SELECT SUM(km) AS 'distance_km' FROM runs");
//		$query = $this -> Run -> Shoe -> query ("SELECT SUM(distance_km) as 'total_km' FROM shoes");
//		$stats['total_km'] = sprintf('%.2f',$query['0']['0']['distance_km']);
//		$stats['total_km'] = sprintf('%.2f',$query['0']['0']['total_km']);
//		echo "<pre>" . var_dump($query) . "</pre>";


        $this->Run->Shoe->recursive = 0;
        $shoes = $this->Run->Shoe->find('all', array('order' => 'name'));

        $stats = $this->Run->calculateStats();
//                echo "<pre>"; var_dump($stats); echo "</pre>";

        $this->set(compact('stats', 'shoes'));
    }

    public function update_calculations($id) {

        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        $this->Run->id = $id;
        if (!$this->Run->exists()) {
            throw new NotFoundException(__('Invalid run'));
        }

        $this->request->data = $this->Run->calculateSecondaryValues($id);

        if ($this->Run->save($this->request->data)) {
            $this->Session->setFlash(__('The run has been saved'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The run could not be saved. Please, try again.'));
        }
    }

    public function update_all_calculations() {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        $run_list = $this->Run->find('all', array('fields' => 'id'));

        foreach ($run_list as $run) {
            $id = $run['Run']['id'];
            $this->Run->id = $id;
            if (!$this->Run->exists()) {
                throw new NotFoundException(__('Invalid run'));
            }

            $this->request->data = $this->Run->calculateSecondaryValues($id);

            if (!$this->Run->save($this->request->data)) {
                $this->Session->setFlash(__('The run ' . $id . ' could not be saved. Please, try again.'));
            }
        }
        $this->Session->setFlash(__('All run data has been recalculated'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Run->recursive = 0;
        $this->paginate = array(
            'limit' => 25,
            'order' => array(
                'id' => 'desc')
        );
        $this->set('runs', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Run->id = $id;
        if (!$this->Run->exists()) {
            throw new NotFoundException(__('Invalid run'));
        }
        $this->Run->calculateSecondaryValues($id);

        $this->set('run', $this->Run->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Run->create();
            $run = $this->Run->save($this->request->data);
            if ($run) {
                $this->Run->Shoe->updateShoeMileage($this->request->data['Run']['shoe_id']);
                $this->request->data = $this->Run->calculateSecondaryValues($run['Run']['id']);
                $this->Run->save($this->request->data);
                $this->Session->setFlash(__('The run has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The run could not be saved. Please, try again.'));
            }
        }
        $shoes = $this->Run->Shoe->find('list');
        $runTypes = $this->Run->RunType->find('list');
        $routes = $this->Run->Route->find('list');
        $this->set(compact('shoes', 'runTypes', 'routes'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Run->id = $id;
        if (!$this->Run->exists()) {
            throw new NotFoundException(__('Invalid run'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Run->save($this->request->data)) {
                $this->Session->setFlash(__('The run has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The run could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Run->read(null, $id);
        }
        $shoes = $this->Run->Shoe->find('list');
        $runTypes = $this->Run->RunType->find('list');
        $routes = $this->Run->Route->find('list');
        $this->set(compact('shoes', 'runTypes', 'routes'));
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
        $this->Run->id = $id;
        if (!$this->Run->exists()) {
            throw new NotFoundException(__('Invalid run'));
        }
        if ($this->Run->delete()) {
            $this->Session->setFlash(__('Run deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Run was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Run->recursive = 0;
        $this->set('runs', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Run->id = $id;
        if (!$this->Run->exists()) {
            throw new NotFoundException(__('Invalid run'));
        }
        $this->set('run', $this->Run->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Run->create();
            if ($this->Run->save($this->request->data)) {
                $this->Session->setFlash(__('The run has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The run could not be saved. Please, try again.'));
            }
        }
        $shoes = $this->Run->Shoe->find('list');
        $runTypes = $this->Run->RunType->find('list');
        $routes = $this->Run->Route->find('list');

        $this->set(compact('shoes', 'runTypes', 'routes'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Run->id = $id;
        if (!$this->Run->exists()) {
            throw new NotFoundException(__('Invalid run'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Run->save($this->request->data)) {
                $this->Session->setFlash(__('The run has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The run could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Run->read(null, $id);
        }
        $shoes = $this->Run->Shoe->find('list');
        $runTypes = $this->Run->RunType->find('list');
        $routes = $this->Run->Route->find('list');
        $this->set(compact('shoes', 'runTypes', 'routes'));
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
        $this->Run->id = $id;
        if (!$this->Run->exists()) {
            throw new NotFoundException(__('Invalid run'));
        }
        if ($this->Run->delete()) {
            $this->Session->setFlash(__('Run deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Run was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
