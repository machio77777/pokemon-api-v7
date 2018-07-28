<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\SkillsComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * Skillsコンポーネントテストクラス
 */
class SkillsComponentTest extends TestCase
{
    public $Skills;

    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Skills = new SkillsComponent($registry);
    }
    
    /**
     * 技一覧取得
     */
    public function testscrapingSkills()
    {
        $skills = $this->Skills->collectSkills();
        $this->assertTextEquals("アームハンマー", $skills[0][0]);
        $this->assertTextEquals("かくとう", $skills[0][1]);
        $this->assertTextEquals("物理", $skills[0][2]);
        $this->assertTextEquals("攻撃後、自分の『すばやさ』ランクが1段階下がる。特性『てつのこぶし』の時、威力が1.2倍になる。", $skills[0][10]);
    }
}
