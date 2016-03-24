<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HashtagsTweetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HashtagsTweetsTable Test Case
 */
class HashtagsTweetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HashtagsTweetsTable
     */
    public $HashtagsTweets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hashtags_tweets',
        'app.tweets',
        'app.users',
        'app.account_parameters',
        'app.hashtags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('HashtagsTweets') ? [] : ['className' => 'App\Model\Table\HashtagsTweetsTable'];
        $this->HashtagsTweets = TableRegistry::get('HashtagsTweets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HashtagsTweets);

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
