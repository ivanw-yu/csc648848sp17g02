<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SellingLists Controller
 *
 * @property \App\Model\Table\SellingListsTable $SellingLists
 */
class SellingListsController extends AppController
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
        $sellingLists = $this->paginate($this->SellingLists);

        $this->set(compact('sellingLists'));
        $this->set('_serialize', ['sellingLists']);
    }

    /**
     * View method
     *
     * @param string|null $id Selling List id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sellingList = $this->SellingLists->get($id, [
            'contain' => ['RegisteredUsers', 'Listings']
        ]);

        $this->set('sellingList', $sellingList);
        $this->set('_serialize', ['sellingList']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sellingList = $this->SellingLists->newEntity();
        if ($this->request->is('post')) {
            $sellingList = $this->SellingLists->patchEntity($sellingList, $this->request->data);
            if ($this->SellingLists->save($sellingList)) {
                $this->Flash->success(__('The selling list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The selling list could not be saved. Please, try again.'));
        }
        $registeredUsers = $this->SellingLists->RegisteredUsers->find('list', ['limit' => 200]);
        $listings = $this->SellingLists->Listings->find('list', ['limit' => 200]);
        $this->set(compact('sellingList', 'registeredUsers', 'listings'));
        $this->set('_serialize', ['sellingList']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Selling List id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sellingList = $this->SellingLists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sellingList = $this->SellingLists->patchEntity($sellingList, $this->request->data);
            if ($this->SellingLists->save($sellingList)) {
                $this->Flash->success(__('The selling list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The selling list could not be saved. Please, try again.'));
        }
        $registeredUsers = $this->SellingLists->RegisteredUsers->find('list', ['limit' => 200]);
        $listings = $this->SellingLists->Listings->find('list', ['limit' => 200]);
        $this->set(compact('sellingList', 'registeredUsers', 'listings'));
        $this->set('_serialize', ['sellingList']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Selling List id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sellingList = $this->SellingLists->get($id);
        if ($this->SellingLists->delete($sellingList)) {
            $this->Flash->success(__('The selling list has been deleted.'));
        } else {
            $this->Flash->error(__('The selling list could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function display() {
        $b = $this->SellingLists->find('all');
        $this->set(['id' => $b]);
    }
}