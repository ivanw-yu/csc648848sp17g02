<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Listings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\BelongsTo $RegisteredUsers
 * @property \Cake\ORM\Association\BelongsTo $Courses
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
            ->allowEmpty('image');

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

        return $rules;
    }

    /**
     * Update the image of a listing.
     *
     * Here is an example of using this method in the ListingControllers class.
     *   $this->Listings->setImage('cake.icon.png', 1);
     *
     * @param $file the name of the file, including extension.  The file
     *        relative to the tmp/ directory.
     * @param $listing_num the integer identifier of the listing
     */
    public function setImage($file, $listing_num) {
        // TODO: this needs to be changed.
        $file = '/home/sp17g02/public_html/webroot/img/'.$file;
        $img = fopen($file, 'rb');
        $listing = $this->get($listing_num);
        $listing->image = $img;
        $this->save($listing);
    }
}
