<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Conversations Controller
 *
 * @property \App\Model\Table\ConversationsTable $Conversations
 */
class ConversationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RegisteredUsers']
        ];
        $conversations = $this->paginate($this->Conversations);

        $this->set(compact('conversations'));
        $this->set('_serialize', ['conversations']);
    }

    /**
     * View method
     *
     * @param string|null $id Conversation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conversation = $this->Conversations->get($id, [
            'contain' => ['RegisteredUsers']
        ]);

        $this->set('conversation', $conversation);
        $this->set('_serialize', ['conversation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conversation = $this->Conversations->newEntity();
        if ($this->request->is('post')) {
            $conversation = $this->Conversations->patchEntity($conversation, $this->request->data);
            if ($this->Conversations->save($conversation)) {
                $this->Flash->success(__('The conversation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conversation could not be saved. Please, try again.'));
        }
        $registeredUsers = $this->Conversations->RegisteredUsers->find('list', ['limit' => 200]);
        $this->set(compact('conversation', 'registeredUsers'));
        $this->set('_serialize', ['conversation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Conversation id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $conversation = $this->Conversations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conversation = $this->Conversations->patchEntity($conversation, $this->request->data);
            if ($this->Conversations->save($conversation)) {
                $this->Flash->success(__('The conversation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conversation could not be saved. Please, try again.'));
        }
        $registeredUsers = $this->Conversations->RegisteredUsers->find('list', ['limit' => 200]);
        $this->set(compact('conversation', 'registeredUsers'));
        $this->set('_serialize', ['conversation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Conversation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conversation = $this->Conversations->get($id);
        if ($this->Conversations->delete($conversation)) {
            $this->Flash->success(__('The conversation has been deleted.'));
        } else {
            $this->Flash->error(__('The conversation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function display() {
        $b = $this->Conversations->find('all');
        $this->set(['id' => $b]);
    }
}
