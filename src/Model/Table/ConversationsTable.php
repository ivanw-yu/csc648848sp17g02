<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Conversations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RegisteredUsers
 * @property \Cake\ORM\Association\BelongsTo $RegisteredUsers
 *
 * @method \App\Model\Entity\Conversation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Conversation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Conversation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Conversation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Conversation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Conversation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Conversation findOrCreate($search, callable $callback = null, $options = [])
 */
class ConversationsTable extends Table
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

        $this->table('conversations');
        $this->displayField('conversation_num');
        $this->primaryKey(['conversation_num', 'date_created', 'registered_user_id']);

        $this->belongsTo('RegisteredUsers', [
            'foreignKey' => 'registered_user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RegisteredUsers', [
            'foreignKey' => 'recipient_id',
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
            ->integer('conversation_num')
            ->allowEmpty('conversation_num', 'create');

        $validator
            ->dateTime('date_created')
            ->allowEmpty('date_created', 'create');

        $validator
            ->requirePresence('message', 'create')
            ->notEmpty('message');

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

        return $rules;
    }

    /**
     * Create a new conversation.
     *
     * @param $msg the message sent by the sender
     * @param $sender the username of the sender
     * @param $reciever the username of the reciever
     * @return the new entity, or false if the conversation could not be
     *         created.
     */
    public function createNewConvo($msg, $sender, $reciever) {
        $private_messages = TableRegistry::get('PrivateMessages');
        $qry = $private_messages->find();
        // The id of the new conversation is one plus the current maximum
        // conversation id.
        $res = $qry->select(['max_convo' => $qry->func()
                                                ->max('conversation_id')]);
        $entity = $this->newEntity();
        $entity->message = $msg;
        $entity->conversation_num = $res->first()->max_convo + 1;
        $entity->date_created = new \DateTime();
        $entity->registered_user_id = $sender;
        $entity->recipient_id = $reciever;
        return $this->save($entity);
    }
}
