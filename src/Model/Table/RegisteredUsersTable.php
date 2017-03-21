<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RegisteredUsers Model
 *
 * @property \Cake\ORM\Association\HasMany $Conversations
 * @property \Cake\ORM\Association\HasMany $Listings
 * @property \Cake\ORM\Association\HasMany $PrivateMessages
 * @property \Cake\ORM\Association\HasMany $PurchasedLists
 * @property \Cake\ORM\Association\HasMany $SellingLists
 * @property \Cake\ORM\Association\HasMany $SoldLists
 * @property \Cake\ORM\Association\HasMany $WatchingLists
 * @property \Cake\ORM\Association\HasMany $WishLists
 *
 * @method \App\Model\Entity\RegisteredUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\RegisteredUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RegisteredUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RegisteredUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RegisteredUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RegisteredUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RegisteredUser findOrCreate($search, callable $callback = null, $options = [])
 */
class RegisteredUsersTable extends Table
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

        $this->table('registered_users');
        $this->displayField('username');
        $this->primaryKey('username');

        $this->hasMany('Conversations', [
            'foreignKey' => 'registered_user_id'
        ]);
        $this->hasMany('Listings', [
            'foreignKey' => 'registered_user_id'
        ]);
        $this->hasMany('PrivateMessages', [
            'foreignKey' => 'registered_user_id'
        ]);
        $this->hasMany('PurchasedLists', [
            'foreignKey' => 'registered_user_id'
        ]);
        $this->hasMany('SellingLists', [
            'foreignKey' => 'registered_user_id'
        ]);
        $this->hasMany('SoldLists', [
            'foreignKey' => 'registered_user_id'
        ]);
        $this->hasMany('WatchingLists', [
            'foreignKey' => 'registered_user_id'
        ]);
        $this->hasMany('WishLists', [
            'foreignKey' => 'registered_user_id'
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
            ->allowEmpty('username', 'create');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->boolean('is_admin')
            ->allowEmpty('is_admin');

        $validator
            ->boolean('is_active')
            ->allowEmpty('is_active');

        $validator
            ->email('email')
            ->allowEmpty('email');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
