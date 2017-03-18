<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Listing Entity
 *
 * @property int $listing_num
 * @property \Cake\I18n\Time $date_created
 * @property bool $is_sold
 * @property string $price
 * @property string $location
 * @property string $item_desc
 * @property string $title
 * @property string $category_id
 * @property string $registered_user_id
 * @property string $course_id
 * @property string|resource $image
 * @property string $condition_id
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\RegisteredUser $registered_user
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\PurchasedList[] $purchased_lists
 * @property \App\Model\Entity\SellingList[] $selling_lists
 * @property \App\Model\Entity\SoldList[] $sold_lists
 * @property \App\Model\Entity\Tag[] $tags
 * @property \App\Model\Entity\WatchingList[] $watching_lists
 * @property \App\Model\Entity\WishList[] $wish_lists
 */
class Listing extends Entity
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
        'listing_num' => false
    ];
}
