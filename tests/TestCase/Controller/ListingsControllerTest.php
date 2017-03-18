<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ListingsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ListingsController Test Case
 */
class ListingsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.conditions',
        'app.tags'
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
