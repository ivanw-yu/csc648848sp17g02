<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrivateMessages Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RegisteredUsers
 * @property \Cake\ORM\Association\BelongsTo $RegisteredUsers
 * @property \Cake\ORM\Association\BelongsTo $Conversations
 *
 * @method \App\Model\Entity\PrivateMessage get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrivateMessage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PrivateMessage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrivateMessage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrivateMessage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrivateMessage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrivateMessage findOrCreate($search, callable $callback = null, $options = [])
 */
class PrivateMessagesTable extends Table
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

        $this->table('private_messages');
        $this->displayField('registered_user_id');
        $this->primaryKey(['registered_user_id', 'conversation_id']);

        $this->belongsTo('RegisteredUsers', [
            'foreignKey' => 'registered_user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RegisteredUsers', [
            'foreignKey' => 'recipient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Conversations', [
            'foreignKey' => 'conversation_id',
            'joinType' => 'INNER'
        ]);

        // added 4/26/17 to account for new foreign key referencing listings id
        $this->belongsTo('Listings', [
            'foreignKey' => 'listing_id',
            'joinType' => 'INNER'
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
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->boolean('is_read')
            ->requirePresence('is_read', 'create')
            ->notEmpty('is_read');

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
        $rules->add($rules->existsIn(['registered_user_id'], 'RegisteredUsers'));
        $rules->add($rules->existsIn(['recipient_id'], 'RegisteredUsers'));
        $rules->add($rules->existsIn(['conversation_id'], 'Conversations'));
        // added 5/1/17 to fix ViewMessages link in SellingList page
        //$rules->add($rules->existsIn(['listing_id'], 'Listings'));
        return $rules;
    }
}
