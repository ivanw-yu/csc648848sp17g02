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
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['login', 'add']);
        $this->Auth->allow(['add', 'logout']); // 4/2/17 added to allow logout
    }

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
        $this->setDefaultData();
        $registeredUser = $this->RegisteredUsers->newEntity();
        if ($this->request->is('post')) {
            $registeredUser = $this->RegisteredUsers->patchEntity($registeredUser, $this->request->data);

            if (isset($this->request->data['username'])) {
                $registeredUser->username = $this->request->data['username'];
            }
            else {
                $registeredUser->username = $this->request->data['Username'];
            }

            $registeredUser->date_created = new \DateTime();
            if (!$this->RegisteredUsers->exists(['username' => $registeredUser->username])&& !$this->RegisteredUsers->exists(['email' => $registeredUser->email])) 
            {
                $this->Flash->success(__('You are registered, welcome!'));
                $this->RegisteredUsers->save($registeredUser);
                $this->Auth->setUser($registeredUser); //line for logging in after registering
                return $this->redirect($this->referer());
            }
            else
            {
                $this->Flash->error(__('Registration has failed, username or email has already been taken... Please try again.'));
                return $this->redirect($this->referer());
            }
            
            /*if (!$this->RegisteredUsers->hasAny((array('RegisteredUsers.username' => $registeredUser->username, 'RegisteredUsers.email' => $registeredUser->email,))) 
            {
                $this->RegisteredUsers->save($registeredUser);
                return $this->redirect($this->referer());
            }
            */

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

    public function login() {
        $this->setDefaultData();
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if($this->request->data['trigger']=='Sell'){
                    return $this->redirect(['controller' => 'Listings',
                                        'action' => 'add']);
                }
                // this currently allows user to go to the same page after logging in.
                // change this back to $this->Auth->redirectUrl() if we want to redirect user to homepage after logging in.
                return $this->redirect($this->referer());//Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Login failed. Username or password is incorrect'));
                return  $this->redirect($this->referer());
            }
        }
        // added so logout will also redirect to same page?

        return $this->redirect($this->referer());//Auth->redirectUrl());
    }

    public function logout()
    {
        $this->setDefaultData();
        // this allows the user to logout, and the user is redirected to the same page.
        $this->Auth->logout();
        return $this->redirect($this->Auth->redirectUrl());
    }

}
