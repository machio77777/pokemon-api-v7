<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\QualitiesComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * Qualitiesコンポーネントテストクラス
 */
class QualitiesComponentTest extends TestCase
{
    public $Qualities;
    
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Qualities = new QualitiesComponent($registry);
    }
    
    /**
     * 特性一覧取得
     */
    public function testscrapingQualities()
    {
        $qualities = $this->Qualities->collectQualities();
        $this->assertTextEquals("あくしゅう", $qualities[0][1]);
        $this->assertTextEquals("野生ポケモンと出会いにくくなる。攻撃した相手がたまにひるむ。", $qualities[0][2]);
        $this->assertTextEquals("ブレインフォース", $qualities[232][1]);
        $this->assertTextEquals("効果抜群のわざの威力を1.2倍に上げる。", $qualities[232][2]);
    }
}
