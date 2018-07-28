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
    
    /**
     * 種族値・特性一覧取得
     */
    public function testcollectTribals()
    {
        $failure1 = $this->Pokemons->collectTribals(0, 4);
        $this->assertFalse($failure1);
        
        $failure2 = $this->Pokemons->collectTribals(5, 4);
        $this->assertFalse($failure2);
        
        $pokemons = $this->Pokemons->collectTribals(1, 2);
        $this->assertTextEquals("45", $pokemons[0]['hp']);
        $this->assertTextEquals("しんりょく", $pokemons[0]['quality_id1']);
    }
    
    /**
     * 覚える技一覧取得
     */
    public function testcollectSkillsByPokemon()
    {
        $failure1 = $this->Pokemons->collectTribals(0, 4);
        $this->assertFalse($failure1);
        
        $failure2 = $this->Pokemons->collectTribals(5, 4);
        $this->assertFalse($failure2);
        
        $pokemons = $this->Pokemons->collectSkillsByPokemon(1, 2);
        $this->assertTextEquals("たいあたり", $pokemons[1][0]);
        $this->assertTextEquals("はっぱカッター", $pokemons[1][8]);
    }
}
