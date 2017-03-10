<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WishListsFixture
 *
 */
class WishListsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'registered_user_id' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'listing_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'listing_key' => ['type' => 'index', 'columns' => ['listing_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['registered_user_id', 'listing_id'], 'length' => []],
            'wish_lists_ibfk_1' => ['type' => 'foreign', 'columns' => ['listing_id'], 'references' => ['listings', 'listing_num'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'wish_lists_ibfk_2' => ['type' => 'foreign', 'columns' => ['registered_user_id'], 'references' => ['registered_users', 'username'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'registered_user_id' => 'c9ab2c2f-c01e-4671-8caa-71d6f54efbe1',
            'listing_id' => 1
        ],
    ];
}
