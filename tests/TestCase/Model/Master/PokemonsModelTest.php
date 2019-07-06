<?php

namespace App\Test\TestCase\Model\Master;

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
        // パターン1 クエリストリングなし
        $pokemonNotQueryString = $this->pokemonsModel->getList(null, null)[0];
        $this->assertEquals("1", $pokemonNotQueryString['zukanNo']);
        $this->assertEquals("1", $pokemonNotQueryString['subNo']);
        $this->assertEquals("フシギダネ", $pokemonNotQueryString['name']);

        // パターン2 クエリストリングあり
        $pokemonQueryString = $this->pokemonsModel->getList(1, 1)[0];
        $this->assertEquals("3", $pokemonQueryString['zukanNo']);
        $this->assertEquals("2", $pokemonQueryString['subNo']);
        $this->assertEquals("メガフシギバナ", $pokemonQueryString['name']);
    }
    
    /**
     * ポケモン図鑑取得
     */
    public function testget()
    {
        // パターン1 NULL
        $this->assertEquals(null, $this->pokemonsModel->get(1, 100));
        
        // パターン2 正常系
        $pokemon = $this->pokemonsModel->get(1, 1);
        $this->assertEquals("1", $pokemon['zukanNo']);
        $this->assertEquals("1", $pokemon['subNo']);
        $this->assertEquals("フシギダネ", $pokemon['name']);
        $this->assertEquals("5", $pokemon['typeId1']);
        $this->assertEquals("8", $pokemon['typeId2']);
        $this->assertEquals("くさ", $pokemon['typeName1']);
        $this->assertEquals("どく", $pokemon['typeName2']);
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
        // パターン1 クエリストリングなし
        $skillsNotQueryString = $this->pokemonsModel->getSkills(1, 1, null);
        $this->assertEquals("314", $skillsNotQueryString[0]['skillId']);
        $this->assertEquals("たいあたり", $skillsNotQueryString[0]['skillName']);
        $this->assertEquals("1", $skillsNotQueryString[0]['typeId']);
        $this->assertEquals("ノーマル", $skillsNotQueryString[0]['typeName']);
        $this->assertEquals("40", $skillsNotQueryString[0]['power']);
        $this->assertEquals("通常攻撃。(第6世代は威力:50)", $skillsNotQueryString[0]['effect']);

        // パターン2 クエリストリング
        $skillsQueryString = $this->pokemonsModel->getSkills(1, 1, null);
        $this->assertEquals("314", $skillsQueryString[0]['skillId']);
        $this->assertEquals("たいあたり", $skillsQueryString[0]['skillName']);
        $this->assertEquals("1", $skillsQueryString[0]['typeId']);
        $this->assertEquals("ノーマル", $skillsQueryString[0]['typeName']);
        $this->assertEquals("40", $skillsQueryString[0]['power']);
        $this->assertEquals("通常攻撃。(第6世代は威力:50)", $skillsQueryString[0]['effect']);
    }
    
}
