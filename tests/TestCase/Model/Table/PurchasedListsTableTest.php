<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchasedListsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchasedListsTable Test Case
 */
class PurchasedListsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchasedListsTable
     */
    public $PurchasedLists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.purchased_lists',
        'app.registered_users',
        'app.conversations',
        'app.listings',
        'app.categories',
        'app.courses',
        'app.selling_lists',
        'app.sold_lists',
        'app.tags',
        'app.watching_lists',
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
        $config = TableRegistry::exists('PurchasedLists') ? [] : ['className' => 'App\Model\Table\PurchasedListsTable'];
        $this->PurchasedLists = TableRegistry::get('PurchasedLists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PurchasedLists);

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
