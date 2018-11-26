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
        // 正常系パターン
        $skill = $this->skillsModel->getList()[0];
        $this->assertEquals("1", $skill['skillId']);
        $this->assertEquals("アームハンマー", $skill['skillName']);
    }
    
    /**
     * 技取得
     */
    public function testget()
    {
        // NULLパターン
        $this->assertEquals(null, $this->skillsModel->get(9999));
        
        // 正常系パターン
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
}
