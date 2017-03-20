<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 * @property \Cake\ORM\Association\HasMany $Listings
 *
 * @method \App\Model\Entity\Category get($primaryKey, $options = [])
 * @method \App\Model\Entity\Category newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Category[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Category|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Category[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Category findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoriesTable extends Table
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

        $this->table('categories');
        $this->displayField('category_name');
        $this->primaryKey('category_name');

        $this->hasMany('Listings', [
            'foreignKey' => 'category_id'
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
            ->allowEmpty('category_name', 'create');

        return $validator;
    }

    /**
     * Add a category to the database.  A new listings can then choose the
     * new category its category.  If an empty category is given
     * (empty($category_name) == true), then nothing is done.
     *
     * Usage example:
     *
     *   // In the CategoriesController class.
     *   $this->Categories->setCategory('Books');
     *   $this->Categories->setCategory('Cars');
     *   $results = $this->Categories->find('all');
     *   foreach($results as $row) {
     *       echo $row->category_name;
     *   }
     *
     * @param $category_name the name of the category to add
     */
    public function setCategory($category_name) {
        if (empty($category_name)) {
            return;
        }
        $category = $this->newEntity();
        $category->category_name = $category_name;
        $this->save($category);
    }
}
