<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PurchasedLists Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RegisteredUsers
 * @property \Cake\ORM\Association\BelongsTo $Listings
 *
 * @method \App\Model\Entity\PurchasedList get($primaryKey, $options = [])
 * @method \App\Model\Entity\PurchasedList newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PurchasedList[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PurchasedList|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PurchasedList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PurchasedList[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PurchasedList findOrCreate($search, callable $callback = null, $options = [])
 */
class PurchasedListsTable extends Table
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

        $this->table('purchased_lists');
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

        return $rules;
    }
}
