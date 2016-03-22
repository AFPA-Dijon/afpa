<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OeuvresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OeuvresTable Test Case
 */
class OeuvresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OeuvresTable
     */
    public $Oeuvres;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.oeuvres',
        'app.editeurs',
        'app.emprunts',
        'app.auteurs',
        'app.auteurs_oeuvres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Oeuvres') ? [] : ['className' => 'App\Model\Table\OeuvresTable'];
        $this->Oeuvres = TableRegistry::get('Oeuvres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Oeuvres);

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
