<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WatchingListsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WatchingListsTable Test Case
 */
class WatchingListsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WatchingListsTable
     */
    public $WatchingLists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.watching_lists',
        'app.registered_users',
        'app.conversations',
        'app.listings',
        'app.categories',
        'app.courses',
        'app.purchased_lists',
        'app.selling_lists',
        'app.sold_lists',
        'app.tags',
        'app.wish_lists',
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
        $config = TableRegistry::exists('WatchingLists') ? [] : ['className' => 'App\Model\Table\WatchingListsTable'];
        $this->WatchingLists = TableRegistry::get('WatchingLists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WatchingLists);

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
