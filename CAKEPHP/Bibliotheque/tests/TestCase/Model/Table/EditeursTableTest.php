<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EditeursTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EditeursTable Test Case
 */
class EditeursTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EditeursTable
     */
    public $Editeurs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.editeurs',
        'app.oeuvres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Editeurs') ? [] : ['className' => 'App\Model\Table\EditeursTable'];
        $this->Editeurs = TableRegistry::get('Editeurs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Editeurs);

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
