<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SellingLists Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RegisteredUsers
 * @property \Cake\ORM\Association\BelongsTo $Listings
 *
 * @method \App\Model\Entity\SellingList get($primaryKey, $options = [])
 * @method \App\Model\Entity\SellingList newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SellingList[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SellingList|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SellingList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SellingList[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SellingList findOrCreate($search, callable $callback = null, $options = [])
 */
class SellingListsTable extends Table
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

        $this->table('selling_lists');
        $this->displayField('registered_user_id');
        $this->primaryKey(['registered_user_id', 'listing_id']);

        $this->belongsTo('RegisteredUsers', [
            'foreignKey' => 'registered_user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Listings', [
            'foreignKey' => 'listing_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['registered_user_id'], 'RegisteredUsers'));
        $rules->add($rules->existsIn(['listing_id'], 'Listings'));

    //     $rules->addDelete(function ($entity, $options) {
    //      return true;
    // }, 'ruleName');

        return $rules;
    }

    /**
     * Add a listing to a user's selling list.
     *
     * @param $listing_id the id of the listing sold by the user
     * @param $username the username of the user associated with the listing
     * @return \Cake\ORM\RulesChecker
     */
    public function add($listing_id, $username) {
        $entity = $this->newEntity();
        $entity->listing_id = $listing_id;
        $entity->registered_user_id = $username;
        return $this->save($entity);
    }

}
