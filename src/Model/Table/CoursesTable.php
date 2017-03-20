<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Courses Model
 *
 * @property \Cake\ORM\Association\HasMany $Listings
 *
 * @method \App\Model\Entity\Course get($primaryKey, $options = [])
 * @method \App\Model\Entity\Course newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Course[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Course|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Course patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Course[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Course findOrCreate($search, callable $callback = null, $options = [])
 */
class CoursesTable extends Table
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

        $this->table('courses');
        $this->displayField('course_name');
        $this->primaryKey('course_name');

        $this->hasMany('Listings', [
            'foreignKey' => 'course_id'
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
            ->allowEmpty('course_name', 'create');

        return $validator;
    }

    /**
     * Add a course to the database.  A new listing can then choose the course
     * that the item is associated with.  If an empty course is given
     * (empty($course_name) == true), then nothing is done.
     *
     * Usage example:
     *
     *   // In the CoursesController class.
     *   $this->Courses->setCourse('CSC648');
     *   $this->Courses->setCourse('CSC600');
     *   $results = $this->Courses->find('all');
     *   foreach($results as $row) {
     *       echo $row->course_name;
     *   }
     *
     * @param $course_name the name of the course to add
     */
    public function setCourse($course_name) {
        if (empty($course_name)) {
            return;
        }
        $entity = $this->newEntity();
        $entity->course_name = $course_name;
        $this->save($entity);
    }
}
