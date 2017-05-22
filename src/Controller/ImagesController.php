<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 */
class ImagesController extends AppController
{



    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Listings']
        ];
        $images = $this->paginate($this->Images);

        $this->set(compact('images'));
        $this->set('_serialize', ['images']);
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => ['Listings']
        ]);

        $this->set('image', $image);
        $this->set('_serialize', ['image']);
    }

    /**
     * Add images to a listing.  The POST data must contain paths to images
     * to save.
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $this->setDefaultData();
        //$image = $this->Images->newEntity();
        if ($this->request->is('post')) {
            //$save_successful = empty($id) ? false : true;
            $save_successful = false;
            $flagOneOrMoreFailed = false;
            $flagOneOrMoreSaved = false;
            //foreach($this->request->data as $path) {
                // if (!$this->Images->addImage($path, $id)) {
                //     $save_successful = false;
                //     break;
                // }
            $maxNumberOfImages = 3;
            for($i = 1 ; $i <= $maxNumberOfImages ; $i++){
                if($this->request->data['image'.$i]){
                $image = $this->Images->newEntity();
                $image->listing_id = $id;
                $image->image = $this->request->data['image'.$i];
                $save_successful = $this->Images->save($image);
                if(!$save_successful){
                    $flagOneOrMoreFailed = true;
                }
                if($save_successful){
                    $flagOneOrMoreSaved = true;
                }
            }
            }
            
            if ($flagOneOrMoreSaved && $flagOneOrMoreFailed) {
                $this->Flash->success(__('At-least one of the images was not saved'));
                return $this->redirect(['controller' => 'Listings',
                                        'action' => 'view', $id]);
            }
            if ($flagOneOrMoreSaved) {
                $this->Flash->success(__('The image has been saved.'));
                return $this->redirect(['controller' => 'Listings',
                                        'action' => 'view', $id]);
            }
                $this->Flash->error(__('The image could not be saved. Please, try again.'));
            }
        $listings = $this->Images->Listings->find('list', ['limit' => 200]);
        $this->set(compact('image', 'listings'));
        $this->set('_serialize', ['image']);
        $this->set('item_id', $id);
    }

    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->setDefaultData();
        $image = $this->Images->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $this->Images->patchEntity($image, $this->request->data);
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $listings = $this->Images->Listings->find('list', ['limit' => 200]);
        $this->set(compact('image', 'listings'));
        $this->set('_serialize', ['image']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {
        $action = $this->request->param('action');
        if (in_array($action, ['add', 'edit'])) {
            if (!empty($this->Auth->user())) {
                return true;
            }
        }
        return false;
    }

}
