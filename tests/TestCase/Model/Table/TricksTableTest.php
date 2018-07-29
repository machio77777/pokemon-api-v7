<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TricksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TricksTable Test Case
 */
class TricksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TricksTable
     */
    public $Tricks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tricks',
        'app.skills'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tricks') ? [] : ['className' => TricksTable::class];
        $this->Tricks = TableRegistry::getTableLocator()->get('Tricks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tricks);

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
