<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\PokemonsComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * Pokemonsコンポーネントテストクラス
 */
class PokemonsComponentTest extends TestCase
{
    public $Pokemons;

    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Pokemons = new PokemonsComponent($registry);
    }
    
    /**
     * ポケモン一覧取得
     */
    public function testcollectBasicInfo()
    {
        $pokemons = $this->Pokemons->collectBasicInfo();
        $this->assertTextEquals("フシギダネ", $pokemons[0][1]);
        $this->assertTextEquals("ゼラオラ", $pokemons[844][1]);
    }
}
