<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SellingList Entity
 *
 * @property string $registered_user_id
 * @property int $listing_id
 *
 * @property \App\Model\Entity\RegisteredUser $registered_user
 * @property \App\Model\Entity\Listing $listing
 */
class SellingList extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'registered_user_id' => false,
        'listing_id' => false
    ];
}
