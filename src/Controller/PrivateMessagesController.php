<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * PrivateMessages Controller
 *
 * @property \App\Model\Table\PrivateMessagesTable $PrivateMessages
 */
class PrivateMessagesController extends AppController
{

    /**
     * Show the private messages of the currently logged in user.  The
     * private messages are ordered from newest to oldest.
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id = null)
    {
        $this->setDefaultData();
        // This block does not work.
        //$this->paginate = [
            //'contain' => ['RegisteredUsers', 'Conversations']
        //];
        $user = $this->Auth->user()['username'];
        $listings =  TableRegistry::get('Listings');
        $this->set('items', $listings);

        if($id === null) {
            // 4/27 if $id is null, then just get all private messages associated with user.
            // 4/27/17: added 'listing_id' to reference the item being talked about in the message
            $this->paginate = [

                'fields' => [
                             'subject',
                             'listing_id',
                             'registered_user_id',
                             'recipient_id',
                             'conversation_id',
                             'is_read'
                            ],

                'order' => ['conversation_id' => 'desc'], // newest first.
                // Get only conversations that involve the current user.
                'conditions' => ['OR' => ['registered_user_id' => $user,
                                          'recipient_id' => $user]]
            ];

             $this->set('message_id', null);
             $listings =  TableRegistry::get('Listings');
             $this->set('items', $listings);
        } else {
        // 4/27 else if $id isn't null, then the user must be viewing all messages related to item, given by $id, and index will only show such items.

            $this->paginate = [
                'fields' => [
                             'subject',
                             'listing_id',
                             'registered_user_id',
                             'recipient_id',
                             'conversation_id',
                             'is_read'
                            ],
                'order' => ['conversation_id' => 'desc'], // newest first.
                // Get only conversations that involve the current user.
                'conditions' => ['OR' => ['registered_user_id' => $user,
                                          'recipient_id' => $user],
                                          'AND' => ['listing_id' => $id]]// 'AND' added 4/27/17
            ];
            //$privateMessages = $this->paginate($this->PrivateMessages);
            $this->set('message_id', $id);
            $item = TableRegistry::get('Listings')->find()->where(['listing_num' => $id])->first();
            $this->set('item', $item);
        }
        //$this->paginate('contain' => ['Listings']);  
        $privateMessages = $this->paginate($this->PrivateMessages);

        // 5/20 for items corresponding to the private message only
        //$items_for_message = $items->find()->where(['listing_num' => $privateMessage->listing_id]);
        //$this->set('items_for_message', $items_for_message);

        $this->set(compact('privateMessages'));
        $this->set('_serialize', ['privateMessages']);
    }

    /**
     * View method
     *
     * @param string|null $id Private Message id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $privateMessage = $this->PrivateMessages->get($id, [
            'contain' => ['RegisteredUsers', 'Conversations']
        ]);

        $this->set('privateMessage', $privateMessage);
        $this->set('_serialize', ['privateMessage']);
    }

    /**
     * Add a new private message.  The POST data must contain the fields
     * message, subject, and recipient_id.
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    
    public function add()
    {
        $this->setDefaultData();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $sender = $this->Auth->user()['username'];
            $conversations = TableRegistry::get('Conversations');
            // Adding a new private message really means starting a new
            // conversation.  convo_entity is the new conversation, which
            // is then used by the privateMessage entity to create a new
            // private message.
            $convo_entity = $conversations
                                ->createNewConvo(
                                    $data['message'],
                                    $sender,
                                    $data['recipient_id']
                                  );
            
            $privateMessage = $this->PrivateMessages->newEntity();
            $privateMessage = $this->PrivateMessages->patchEntity(
                $privateMessage, $data);
            //$privateMessage->subject = $data['listing_id'];
            $privateMessage->conversation_id = $convo_entity->conversation_num;
            $privateMessage->registered_user_id = $sender;

            $privateMessage->listing_id = $data['listing_id'];/*!==null ? $data['listing_id'] : 1 */// added 4/27/17 to allow listings_id foreign key to be placed in the new private messages row.

            $privateMessage->is_read = 0;
            if ($this->PrivateMessages->save($privateMessage)) {
                $this->Flash->success(__('The private message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The private message could not be saved. Please, try again.'));
        }
        $registeredUsers = $this->PrivateMessages->RegisteredUsers->find('list', ['limit' => 200]);
        $conversations = $this->PrivateMessages->Conversations->find('list', ['limit' => 200]);
        $this->set(compact('privateMessage', 'registeredUsers', 'conversations'));
        $this->set('_serialize', ['privateMessage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Private Message id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $privateMessage = $this->PrivateMessages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $privateMessage = $this->PrivateMessages->patchEntity($privateMessage, $this->request->data);
            if ($this->PrivateMessages->save($privateMessage)) {
                $this->Flash->success(__('The private message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The private message could not be saved. Please, try again.'));
        }
        $registeredUsers = $this->PrivateMessages->RegisteredUsers->find('list', ['limit' => 200]);
        $conversations = $this->PrivateMessages->Conversations->find('list', ['limit' => 200]);
        $this->set(compact('privateMessage', 'registeredUsers', 'conversations'));
        $this->set('_serialize', ['privateMessage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Private Message id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $privateMessage = $this->PrivateMessages->get($id);
        if ($this->PrivateMessages->delete($privateMessage)) {
            $this->Flash->success(__('The private message has been deleted.'));
        } else {
            $this->Flash->error(__('The private message could not be deleted. Please, try again.'));
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
