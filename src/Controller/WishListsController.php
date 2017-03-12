<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * WishLists Controller
 *
 * @property \App\Model\Table\WishListsTable $WishLists
 */
class WishListsController extends AppController
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
        $wishLists = $this->paginate($this->WishLists);

        $this->set(compact('wishLists'));
        $this->set('_serialize', ['wishLists']);
    }

    /**
     * View method
     *
     * @param string|null $id Wish List id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $wishList = $this->WishLists->get($id, [
            'contain' => ['RegisteredUsers', 'Listings']
        ]);

        $this->set('wishList', $wishList);
        $this->set('_serialize', ['wishList']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wishList = $this->WishLists->newEntity();
        if ($this->request->is('post')) {
            $wishList = $this->WishLists->patchEntity($wishList, $this->request->data);
            if ($this->WishLists->save($wishList)) {
                $this->Flash->success(__('The wish list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wish list could not be saved. Please, try again.'));
        }
        $registeredUsers = $this->WishLists->RegisteredUsers->find('list', ['limit' => 200]);
        $listings = $this->WishLists->Listings->find('list', ['limit' => 200]);
        $this->set(compact('wishList', 'registeredUsers', 'listings'));
        $this->set('_serialize', ['wishList']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Wish List id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $wishList = $this->WishLists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wishList = $this->WishLists->patchEntity($wishList, $this->request->data);
            if ($this->WishLists->save($wishList)) {
                $this->Flash->success(__('The wish list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wish list could not be saved. Please, try again.'));
        }
        $registeredUsers = $this->WishLists->RegisteredUsers->find('list', ['limit' => 200]);
        $listings = $this->WishLists->Listings->find('list', ['limit' => 200]);
        $this->set(compact('wishList', 'registeredUsers', 'listings'));
        $this->set('_serialize', ['wishList']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Wish List id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wishList = $this->WishLists->get($id);
        if ($this->WishLists->delete($wishList)) {
            $this->Flash->success(__('The wish list has been deleted.'));
        } else {
            $this->Flash->error(__('The wish list could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function display() {
        $b = $this->WishLists->find('all');
        $this->set(['id' => $b]);
    }
}
