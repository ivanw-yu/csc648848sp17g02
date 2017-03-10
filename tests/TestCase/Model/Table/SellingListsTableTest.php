<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SellingListsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SellingListsTable Test Case
 */
class SellingListsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SellingListsTable
     */
    public $SellingLists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.selling_lists',
        'app.registered_users',
        'app.conversations',
        'app.listings',
        'app.categories',
        'app.courses',
        'app.purchased_lists',
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
        $config = TableRegistry::exists('SellingLists') ? [] : ['className' => 'App\Model\Table\SellingListsTable'];
        $this->SellingLists = TableRegistry::get('SellingLists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SellingLists);

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
