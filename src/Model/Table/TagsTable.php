<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * Tags Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Listings
 *
 * @method \App\Model\Entity\Tag get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tag findOrCreate($search, callable $callback = null, $options = [])
 */
class TagsTable extends Table
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

        $this->table('tags');
        $this->displayField('listing_id');
        $this->primaryKey(['listing_id', 'tag_name']);

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
            ->allowEmpty('tag_name', 'create');

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
        $rules->add($rules->existsIn(['listing_id'], 'Listings'));

        return $rules;
    }

    /**
     * Get all the tags of a listing.
     *
     * Example usage:
     *
     *   $tags = TableRegistry::get('Tags');
     *   $res = $tags->find('tags', ['listing_id' => 155]);
     *   foreach($res as $row) {
     *       echo $row->tag_name;
     *   }
     *
     * @param $query a Query object.  This is not needed if the method is
     *        called according to the example.
     * @param $options an array of options.  Valid options are:
     *        'listing_id': the integer id of the listing to get tags for
     * @return the Query object that contains all matching rows.  If
     *         'listing_id' is not given, then NULL is returned.
     */
    public function findTags($query, $options) {
        if (!isset($options['listing_id'])) {
            return NULL;
        }
        return $this->find('all')
                    ->where(['listing_id' => $options['listing_id']])
                    ->order(['listing_id' => 'ASC']);
    }

    /**
     * Get all listings that match a list of tags.  The 'tags' option must
     * be given.  This method will not search for empty tags and will not
     * do anything if no tags are given.  When tags are given but a field
     * to sort by is not, then no sorting is performed.
     *
     * Example usage:
     *
     *   $tags = TableRegistry::get('Tags');
     *   $res = $tags->find('listings',
     *                      ['tags' => ['math', 'book'],
     *                       'sort_by' => 'price',
     *                       'asc_desc' => 'desc']);
     *   foreach($res as $row) {
     *       echo $row->title;
     *   }
     *
     * @param $query a Query object.  This is not needed if the method is
     *        called according to the example.
     * @param $options an array of options.  Valid options are:
     *        'tags': an array of strings that denote the tags to search for.
     *                Empty tags ('') will be ignored.
     *        'sort_by': one of 'price' and 'date_created'
     *        'asc_desc': one of 'asc' and 'desc'
     * @return the Query object that contains all matching rows.  The
     *         attributes are all of those in the 'listings' database table.
     *         If there is no 'tags' option in $options, or if the array
     *         associated with 'tags' is empty, or if all tags in the array
     *         are empty, then NULL is returned.
     */
    public function findListings($query, $options) {
        if (!isset($options['tags'])) {
            return NULL;
        }
        $tags = $options['tags'];
        $j = 0;
        $n = count($tags);
        // Skip empty tags at the beginning of the array.
        while (($j < $n) && empty($tags[$j])) {
            $j = $j + 1;
        }
        if ($j == $n) {
            return NULL;
        }
        $listings = TableRegistry::get('Listings');
        // Get listing id's of listings that contain at least one tag.
        $res_ids = $this->find()
                    ->select(['listing_id'])
                    ->distinct(['listing_id'])
                    ->where(['tag_name LIKE' => '%' . $tags[$j] . '%']);
        // While loop instead of foreach because the array needs to start
        // at index 1, not zero, due to already using index 0 above.
        $j = $j + 1;
        while ($j < $n) {
            if (!empty($tags[$j])) {
                $res_ids = $res_ids->orWhere(['tag_name LIKE'
                                              => '%' . $tags[$j] . '%']);
            }
            $j = $j + 1;
        }
        // Get the entire listing data for all listings in the above query.
        if (empty($options['sort_by'])) {
            return $listings->find('all')
                            ->where(['listing_num IN' => $res_ids]);
        }
        return $listings->find('all')
                        ->where(['listing_num IN' => $res_ids])
                        ->order([$options['sort_by'] => $options['asc_desc']]);
    }

    /**
     * Add tags for a listing.  This method can be used to create tags for
     * a new or existing listing.  Empty tags are not allowed.  These are
     * tags that are deemed empty by PHP's built-in empty() function.
     *
     * Example usage:
     *
     *   $tags = TableRegistry::get('Tags');
     *   $tags->createTags(30, ['olympic', 'weight lift', 'gym']);
     *
     * @param $listing_id the integer id of the listing to add tags to
     * @param $tags an array of strings that stores the tags to add
     */
    public function createTags($listing_id, $tags) {
        $this->connection()->transactional(
            function() use ($listing_id, $tags) {
                foreach($tags as $tag) {
                    if (empty($tag)) {
                        continue;
                    }
                    $entity = $this->newEntity();
                    $entity->tag_name = $tag;
                    $entity->listing_id = $listing_id;
                    $this->save($entity, ['atomic' => false]);
                }
            }
        );
    }

    /**
     * Remove tags of a listing.
     *
     * Example usage:
     *
     *   $tags = TableRegistry::get('Tags');
     *   $tags->removTags(30, ['olympic', 'weight lift', 'gym']);
     *
     * @param $listing_id the integer id of the listing to remove tags from
     * @param $tags an array of strings that stores the tags to remove
     */
    public function removeTags($listing_id, $tags) {
        try {
            $this->connection()->transactional(
                function() use ($listing_id, $tags) {
                    foreach($tags as $tag) {
                        $entity = $this->get([$listing_id, $tag]);
                        $entity->tag_name = $tag;
                        $entity->listing_id = $listing_id;
                        $this->delete($entity, ['atomic' => false]);
                    }
                }
            );
        }
        catch (RecordNotFoundException $err) {
        }
    }
}
