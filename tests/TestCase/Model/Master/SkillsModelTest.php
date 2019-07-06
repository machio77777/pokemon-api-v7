<?php

namespace App\Test\TestCase\Model\Master;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use App\Model\Master\SkillsModel;
use App\Common\ApiLogger;

/**
 * SkillsModelTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Model/Master/SkillsModelTest.php
 */
class SkillsModelTest extends TestCase {
    
    private $skillsModel;
    private $skills;
    
    public function setup()
    {
        parent::setUp();
        $this->skills = TableRegistry::get('Skills');
        $this->skillsModel = new SkillsModel(new ApiLogger());
    }
    
    /**
     * 技一覧取得
     */
    public function testgetList()
    {
        // パターン1 クエリストリングなし
        $skillNotQueryString = $this->skillsModel->getList(null)[0];
        $this->assertEquals("1", $skillNotQueryString['skillId']);
        $this->assertEquals("アームハンマー", $skillNotQueryString['skillName']);
        $this->assertEquals("7", $skillNotQueryString['typeId']);
        $this->assertEquals("かくとう", $skillNotQueryString['typeName']);
        $this->assertEquals("100", $skillNotQueryString['power']);
        $this->assertEquals("攻撃後、自分の『すばやさ』ランクが1段階下がる。特性『てつのこぶし』の時、威力が1.2倍になる。", $skillNotQueryString['effect']);

        // パターン2 クエリストリングあり
        $skillQueryString = $this->skillsModel->getList(7)[0];
        $this->assertEquals("1", $skillQueryString['skillId']);
        $this->assertEquals("アームハンマー", $skillQueryString['skillName']);
        $this->assertEquals("7", $skillQueryString['typeId']);
        $this->assertEquals("かくとう", $skillQueryString['typeName']);
        $this->assertEquals("100", $skillQueryString['power']);
        $this->assertEquals("攻撃後、自分の『すばやさ』ランクが1段階下がる。特性『てつのこぶし』の時、威力が1.2倍になる。", $skillQueryString['effect']);
    }
    
    /**
     * 技取得
     */
    public function testget()
    {
        // パターン1 NULL
        $this->assertEquals(null, $this->skillsModel->get(9999));
        
        // パターン2 正常系
        $skill = $this->skillsModel->get(1);
        $this->assertEquals("1", $skill['skillId']);
        $this->assertEquals("アームハンマー", $skill['skillName']);
        $this->assertEquals("かくとう", $skill['typeName']);
        $this->assertEquals("100", $skill['power']);
        $this->assertEquals("180", $skill['zpower']);
        $this->assertEquals("10", $skill['pp']);
        $this->assertEquals("物理", $skill['classification']);
        $this->assertEquals("90", $skill['accuracy']);
        $this->assertEquals("攻撃後、自分の『すばやさ』ランクが1段階下がる。特性『てつのこぶし』の時、威力が1.2倍になる。", $skill['effect']);
        $this->assertEquals("直○", $skill['directAttack']);
        $this->assertEquals("守○", $skill['mamoru']);
    }

    /**
     * 技に紐づくポケモン一覧取得
     */
    public function testgetPokemons()
    {
        $pokemons = $this->skillsModel->getPokemons(1);
        $this->assertEquals("74", $pokemons[0]['zukanNo']);
        $this->assertEquals("1", $pokemons[0]['subNo']);
        $this->assertEquals("イシツブテ", $pokemons[0]['name']);
    }
}
