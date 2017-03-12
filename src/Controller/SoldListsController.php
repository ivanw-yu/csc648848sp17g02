<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SoldLists Controller
 *
 * @property \App\Model\Table\SoldListsTable $SoldLists
 */
class SoldListsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RegisteredUsers', 'Listings']
        ];
        $soldLists = $this->paginate($this->SoldLists);

        $this->set(compact('soldLists'));
        $this->set('_serialize', ['soldLists']);
    }

    /**
     * View method
     *
     * @param string|null $id Sold List id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $soldList = $this->SoldLists->get($id, [
            'contain' => ['RegisteredUsers', 'Listings']
        ]);

        $this->set('soldList', $soldList);
        $this->set('_serialize', ['soldList']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $soldList = $this->SoldLists->newEntity();
        if ($this->request->is('post')) {
            $soldList = $this->SoldLists->patchEntity($soldList, $this->request->data);
            if ($this->SoldLists->save($soldList)) {
                $this->Flash->success(__('The sold list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sold list could not be saved. Please, try again.'));
        }
        $registeredUsers = $this->SoldLists->RegisteredUsers->find('list', ['limit' => 200]);
        $listings = $this->SoldLists->Listings->find('list', ['limit' => 200]);
        $this->set(compact('soldList', 'registeredUsers', 'listings'));
        $this->set('_serialize', ['soldList']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sold List id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $soldList = $this->SoldLists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $soldList = $this->SoldLists->patchEntity($soldList, $this->request->data);
            if ($this->SoldLists->save($soldList)) {
                $this->Flash->success(__('The sold list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sold list could not be saved. Please, try again.'));
        }
        $registeredUsers = $this->SoldLists->RegisteredUsers->find('list', ['limit' => 200]);
        $listings = $this->SoldLists->Listings->find('list', ['limit' => 200]);
        $this->set(compact('soldList', 'registeredUsers', 'listings'));
        $this->set('_serialize', ['soldList']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sold List id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $soldList = $this->SoldLists->get($id);
        if ($this->SoldLists->delete($soldList)) {
            $this->Flash->success(__('The sold list has been deleted.'));
        } else {
            $this->Flash->error(__('The sold list could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function display() {
        $b = $this->SoldLists->find('all');
        $this->set(['id' => $b]);
    }
}
