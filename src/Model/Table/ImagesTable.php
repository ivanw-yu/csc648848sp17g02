<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Images Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Listings
 *
 * @method \App\Model\Entity\Image get($primaryKey, $options = [])
 * @method \App\Model\Entity\Image newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Image[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Image|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Image patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Image[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Image findOrCreate($search, callable $callback = null, $options = [])
 */
class ImagesTable extends Table
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

        $this->table('images');
        $this->displayField('image_num');
        $this->primaryKey('image_num');

        $this->belongsTo('Listings', [
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
            ->integer('image_num')
            ->allowEmpty('image_num', 'create');

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
        $rules->add($rules->existsIn(['listing_id'], 'Listings'));

        return $rules;
    }

    /**
     * Get the images of a listing.
     *
     * Example usage:
     *
     *   // In the ImagesController class.
     *   $images = $this->Images->getImages(341)
     *   foreach($images as $row) {
     *       $img = base64_encode(stream_get_contents($row->image));
     *       $row->image = $img;
     *   }
     *   $this->set(['images' => $images]);
     *
     * @param $listing_num the integer identifier of the listing
     * @return a Query object that contains all entities ofthe given listing.
     *         Each entity has the properties image_num, image, and listing_num.
     */
    public function getImages($listing_num) {
        return $this->find()->where(['listing_id' => $listing_num]);
    }

    /**
     * Add a new image for a listing.
     *
     * @param $file the path and name of the file, including extension.
     * @param $listing_num the integer identifier of the listing
     */
    public function addImage($file, $listing_num) {
        $entity = $this->newEntity();
        $img = fopen($file, 'rb');
        $entity->image = $img;
        $entity->listing_id = $listing_num;
        $save_successful = $this->save($entity);
        fclose($img);
        return $save_successful;
    }

    /**
     * Remove an image of a listing.
     *
     * Example usage:
     *
     *   // In the ImagesController class.
     *   $images = $this->Images->getImages(341)
     *   $this->Images->removeImage($images->first()->image_num);
     *
     * @param $image_num the integer identifier of the image to remove.  This
     *        corresponds to the image_num field of a row.
     */
    public function removeImage($image_num) {
        $entity = $this->get($image_num);
        $this->delete($entity);
    }
}
