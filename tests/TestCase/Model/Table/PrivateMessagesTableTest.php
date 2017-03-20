<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrivateMessagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrivateMessagesTable Test Case
 */
class PrivateMessagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PrivateMessagesTable
     */
    public $PrivateMessages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.private_messages',
        'app.registered_users',
        'app.conversations',
        'app.listings',
        'app.categories',
        'app.courses',
        'app.conditions',
        'app.purchased_lists',
        'app.selling_lists',
        'app.sold_lists',
        'app.tags',
        'app.watching_lists',
        'app.wish_lists'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PrivateMessages') ? [] : ['className' => 'App\Model\Table\PrivateMessagesTable'];
        $this->PrivateMessages = TableRegistry::get('PrivateMessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PrivateMessages);

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
