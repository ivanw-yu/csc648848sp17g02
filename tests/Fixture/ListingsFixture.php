<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ListingsFixture
 *
 */
class ListingsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'listing_num' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'date_created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'is_sold' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'price' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'location' => ['type' => 'string', 'length' => 128, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'item_desc' => ['type' => 'string', 'length' => 256, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'title' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'category_id' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'registered_user_id' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'course_id' => ['type' => 'string', 'fixed' => true, 'length' => 6, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'image' => ['type' => 'binary', 'length' => 4294967295, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'condition_id' => ['type' => 'string', 'length' => 16, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'category_key' => ['type' => 'index', 'columns' => ['category_id'], 'length' => []],
            'course_key' => ['type' => 'index', 'columns' => ['course_id'], 'length' => []],
            'registered_user_key' => ['type' => 'index', 'columns' => ['registered_user_id'], 'length' => []],
            'condition_id_fk' => ['type' => 'index', 'columns' => ['condition_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['listing_num'], 'length' => []],
            'condition_id_fk' => ['type' => 'foreign', 'columns' => ['condition_id'], 'references' => ['conditions', 'condition_name'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'listings_ibfk_1' => ['type' => 'foreign', 'columns' => ['category_id'], 'references' => ['categories', 'category_name'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'listings_ibfk_2' => ['type' => 'foreign', 'columns' => ['course_id'], 'references' => ['courses', 'course_name'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'listings_ibfk_3' => ['type' => 'foreign', 'columns' => ['registered_user_id'], 'references' => ['registered_users', 'username'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'listing_num' => 1,
            'date_created' => '2017-03-18 18:43:36',
            'is_sold' => 1,
            'price' => 'Lorem ipsum dolor sit amet',
            'location' => 'Lorem ipsum dolor sit amet',
            'item_desc' => 'Lorem ipsum dolor sit amet',
            'title' => 'Lorem ipsum dolor sit amet',
            'category_id' => 'Lorem ipsum dolor sit amet',
            'registered_user_id' => 'Lorem ipsum dolor sit amet',
            'course_id' => 'Lore',
            'image' => 'Lorem ipsum dolor sit amet',
            'condition_id' => 'Lorem ipsum do'
        ],
    ];
}
