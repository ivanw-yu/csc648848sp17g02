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
        'conversation_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'conversation_key' => ['type' => 'index', 'columns' => ['conversation_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['registered_user_id', 'conversation_id'], 'length' => []],
            'private_messages_ibfk_1' => ['type' => 'foreign', 'columns' => ['conversation_id'], 'references' => ['conversations', 'conversation_num'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'private_messages_ibfk_2' => ['type' => 'foreign', 'columns' => ['registered_user_id'], 'references' => ['registered_users', 'username'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'registered_user_id' => '25714d06-c3b5-4b2a-9132-8c043ca8792c',
            'conversation_id' => 1
        ],
    ];
}
