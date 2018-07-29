<?php
namespace App\Test\TestCase\Command;

use App\Command\PokemonsUpdateCommand;
use Cake\TestSuite\ConsoleIntegrationTestCase;

/**
 * App\Command\PokemonsUpdateCommand Test Case
 */
class PokemonsUpdateCommandTest extends ConsoleIntegrationTestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->useCommandRunner();
    }

    /**
     * Test buildOptionParser method
     *
     * @return void
     */
    public function testBuildOptionParser()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test execute method
     *
     * @return void
     */
    public function testExecute()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
