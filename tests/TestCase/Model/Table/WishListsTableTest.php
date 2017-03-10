<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WishListsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WishListsTable Test Case
 */
class WishListsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WishListsTable
     */
    public $WishLists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wish_lists',
        'app.registered_users',
        'app.conversations',
        'app.listings',
        'app.categories',
        'app.courses',
        'app.purchased_lists',
        'app.selling_lists',
        'app.sold_lists',
        'app.tags',
        'app.watching_lists',
        'app.private_messages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WishLists') ? [] : ['className' => 'App\Model\Table\WishListsTable'];
        $this->WishLists = TableRegistry::get('WishLists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WishLists);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
