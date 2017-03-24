<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Conversation Entity
 *
 * @property int $conversation_num
 * @property \Cake\I18n\Time $date_created
 * @property string $message
 * @property string $registered_user_id
 * @property string $recipient_id
 *
 * @property \App\Model\Entity\RegisteredUser $registered_user
 */
class Conversation extends Entity
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
        'conversation_num' => false,
        'date_created' => false,
        'registered_user_id' => false
    ];
}
