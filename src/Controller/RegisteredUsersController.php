<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RegisteredUsers Controller
 *
 * @property \App\Model\Table\RegisteredUsersTable $RegisteredUsers
 */
class RegisteredUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $registeredUsers = $this->paginate($this->RegisteredUsers);

        $this->set(compact('registeredUsers'));
        $this->set('_serialize', ['registeredUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Registered User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $registeredUser = $this->RegisteredUsers->get($id, [
            'contain' => ['Conversations', 'Listings', 'PrivateMessages', 'PurchasedLists', 'SellingLists', 'SoldLists', 'WatchingLists', 'WishLists']
        ]);

        $this->set('registeredUser', $registeredUser);
        $this->set('_serialize', ['registeredUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $registeredUser = $this->RegisteredUsers->newEntity();
        if ($this->request->is('post')) {
            $registeredUser = $this->RegisteredUsers->patchEntity($registeredUser, $this->request->data);
            $registeredUser->username = $this->request->data['Username'];
            if ($this->RegisteredUsers->save($registeredUser)) {
                $this->Flash->success(__('The registered user has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The registered user could not be saved. Please, try again.'));
        }
        $this->set(compact('registeredUser'));
        $this->set('_serialize', ['registeredUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Registered User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $registeredUser = $this->RegisteredUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registeredUser = $this->RegisteredUsers->patchEntity($registeredUser, $this->request->data);
            if ($this->RegisteredUsers->save($registeredUser)) {
                $this->Flash->success(__('The registered user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registered user could not be saved. Please, try again.'));
        }
        $this->set(compact('registeredUser'));
        $this->set('_serialize', ['registeredUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Registered User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registeredUser = $this->RegisteredUsers->get($id);
        if ($this->RegisteredUsers->delete($registeredUser)) {
            $this->Flash->success(__('The registered user has been deleted.'));
        } else {
            $this->Flash->error(__('The registered user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
