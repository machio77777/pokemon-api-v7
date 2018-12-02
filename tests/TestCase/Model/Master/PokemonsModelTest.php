<?php

namespace App\Test\TestCase\Model\Master;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use App\Model\Master\PokemonsModel;
use App\Common\ApiLogger;

/**
 * PokemonsModelクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Model/Master/PokemonsModelTest.php
 */
class PokemonsModelTest extends TestCase {
    
    private $pokemonsModel;
    
    public function setup()
    {
        parent::setUp();
        $this->pokemonsModel = new PokemonsModel(new ApiLogger());
    }
    
    /**
     * ポケモン図鑑一覧取得
     */
    public function testgetList()
    {
        // 正常系パターン
        $pokemon = $this->pokemonsModel->getList()[0];
        $this->assertEquals("1", $pokemon['zukanNo']);
        $this->assertEquals("1", $pokemon['subNo']);
        $this->assertEquals("フシギダネ", $pokemon['name']);
    }
    
    /**
     * ポケモン図鑑取得
     */
    public function testget()
    {
        // NULLパターン
        $this->assertEquals(null, $this->pokemonsModel->get(1, 100));
        
        // 正常系パターン
        $pokemon = $this->pokemonsModel->get(1, 1);
        $this->assertEquals("1", $pokemon['zukanNo']);
        $this->assertEquals("1", $pokemon['subNo']);
        $this->assertEquals("フシギダネ", $pokemon['name']);
        $this->assertEquals("くさ", $pokemon['type1']);
        $this->assertEquals("どく", $pokemon['type2']);
        $this->assertEquals("しんりょく", $pokemon['quality1']);
        $this->assertEquals(null, $pokemon['quality2']);
        $this->assertEquals("ようりょくそ", $pokemon['dreamQuality']);
        $this->assertEquals("45", $pokemon['hp']);
        $this->assertEquals("49", $pokemon['at']);
        $this->assertEquals("49", $pokemon['df']);
        $this->assertEquals("65", $pokemon['sa']);
        $this->assertEquals("65", $pokemon['sd']);
        $this->assertEquals("45", $pokemon['sp']);
    }
    
    /**
     * ポケモン別の覚える技一覧取得
     */
    public function testgetSkills()
    {
        // 正常系パターン
        $skills = $this->pokemonsModel->getSkills(1, 1);
        $this->assertEquals("314", $skills[0]['skillId']);
        $this->assertEquals("439", $skills[1]['skillId']);
    }
    
}
