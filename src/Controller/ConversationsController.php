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
     * Show messages for a given conversation.  The conversation must be
     * one that the currently logged in user partakes in.  If it is not,
     * then the PrivateMessages' index page is loaded.
     *
     * @param $id the conversation number
     * @return \Cake\Network\Response|null
     */
    public function index($id)
    {
        $this->setDefaultData();
        $this->paginate = [
            'contain' => ['RegisteredUsers'],
        ];
        if (!empty($id)) {
            $this->paginate['conditions'] = ['conversation_num' => $id, 
                                             'or' => ['registered_user_id' => $this->Auth->user()['username'],
                                                      'recipient_id' => $this->Auth->user()['username']]];
        }
        else {
            $this->Flash->error(__('Conversation not found.'));
            return $this->redirect(['controller' => 'PrivateMessages',
                                    'action' => 'index']);
        }
        $conversations = $this->paginate($this->Conversations);
        // registered_user_id is the user who started the conversation.
        // This may or may not have been the current user.  If not, then
        // the recipient of any new message that will be sent by the current
        // user will be registered_user_id.
        $sender = $this->Auth->user()['username'];
        if ($conversations->first()->registered_user_id == $sender) {
            $recipient = $conversations->first()->recipient_id;
        }
        else {
            $recipient = $conversations->first()->registered_user_id;
        }

        $this->set(compact('conversations'));
        $this->set('_serialize', ['conversations']);
        $this->set('sender', $sender);
        $this->set('recipient', $recipient);
        $this->set('conversation_id', $id);
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
     * Add a new message to a conversation.  The POST data must contain a field
     * for message.  Together with the parameters, the data is used to create
     * a new message.
     *
     * @param $sender the username of the sender of the message
     * @param $recipient the username of the reciever of the message
     * @param $id the conversation number
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($sender, $recipient, $id)
    {
        $this->setDefaultData();
        $conversation = $this->Conversations->newEntity();
        if ($this->request->is('post')) {
            // The data has the message.
            $conversation = $this->Conversations->patchEntity(
                $conversation, $this->request->data);
            $conversation->registered_user_id = $sender;
            $conversation->recipient_id = $recipient;
            $conversation->conversation_num = $id;
            $conversation->date_created = new \DateTime();
            if ($this->Conversations->save($conversation)) {
                $this->Flash->success(__('The conversation has been saved.'));

                return $this->redirect(['controller' => 'PrivateMessages',
                                        'action' => 'index']);
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


    public function isAuthorized($user) {
        $action = $this->request->param('action');
        if (in_array($action, ['index', 'add'])) {
            if (!empty($this->Auth->user())) {
                return true;
            }
        }
        return false;
    }

}
