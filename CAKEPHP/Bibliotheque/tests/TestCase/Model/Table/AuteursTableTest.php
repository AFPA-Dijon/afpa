<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuteursTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuteursTable Test Case
 */
class AuteursTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AuteursTable
     */
    public $Auteurs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.auteurs',
        'app.oeuvres',
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
        $config = TableRegistry::exists('Auteurs') ? [] : ['className' => 'App\Model\Table\AuteursTable'];
        $this->Auteurs = TableRegistry::get('Auteurs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Auteurs);

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
