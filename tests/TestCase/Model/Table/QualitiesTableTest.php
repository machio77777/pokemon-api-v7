<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QualitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QualitiesTable Test Case
 */
class QualitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QualitiesTable
     */
    public $Qualities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.qualities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Qualities') ? [] : ['className' => QualitiesTable::class];
        $this->Qualities = TableRegistry::getTableLocator()->get('Qualities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Qualities);

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
