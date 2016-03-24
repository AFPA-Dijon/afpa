<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountParametersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountParametersTable Test Case
 */
class AccountParametersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountParametersTable
     */
    public $AccountParameters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.account_parameters',
        'app.users',
        'app.tweets',
        'app.hashtags',
        'app.hashtags_tweets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AccountParameters') ? [] : ['className' => 'App\Model\Table\AccountParametersTable'];
        $this->AccountParameters = TableRegistry::get('AccountParameters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AccountParameters);

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
