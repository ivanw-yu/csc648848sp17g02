<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ConversationsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ConversationsController Test Case
 */
class ConversationsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
