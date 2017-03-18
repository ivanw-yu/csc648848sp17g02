<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PrivateMessagesFixture
 *
 */
class PrivateMessagesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'subject' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'registered_user_id' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'recipient_id' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'conversation_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'is_read' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'registered_user_key' => ['type' => 'index', 'columns' => ['registered_user_id'], 'length' => []],
            'recipient_key' => ['type' => 'index', 'columns' => ['recipient_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['conversation_id'], 'length' => []],
            'private_messages_ibfk_1' => ['type' => 'foreign', 'columns' => ['conversation_id'], 'references' => ['conversations', 'conversation_num'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'private_messages_ibfk_2' => ['type' => 'foreign', 'columns' => ['registered_user_id'], 'references' => ['registered_users', 'username'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'private_messages_ibfk_3' => ['type' => 'foreign', 'columns' => ['recipient_id'], 'references' => ['registered_users', 'username'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'subject' => 'Lorem ipsum dolor sit amet',
            'registered_user_id' => 'Lorem ipsum dolor sit amet',
            'recipient_id' => 'Lorem ipsum dolor sit amet',
            'conversation_id' => 1,
            'is_read' => 1
        ],
    ];
}
