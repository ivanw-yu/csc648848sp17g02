<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PurchasedLists Controller
 *
 * @property \App\Model\Table\PurchasedListsTable $PurchasedLists
 */
class PurchasedListsController extends AppController
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
        $purchasedLists = $this->paginate($this->PurchasedLists);

        $this->set(compact('purchasedLists'));
        $this->set('_serialize', ['purchasedLists']);
    }

    /**
     * View method
     *
     * @param string|null $id Purchased List id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchasedList = $this->PurchasedLists->get($id, [
            'contain' => ['RegisteredUsers', 'Listings']
        ]);

        $this->set('purchasedList', $purchasedList);
        $this->set('_serialize', ['purchasedList']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchasedList = $this->PurchasedLists->newEntity();
        if ($this->request->is('post')) {
            $purchasedList = $this->PurchasedLists->patchEntity($purchasedList, $this->request->data);
            if ($this->PurchasedLists->save($purchasedList)) {
                $this->Flash->success(__('The purchased list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchased list could not be saved. Please, try again.'));
        }
        $registeredUsers = $this->PurchasedLists->RegisteredUsers->find('list', ['limit' => 200]);
        $listings = $this->PurchasedLists->Listings->find('list', ['limit' => 200]);
        $this->set(compact('purchasedList', 'registeredUsers', 'listings'));
        $this->set('_serialize', ['purchasedList']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchased List id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchasedList = $this->PurchasedLists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchasedList = $this->PurchasedLists->patchEntity($purchasedList, $this->request->data);
            if ($this->PurchasedLists->save($purchasedList)) {
                $this->Flash->success(__('The purchased list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchased list could not be saved. Please, try again.'));
        }
        $registeredUsers = $this->PurchasedLists->RegisteredUsers->find('list', ['limit' => 200]);
        $listings = $this->PurchasedLists->Listings->find('list', ['limit' => 200]);
        $this->set(compact('purchasedList', 'registeredUsers', 'listings'));
        $this->set('_serialize', ['purchasedList']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchased List id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchasedList = $this->PurchasedLists->get($id);
        if ($this->PurchasedLists->delete($purchasedList)) {
            $this->Flash->success(__('The purchased list has been deleted.'));
        } else {
            $this->Flash->error(__('The purchased list could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function display() {
        $b = $this->PurchasedLists->find('all');
        $this->set(['id' => $b]);
    }
}
