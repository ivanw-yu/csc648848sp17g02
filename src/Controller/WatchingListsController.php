<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * WatchingLists Controller
 *
 * @property \App\Model\Table\WatchingListsTable $WatchingLists
 */
class WatchingListsController extends AppController
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
        $watchingLists = $this->paginate($this->WatchingLists);

        $this->set(compact('watchingLists'));
        $this->set('_serialize', ['watchingLists']);
    }

    /**
     * View method
     *
     * @param string|null $id Watching List id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $watchingList = $this->WatchingLists->get($id, [
            'contain' => ['RegisteredUsers', 'Listings']
        ]);

        $this->set('watchingList', $watchingList);
        $this->set('_serialize', ['watchingList']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $watchingList = $this->WatchingLists->newEntity();
        if ($this->request->is('post')) {
            $watchingList = $this->WatchingLists->patchEntity($watchingList, $this->request->data);
            if ($this->WatchingLists->save($watchingList)) {
                $this->Flash->success(__('The watching list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The watching list could not be saved. Please, try again.'));
        }
        $registeredUsers = $this->WatchingLists->RegisteredUsers->find('list', ['limit' => 200]);
        $listings = $this->WatchingLists->Listings->find('list', ['limit' => 200]);
        $this->set(compact('watchingList', 'registeredUsers', 'listings'));
        $this->set('_serialize', ['watchingList']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Watching List id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $watchingList = $this->WatchingLists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $watchingList = $this->WatchingLists->patchEntity($watchingList, $this->request->data);
            if ($this->WatchingLists->save($watchingList)) {
                $this->Flash->success(__('The watching list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The watching list could not be saved. Please, try again.'));
        }
        $registeredUsers = $this->WatchingLists->RegisteredUsers->find('list', ['limit' => 200]);
        $listings = $this->WatchingLists->Listings->find('list', ['limit' => 200]);
        $this->set(compact('watchingList', 'registeredUsers', 'listings'));
        $this->set('_serialize', ['watchingList']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Watching List id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $watchingList = $this->WatchingLists->get($id);
        if ($this->WatchingLists->delete($watchingList)) {
            $this->Flash->success(__('The watching list has been deleted.'));
        } else {
            $this->Flash->error(__('The watching list could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function display() {
        $b = $this->WatchingLists->find('all');
        $this->set(['id' => $b]);
    }
}
