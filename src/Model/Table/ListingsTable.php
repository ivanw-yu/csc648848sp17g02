<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Listings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\BelongsTo $RegisteredUsers
 * @property \Cake\ORM\Association\BelongsTo $Courses
 * @property \Cake\ORM\Association\BelongsTo $Conditions
 * @property \Cake\ORM\Association\HasMany $PurchasedLists
 * @property \Cake\ORM\Association\HasMany $SellingLists
 * @property \Cake\ORM\Association\HasMany $SoldLists
 * @property \Cake\ORM\Association\HasMany $Tags
 * @property \Cake\ORM\Association\HasMany $WatchingLists
 * @property \Cake\ORM\Association\HasMany $WishLists
 *
 * @method \App\Model\Entity\Listing get($primaryKey, $options = [])
 * @method \App\Model\Entity\Listing newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Listing[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Listing|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Listing patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Listing[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Listing findOrCreate($search, callable $callback = null, $options = [])
 */
class ListingsTable extends Table
{
    // TODO: change file path.
    private $img_path = '/home/drodri11/public_html/tmp/';

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('listings');
        $this->displayField('title');
        $this->primaryKey('listing_num');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RegisteredUsers', [
            'foreignKey' => 'registered_user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id'
        ]);
        $this->belongsTo('Conditions', [
            'foreignKey' => 'condition_id'
        ]);
        $this->hasMany('PurchasedLists', [
            'foreignKey' => 'listing_id'
        ]);
        $this->hasMany('SellingLists', [
            'foreignKey' => 'listing_id'
        ]);
        $this->hasMany('SoldLists', [
            'foreignKey' => 'listing_id'
        ]);
        $this->hasMany('Tags', [
            'foreignKey' => 'listing_id'
        ]);
        $this->hasMany('WatchingLists', [
            'foreignKey' => 'listing_id'
        ]);
        $this->hasMany('WishLists', [
            'foreignKey' => 'listing_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('listing_num')
            ->allowEmpty('listing_num', 'create');

        $validator
            ->dateTime('date_created')
            ->requirePresence('date_created', 'create')
            ->notEmpty('date_created');

        $validator
            ->boolean('is_sold')
            ->requirePresence('is_sold', 'create')
            ->notEmpty('is_sold');

        $validator
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->requirePresence('location', 'create')
            ->notEmpty('location');

        $validator
            ->requirePresence('item_desc', 'create')
            ->notEmpty('item_desc');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->allowEmpty('thumbnail');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['registered_user_id'], 'RegisteredUsers'));
        $rules->add($rules->existsIn(['course_id'], 'Courses'));
        $rules->add($rules->existsIn(['condition_id'], 'Conditions'));

        return $rules;
    }

    /**
     * Create a new listing.
     *
     * Example usage:
     *   // In the ListingsController class.
     *   $this->Listings->create('1.00',
     *                           'candy',
     *                           'Calc Book',
     *                           'books',
     *                           ['cake.icon.png'],
     *                           'cake.icon.png',
     *                           'user_1');
     *
     * @param $price (str) the listing's price
     * @param $desc (str) a description of the listing
     * @param $title (str) the title of the listing
     * @param $category (str) the category of the listing.  This should be a
     *        category listed in the 'categories' database table.
     * @param $img_files (str array) the names of the images to use, including
     *        extension.  The files are relative to the tmp/ directory.
     * @param $thumbnail_file (str) the name of the image to use as a thumbnail,
     *        including extension.  The files are relative to the tmp/
     *        directory.
     * @param $username (str) the username of the user who created the listing
     * @param $location (str, default 'SFSU') the location of where to pick up
     *        the listed item
     * @param $course (str, default NULL) the course for which the item is
     *        associated with.  This should be a course in the 'courses'
     *        database table.
     * @param $condition (str, default 'Used') the condition of the listed
     *        item.  This shdoul be a condition in the 'conditions' database
     *        table.
     * @return true if the listing was created successfuly.  false if the
     *         listing could not be created.  This could be due to an invalid
     *         column value.
     */
    public function create($price, $desc, $title, $category, $img_files,
                           $thumbnail_file, $username, $location='SFSU',
                           $course=NULL, $condition='Used') {
        $file = $this->img_path . $thumbnail_file;
        $thumbnail = fopen($file, 'rb');
        $entity = $this->newEntity();
        $entity->thumbnail = $thumbnail;
        $entity->date_created = new \DateTime();
        $entity->price = $price;
        $entity->title = $title;
        $entity->item_desc = $desc;
        $entity->location = $location;
        $entity->is_sold = 0;
        $entity->category_id = $category;
        $entity->registered_user_id = $username;
        $entity->course_id = $course;
        $entity->condition_id = $condition;
        if ($this->save($entity) == false) {
            return false;
        }
        fclose($thumbnail);
        $images = TableRegistry::get('Images');
        foreach($img_files as $file) {
            $images->addImage($file, $entity->listing_num);
        }
        return true;
    }

}
