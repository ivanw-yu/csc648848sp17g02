<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConditionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConditionsTable Test Case
 */
class ConditionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConditionsTable
     */
    public $Conditions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.conditions',
        'app.listings',
        'app.categories',
        'app.registered_users',
        'app.conversations',
        'app.senders',
        'app.private_messages',
        'app.purchased_lists',
        'app.selling_lists',
        'app.sold_lists',
        'app.watching_lists',
        'app.wish_lists',
        'app.recievers',
        'app.courses',
        'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Conditions') ? [] : ['className' => 'App\Model\Table\ConditionsTable'];
        $this->Conditions = TableRegistry::get('Conditions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Conditions);

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
}
