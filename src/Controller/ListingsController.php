<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Listings Controller
 *
 * @property \App\Model\Table\ListingsTable $Listings
 */
class ListingsController extends AppController
{

    public $blobImageToUpload;
    public $helpers = array('GoogleMap');

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['view', 'index']);
    }

    /**
     * Show all listings, filtered by given fields.  If a field is not
     * given, then it is not filtered and all possible values of it are
     * included.  Any filters that are given are combined using a
     * conjunction.  The filters are given through a GET request.
     *
     * The valid fields to send are 'category', 'course', and 'condition'.
     *
     * As an example,
     *     <?= $this->Html->link('Used Books',
     *                           ['controller' => 'Listings',
     *                            'action' => 'index',
     *                            'category' => 'books',
     *                            'condition' => 'used']);?>
     *
     * creates a link that will show listings from the books category AND
     * that are used.  No value for courses was given, so the listings will
     * not be filtered by course, meaning that all courses will be included.
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->setDefaultData();
        $filtered_listings = NULL;
        $list_was_filtered = false; // True if user filtered by category.
	$no_results_found = false; // True if no results were found.
        if (!empty($this->request->query) && $this->request->query['tags'] !== NULL) {
            $tags = preg_split('/[\s,]+/', trim($this->request->query['tags']));
            //$table =  TableRegistry::get('Tags');
            //$opts = ['tags' => $tags];
            //$filtered_listings = $table->find('listings', $opts);
            // Get all listings with titles/item desc that contain the tags.
            $j = 0;
            $n = count($tags);
            $filtered_listings = $this
                ->Listings
                ->find()
                ->distinct(['listing_num'])
                ->where(['OR' => [
                    ['item_desc LIKE' => "%{$tags[$j]}%"],
		    // This shows unrelated listings.
                    //['category_id LIKE' => "%{$tags[$j]}%"],
                    ['title LIKE' => "%{$tags[$j]}%"]]]);
            $j = $j + 1;
            while ($j < $n) {
                $filtered_listings = $filtered_listings
                    ->orWhere(['OR' => [
                        ['item_desc LIKE' => "%{$tags[$j]}%"],
		        // This shows unrelated listings.
                        //['category_id LIKE' => "%{$tags[$j]}%"],
                        ['title LIKE' => "%{$tags[$j]}%"]]]);
                $j = $j + 1;
            }

            // THIS COMMENTED-OUT SECTION CAUSES PROBLEMS!  1) When a search
            // term matches tags for listings across different categories, all
            // the listings are shown, regardless of the category the user
            // selected.  2) Sorting does not work because the pagination code
            // is never executed.  3) Paginating $unioned_query causes adverse
            // effects that I quite frankly have no clue how to address.
            // Currently, $filtered_listings is paginated and doing so works
            // fine.  However, when paging $unioned_query, or even assigning
            // $filtered_listings to $unioned_query makes the page not load
            // and bizarre debug messages to appear.  For example, with every-
            // thing commented-out, the code runs fine, but even with just the
            // follwing block uncommented, the code breaks.  This is important
            // because without pagination, sorting is not easy, and searching
            // is not completely correct in all cases (David, 4/14/17).
            // $other_query = $this
            //     ->Listings
            //     ->find()
            //     ->where(['OR' => [
            //         ['item_desc LIKE' => "%e%"],
            //         ['title LIKE' => "%e%"],
            //         ['category_id LIKE' => "%e%"]]]);
            // $filtered_query->union($other_query);
            //$unioned_query = $filtered_listings;
            //$category_search = $this->request->query['category_filter'];
            // this if-stateument is true if the user has typed something
            // into the search field.
            // this if-block will render the index page containing only
            // items pertaining to the keywords.
            //if(!empty($tags) && strlen($tags[0])>=1){
                //$category_search = $this->request->query['category_filter'];
                //if(strlen($category_search) === 0) {
                    //// $tags has all the keywords entered from the search text
                    //// field.
                   //foreach($tags as &$value) {
                        //// gets rows having the item_desc, title or category_id
                        //// similar to the search key word.
                       //$other_query = $this
                           //->Listings
                           //->find()
                           //->where(['OR' => [
                               //['item_desc LIKE' => "%{$value}%"],
                               //['title LIKE' => "%{$value}%"]]]);
                               ////['category_id LIKE' => "%{$value}%"]]]);
                         //// this unions the new query result with the old ones.
                        //$unioned_query->union($other_query);
                    //}
                        //$filtered_listings = $unioned_query;
                //} else { // User selected a category to search in.
                    ////$tags has all the keywords entered from the search text
                    ////field.
                   //foreach($tags as &$value) {
                        ////gets rows having the item_desc, title or category_id
                        ////similar to the search key word.
                       //$other_query = $this
                           //->Listings
                           //->find()
                           //->where(['category_id' => $category_search,
                                    //'OR' => [
                                        //['item_desc LIKE' => "%{$value}%"],
                                        //['title LIKE' => "%{$value}%"],
                                        //]]);
                         ////this unions the new query result with the old ones.
                        //$unioned_query->union($other_query);
                    //}
                //}
                //$this->set('listings', $unioned_query);
                //$this->set(compact('listings'));
                //$this->set('_serialize', ['listings']);
                 ////the current category selected. used to access on the next
                 ////page so the next page will display that category as default.
                //$this->set('default_category', $category_search);
                //return;
                ////if the search keyword is empty, but the search category
                ////option was not
            //} else if(strlen($category_search) > 0){
                //$category_search = $this->request->query['category_filter'];
                //echo $category_search . " < ---- search";
                //$query = $this->Listings
                              //->find()
                              //->where(['category_id' => $category_search]);
                ////$unioned_query->union($other_query);
                //$this->set('listings', $query);
                //$this->set(compact('listings'));
                //$this->set('_serialize', ['listings']);
                //// the current category selected. used to access on the next
                //// page so the next page will display that category as default.
                //$this->set('default_category', $category_search);
                //return;
            //}

        // added 4/16/17. this will allow clicking categories in browse page to only list items in the same categories.
        // if category ever appears in the query string (not category_filter, which narrows the search for the search bar instead)
        // then we know that only items of that category should appear, since a category link from the browse page has been clicked.
        } else if($this->request->query['category']!== NULL) {
            $filtered_listings = $this->Listings->find('all')->where(['category_id' => $this->request->query['category']]);
            $list_was_filtered = true;
            $this->set('default_category', $this->request->query['category']);
        }

        $contain = ['RegisteredUsers', 'Courses', 'Conditions', 'Categories'];
        $conditions = [];
        $item_conditions = [];
        $condition_filters = []; // Stores the conditions that are checked.
        $get_request = $this->request->query;
        if (!empty($get_request['category_filter'])) {
            $conditions['Categories.category_name'] = $get_request['category_filter'];
            // Set the category the user selected so that it can stay selected
            // when a new page is accessed.
            $this->set('default_category', $get_request['category_filter']);
        }
        if (!empty($get_request['course'])) {
            $conditions['Courses.course_name'] = $get_request['course'];
        }
        if (!empty($get_request['condition_like_new'])) {
            $item_conditions[] = 'like_new';
            $condition_filters['like_new'] = true;
        }
        if (!empty($get_request['condition_new'])) {
            $item_conditions[] = 'new';
            $condition_filters['new'] = true;
        }
        if (!empty($get_request['condition_good'])) {
            $item_conditions[] = 'good';
            $condition_filters['good'] = true;
        }
        if (!empty($get_request['condition_fair'])) {
            $item_conditions[] = 'fair';
            $condition_filters['fair'] = true;
        }
        if (!empty($get_request['condition_poor'])) {
            $item_conditions[] = 'poor';
            $condition_filters['poor'] = true;
        }
        if (!empty($get_request['price']) && $get_request['price']==6) {
            $conditions['Listings.price > ']=0;
        }
        else if (!empty($get_request['price']) && $get_request['price']!==6) {
            // The 'price' element is between 1 and 5.
            $price_max = 25.0 * ((double) $get_request['price']);
            $conditions['Listings.price >= '] = $price_max - 25.0;
            if($price_max === 100.0){
                $price_max = $price_max - 1; 
            }
            if ($price_max < 100.0) {
                $conditions['Listings.price < '] = $price_max;
            }
        }
        if (count($item_conditions) > 0) {
            $conditions['Conditions.condition_name IN'] = $item_conditions;
        }
        $conditions['Listings.is_sold'] = 0; // Only show non-sold listings.
        $this->paginate = ['contain' => $contain,
                           'conditions' => $conditions,
                           'order' => ['Listings.date_created' => 'desc']];
        if ($list_was_filtered!==true && (empty($filtered_listings) || ($filtered_listings->count() == 0))) {
            $listings = $this->paginate($this->Listings);
            $no_results_found = true;
        }
        else {
            $listings = $this->paginate($filtered_listings);
        }
        $this->set('condition_filters', $condition_filters);
        $this->set('no_results_found', $no_results_found);
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
        $this->setDefaultData();

        $images = TableRegistry::get('Images')->find()->where(['listing_id' => $id]);
        $this->set('images', $images);

        $listing = $this->Listings->get($id, [
            'contain' => ['Categories', 'RegisteredUsers', 'Courses', 'Conditions', 'PurchasedLists', 'SellingLists', 'SoldLists', 'Tags', 'WatchingLists', 'WishLists']
        ]);
        $this->set('listing', $listing);
        $this->set('_serialize', ['listing']);

    }

    /**
     * Add a new listing.  If POST data is given, then all fields of the
     * listings database table must be given, except for date_created,
     * registered_user_id, and is_sold.  A tags field should also be given.
     * If there is no POST data, then the site shows a form to add a listing.
     *
     * Only authorized users may access this method.
     *
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->setDefaultData();
        $listing = $this->Listings->newEntity();
        if ($this->request->is('post')) {
            // Save the listing first.
            $listing = $this->Listings->patchEntity($listing, $this->request->data);
            $listing->is_sold = 0;
            $listing->date_created = new \DateTime();
            $listing->registered_user_id = $this->Auth->user()['username'];
            //$thumbnail = fopen($this->request->data['image'], 'rb');
            /*$thumbnail = file_get_contents($this->request->data['image']);
            if(!$thumbnail){
                $listing->image = 'error, thumbnail did not upload';
            } else {
                $listing->image = $thumbnail;
            }
            fclose($thumbnail);*/
            $listing->image = $this->request->data['image'];
            $save_successful = $this->Listings->save($listing);


            // Then save tags.
            //$tags_table = TableRegistry::get('Tags');
            //$tags_table->createTags($listing->listing_num,
                                    //preg_split('/[\s,]+/',
                                               //$this->request->data['tags']));
            // Save the title as a tag to make it searchable.
            //$tags_table->createTags($listing->listing_num,
                                    //preg_split('/[\s,]+/',
                                               //$listing->title));
            // And save to Selling List.
            $selling_list_table = TableRegistry::get('SellingLists');
            $selling_list_table->add($listing->listing_num,
                                     $listing->registered_user_id);

            if ($save_successful) {
                // Load page to save images.
                return $this->redirect(['controller' => 'Images',
                                        'action' => 'add',
                                                    $listing->listing_num]);
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
        $this->setDefaultData();
        $listing = $this->Listings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $listing = $this->Listings->patchEntity($listing, $this->request->data);
            $listing->is_sold = $this->request->data['is_sold'] == true ? 1 : 0;
            if ($this->Listings->save($listing)) {
                $this->Flash->success(__('The listing has been saved.'));

                return $this->redirect(['controller' => 'SellingLists',
                                        'action' => 'index']);
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
        $this->setDefaultData();
        $this->request->allowMethod(['post', 'delete']);
        $listing = $this->Listings->get($id);
        if ($this->Listings->delete($listing)) {
            $this->Flash->success(__('The listing has been deleted.'));
        } else {
            $this->Flash->error(__('The listing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Display all listings or those of a given category.  If listings of a
     * certain category are to be displayed, then the 'cat' parameter must
     * be passed in the query string (see example).  To specify a field and
     * order to sort by, these must also be specified in the query string.
     *
     * Usage example:
     *
     *     This is in a ctp file.  $id is a result set made available by
     *     the associated controller and has the names of all categories.
     *     This will generate links of the form
     *
     *                  listings?cat=<val>&sort=price
     *
     *     where <val> is the value of $row->category_name.  When clicked,
     *     the user will be directed to a page that displays all listings
     *     of the category, sorted by price.
     *
     *     <?php foreach ($id as $row): ?>
     *         <?= $this->Html->link($row->category_name,
     *                               ['controller' => 'Listings',
     *                                'action' => 'display',
     *                                'cat' => $row->category_name,
     *                                'sort' => 'price']);?>
     *     <?php endforeach; ?>
     *
     *
     * @param this method accepts the following paramters given as a
     *        query string  (see example):
     *        'cat': the category of the listings to show.  If all
     *               categories are to be shown, then this should not
     *               be given.
     *        'sort': the field to sort by.  This can be one of 'price'
     *                and 'date_created'
     *        'ascDesc': the order to sort by.  This can be one of 'asc'
     *                   for ascending, and 'desc' for descending.
     */
    public function display() {
        $res = NULL;
        $params = $this->request->query;
        if (empty($params) || empty($params['cat'])) {
            $res = $this->getAllListings();
        }
        else {
            $res = $this->getListingsByCategory($params['cat'],
                                                $params['sort'],
                                                $params['ascDesc']);
        }
        $this->set(['listings' => $res]);
    }

    public function sell() {
        // This is true on form submit.
        if ($this->request->is('post')) {
            //$this->request->data;
            //$this->Listings->create();
        }
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

    public function isAuthorized($user) {
        $action = $this->request->param('action');
        // Allow registered users to sell.
        if (in_array($action, ['add', 'edit'])) {
            if (!empty($this->Auth->user())) {
                return true;
            }
        }
        return false;
    }
}
