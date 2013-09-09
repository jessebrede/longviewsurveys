<?php

class LeadsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
	 public $scaffold = 'admin';

    public function index() {
        $this->set('leads', $this->Lead->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid lead'));
        }

        $lead = $this->Lead->findById($id);
        if (!$lead) {
            throw new NotFoundException(__('Invalid lead'));
        }
        $this->set('lead', $lead);
    }

    public function add() {
        if ($this->request->is('lead')) {
            $this->Lead->create();
            if ($this->Lead->save($this->request->data)) {
                $this->Session->setFlash(__('Your lead has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your lead.'));
        }
    }
	
	public function edit($id = null) { 
    if (!$id) {
        throw new NotFoundException(__('Invalid lead'));
    }

    $lead = $this->Lead->findById($id);
    if (!$lead) {
        throw new NotFoundException(__('Invalid lead'));
    }

    if ($this->request->is('lead') || $this->request->is('put')) {
        $this->Lead->id = $id;
        if ($this->Lead->save($this->request->data)) {
            $this->Session->setFlash(__('Your lead has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your lead.'));
    }

    if (!$this->request->data) {
        $this->request->data = $lead;
    }
}

public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Lead->delete($id)) {
        $this->Session->setFlash(__('The lead with id: %s has been deleted.', h($id)));
        $this->redirect(array('action' => 'index'));
    }
}

	
}

?>