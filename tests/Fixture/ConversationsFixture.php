<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConversationsFixture
 *
 */
class ConversationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'conversation_num' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'date_created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'message' => ['type' => 'string', 'length' => 256, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'registered_user_id' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'recipient_id' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'registered_user_key' => ['type' => 'index', 'columns' => ['registered_user_id'], 'length' => []],
            'recipient_key' => ['type' => 'index', 'columns' => ['recipient_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['conversation_num', 'date_created', 'registered_user_id', 'recipient_id'], 'length' => []],
            'conversations_ibfk_1' => ['type' => 'foreign', 'columns' => ['registered_user_id'], 'references' => ['registered_users', 'username'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'conversations_ibfk_2' => ['type' => 'foreign', 'columns' => ['recipient_id'], 'references' => ['registered_users', 'username'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'conversation_num' => 1,
            'date_created' => '2017-03-23 16:30:58',
            'message' => 'Lorem ipsum dolor sit amet',
            'registered_user_id' => 'c9ae0d4f-21d3-44ab-9746-6eae46c9ccc9',
            'recipient_id' => 'c996f806-47db-4965-b04d-365bf1bf9397'
        ],
    ];
}
