<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Conditions Controller
 *
 * @property \App\Model\Table\ConditionsTable $Conditions
 */
class ConditionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $conditions = $this->paginate($this->Conditions);

        $this->set(compact('conditions'));
        $this->set('_serialize', ['conditions']);
    }

    /**
     * View method
     *
     * @param string|null $id Condition id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $condition = $this->Conditions->get($id, [
            'contain' => ['Listings']
        ]);

        $this->set('condition', $condition);
        $this->set('_serialize', ['condition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $condition = $this->Conditions->newEntity();
        if ($this->request->is('post')) {
            $condition = $this->Conditions->patchEntity($condition, $this->request->data);
            if ($this->Conditions->save($condition)) {
                $this->Flash->success(__('The condition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The condition could not be saved. Please, try again.'));
        }
        $this->set(compact('condition'));
        $this->set('_serialize', ['condition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Condition id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $condition = $this->Conditions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $condition = $this->Conditions->patchEntity($condition, $this->request->data);
            if ($this->Conditions->save($condition)) {
                $this->Flash->success(__('The condition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The condition could not be saved. Please, try again.'));
        }
        $this->set(compact('condition'));
        $this->set('_serialize', ['condition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Condition id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $condition = $this->Conditions->get($id);
        if ($this->Conditions->delete($condition)) {
            $this->Flash->success(__('The condition has been deleted.'));
        } else {
            $this->Flash->error(__('The condition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
