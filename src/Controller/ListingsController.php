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
        //$res = $this->getAllListings('price', 'desc');
        //$res = $this->getListingsByCategory('Books', 'date_created', 'desc');
        $res = $this->getListingsByCondition('New', 'date_created', 'desc');
        //$res = [$this->Listings->get(18)];
        //$this->convertImages($res);
        $this->set(['listings' => $res]);
    }

    /**
     * Get all fields of all listings.
     *
     * @param $sort_by the attribute to sort by.  This can be one of
     *                   'price' and 'date_created'.
     *        'asc_desc': the order to sort by.  This can be one of 'asc'
     *                    and 'desc'.
     * @return a Query object that contains all rows in the 'listings' database
     *         table.  The properties are:
     *         listing_num: the unique identifier of the listing
     *         date_created: a timestamp of when the listing was created.  This
     *                       has form 'yyyy-mm-dd hh:mm:ss'.
     *         is_sold: true if the listing has been sold.  false otherwise.
     *         price: a comma-separated list of prices.  The first field is the
     *                current price.
     *         location: the location to pickup the item at.
     *         item_desc: a description of the item.
     *         title: the title of the listing.
     *         category_id: the category of the listing.
     *         registered_user_id: the username of the user who created the
     *                             listing.
     *         course_id: the course that the item is for.  This is NULL if
     *                    the category is not 'Books'.
     *         condition_id: the condition of the item.
     *         thumbnail: a base 64 encoded string to be used in HTML img tags
     */
    private function getAllListings($sort_by=NULL, $asc_desc=NULL) {
        $res = NULL;
        if ($sort_by == NULL) {
            $res = $this->Listings->find('all');
        }
        else {
            $res = $this->Listings->find('sorted',
                                         ['sort_by' => $sort_by,
                                          'asc_desc' => $asc_desc]);
        }
        $this->convertImages($res);
        return $res;
    }

    /**
     * Get all listings from a specific category.  The listings can optionally
     * be sorted by an attribute in a specified order.
     *
     * @param $category the category of the listings to get
     * @param $sort_by (default = NULL) the attribute to sort by.  This can be
     *                   one of 'price' and 'date_created'.  If unspecified,
     *                   then the listings are not sorted.
     * @param $asc_desc (default = NULL) the order to sort by.  This can be one
     *                  of 'asc' and 'desc'.  This has no effect if $sort_by is
     *                  not given.  If this is unspecified, ascending order is
     *                  used.
     * @return a Query object that contains all rows in the 'listings' database
     *         table.  The properties are:
     *         listing_num: the unique identifier of the listing
     *         date_created: a timestamp of when the listing was created.  This
     *                       has form 'yyyy-mm-dd hh:mm:ss'.
     *         is_sold: true if the listing has been sold.  false otherwise.
     *         price: a comma-separated list of prices.  The first field is the
     *                current price.
     *         location: the location to pickup the item at.
     *         item_desc: a description of the item.
     *         title: the title of the listing.
     *         category_id: the category of the listing.
     *         registered_user_id: the username of the user who created the
     *                             listing.
     *         course_id: the course that the item is for.  This is NULL if
     *                    the category is not 'Books'.
     *         condition_id: the condition of the item.
     *         thumbnail: a base 64 encoded string to be used in HTML img tags
     */
    private function getListingsByCategory($category, $sort_by, $asc_desc) {
        $res = $this->Listings->find('category',
                                     ['category' => $category,
                                      'sort_by' => $sort_by,
                                      'asc_desc' => $asc_desc]);
        $this->convertImages($res);
        return $res;
    }

    /**
     * Get all listings of a specific condition.  The listings can optionally
     * be sorted by an attribute in a specified order.
     *
     * @param $condition the condition of the listings to get
     * @param $sort_by (default = NULL) the attribute to sort by.  This can be
     *                   one of 'price' and 'date_created'.  If unspecified,
     *                   then the listings are not sorted.
     * @param $asc_desc (default = NULL) the order to sort by.  This can be one
     *                  of 'asc' and 'desc'.  This has no effect if $sort_by is
     *                  not given.  If this is unspecified, ascending order is
     *                  used.
     * @return a Query object that contains all rows in the 'listings' database
     *         table.  The properties are:
     *         listing_num: the unique identifier of the listing
     *         date_created: a timestamp of when the listing was created.  This
     *                       has form 'yyyy-mm-dd hh:mm:ss'.
     *         is_sold: true if the listing has been sold.  false otherwise.
     *         price: a comma-separated list of prices.  The first field is the
     *                current price.
     *         location: the location to pickup the item at.
     *         item_desc: a description of the item.
     *         title: the title of the listing.
     *         category_id: the category of the listing.
     *         registered_user_id: the username of the user who created the
     *                             listing.
     *         course_id: the course that the item is for.  This is NULL if
     *                    the category is not 'Books'.
     *         condition_id: the condition of the item.
     *         thumbnail: a base 64 encoded string to be used in HTML img tags
     */
    private function getListingsByCondition($condition, $sort_by, $asc_desc) {
        $res = $this->Listings->find('condition',
                                     ['condition' => $condition,
                                      'sort_by' => $sort_by,
                                      'asc_desc' => $asc_desc]);
        $this->convertImages($res);
        return $res;
    }

    /**
     *  Convert images to a base 64 encoded string.  This is a convenience
     *  used to simplify code in other methods.
     *
     *  @param $res a Query object that contains rows in the 'listings'
     *         database table.  This is passed by reference, so on method
     *         termination, the 'thumbnail' property of each row has the
     *         converted image.
     */
    private function convertImages(&$res) {
        foreach($res as $row) {
            $img = base64_encode(stream_get_contents($row->image));
            $row->image = $img;
        }
    }
}
