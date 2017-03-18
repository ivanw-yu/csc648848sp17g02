<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Listings Controller
 *
 * @property \App\Model\Table\ListingsTable $Listings
 */
class ListingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'RegisteredUsers', 'Courses', 'Conditions']
        ];
        $listings = $this->paginate($this->Listings);

        $this->set(compact('listings'));
        $this->set('_serialize', ['listings']);
    }

    /**
     * View method
     *
     * @param string|null $id Listing id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $listing = $this->Listings->get($id, [
            'contain' => ['Categories', 'RegisteredUsers', 'Courses', 'Conditions', 'PurchasedLists', 'SellingLists', 'SoldLists', 'Tags', 'WatchingLists', 'WishLists']
        ]);

        $this->set('listing', $listing);
        $this->set('_serialize', ['listing']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $listing = $this->Listings->newEntity();
        if ($this->request->is('post')) {
            $listing = $this->Listings->patchEntity($listing, $this->request->data);
            if ($this->Listings->save($listing)) {
                $this->Flash->success(__('The listing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The listing could not be saved. Please, try again.'));
        }
        $categories = $this->Listings->Categories->find('list', ['limit' => 200]);
        $registeredUsers = $this->Listings->RegisteredUsers->find('list', ['limit' => 200]);
        $courses = $this->Listings->Courses->find('list', ['limit' => 200]);
        $conditions = $this->Listings->Conditions->find('list', ['limit' => 200]);
        $this->set(compact('listing', 'categories', 'registeredUsers', 'courses', 'conditions'));
        $this->set('_serialize', ['listing']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Listing id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $listing = $this->Listings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $listing = $this->Listings->patchEntity($listing, $this->request->data);
            if ($this->Listings->save($listing)) {
                $this->Flash->success(__('The listing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The listing could not be saved. Please, try again.'));
        }
        $categories = $this->Listings->Categories->find('list', ['limit' => 200]);
        $registeredUsers = $this->Listings->RegisteredUsers->find('list', ['limit' => 200]);
        $courses = $this->Listings->Courses->find('list', ['limit' => 200]);
        $conditions = $this->Listings->Conditions->find('list', ['limit' => 200]);
        $this->set(compact('listing', 'categories', 'registeredUsers', 'courses', 'conditions'));
        $this->set('_serialize', ['listing']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Listing id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $listing = $this->Listings->get($id);
        if ($this->Listings->delete($listing)) {
            $this->Flash->success(__('The listing has been deleted.'));
        } else {
            $this->Flash->error(__('The listing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function display() {
        $res = $this->getAllListings();
        $this->set(['listings' => $res]);
    }

    public function getAllListings() {
        $res = $this->Listings->find('all');
        foreach($res as $row) {
	    $img = base64_encode(stream_get_contents($row->image));
            $row->image = $img;
        }
        return $res;
    }
}
