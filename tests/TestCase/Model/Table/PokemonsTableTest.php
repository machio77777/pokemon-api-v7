<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PokemonsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PokemonsTable Test Case
 */
class PokemonsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PokemonsTable
     */
    public $Pokemons;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pokemons'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pokemons') ? [] : ['className' => PokemonsTable::class];
        $this->Pokemons = TableRegistry::getTableLocator()->get('Pokemons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pokemons);

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
