<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * RegisteredUser Entity
 *
 * @property string $username
 * @property string $password
 * @property bool $is_admin
 * @property bool $is_active
 * @property string $email
 *
 * @property \App\Model\Entity\Conversation[] $conversations
 * @property \App\Model\Entity\Listing[] $listings
 * @property \App\Model\Entity\PrivateMessage[] $private_messages
 * @property \App\Model\Entity\PurchasedList[] $purchased_lists
 * @property \App\Model\Entity\SellingList[] $selling_lists
 * @property \App\Model\Entity\SoldList[] $sold_lists
 * @property \App\Model\Entity\WatchingList[] $watching_lists
 * @property \App\Model\Entity\WishList[] $wish_lists
 */
class RegisteredUser extends Entity
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
        'username' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    public function _setPassword($password) {
       $hasher = new DefaultPasswordHasher();
       return $hasher->hash($password);
    }
}
