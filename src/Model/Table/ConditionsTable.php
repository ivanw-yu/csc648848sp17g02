<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Conditions Model
 *
 * @property \Cake\ORM\Association\HasMany $Listings
 *
 * @method \App\Model\Entity\Condition get($primaryKey, $options = [])
 * @method \App\Model\Entity\Condition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Condition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Condition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Condition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Condition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Condition findOrCreate($search, callable $callback = null, $options = [])
 */
class ConditionsTable extends Table
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

        $this->table('conditions');
        $this->displayField('condition_name');
        $this->primaryKey('condition_name');

        $this->hasMany('Listings', [
            'foreignKey' => 'condition_id'
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
            ->allowEmpty('condition_name', 'create');

        return $validator;
    }

    /**
     * Add a condition to the database.  A new listing can then choose the
     * condition of the item.  If an empty condition is given
     * (empty($condition_name) == true), then nothing is done.
     *
     * Usage example:
     *
     *   // In the ConditionsController class.
     *   $this->Conditions->setCondition('New');
     *   $this->Conditions->setCondition('Used');
     *   $results = $this->Conditions->find('all');
     *   foreach($results as $row) {
     *       echo $row->condition_name;
     *   }
     *
     * @param $condition_name the name of the condition to add
     */
    public function setCondition($condition_name) {
        if (empty($condition_name)) {
            return;
        }
        $entity = $this->newEntity();
        $entity->condition_name = $condition_name;
        $this->save($entity);
    }
}
