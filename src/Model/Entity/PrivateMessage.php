<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PrivateMessage Entity
 *
 * @property string $subject
 * @property string $registered_user_id
 * @property string $recipient_id
 * @property int $conversation_id
 * @property bool $is_read
 *
 * @property \App\Model\Entity\RegisteredUser $registered_user
 * @property \App\Model\Entity\Conversation $conversation
 */
class PrivateMessage extends Entity
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
        'conversation_id' => false
    ];
}
