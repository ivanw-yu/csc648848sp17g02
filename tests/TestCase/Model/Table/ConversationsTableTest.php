<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConversationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConversationsTable Test Case
 */
class ConversationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConversationsTable
     */
    public $Conversations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.conversations',
        'app.registered_users',
        'app.listings',
        'app.categories',
        'app.courses',
        'app.conditions',
        'app.purchased_lists',
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
        $config = TableRegistry::exists('Conversations') ? [] : ['className' => 'App\Model\Table\ConversationsTable'];
        $this->Conversations = TableRegistry::get('Conversations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Conversations);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
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
