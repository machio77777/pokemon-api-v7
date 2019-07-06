<?php

namespace App\Test\TestCase\Model\Master;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use App\Model\Master\QualitiesModel;
use App\Common\ApiLogger;

/**
 * QualitiesModelTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Model/Master/QualitiesModelTest.php
 */
class QualitiesModelTest extends TestCase {
    
    private $qualitiesModel;
    private $qualities;
    
    public function setup()
    {
        parent::setUp();
        $this->qualities = TableRegistry::get('Qualities');
        $this->qualitiesModel = new QualitiesModel(new ApiLogger());
    }
    
    /**
     * 特性一覧取得
     */
    public function testgetList()
    {
        // パターン1 正常系
        $qualities = $this->qualitiesModel->getList()[0];
        $this->assertEquals("1", $qualities['qualityId']);
        $this->assertEquals("あくしゅう", $qualities['qualityName']);
    }
    
    /**
     * 特性取得
     */
    public function testget()
    {
        // パターン1 NULL
        $this->assertEquals(null, $this->qualitiesModel->get(9999));
        
        // パターン2 正常系
        $quality = $this->qualitiesModel->get(1);
        $this->assertEquals("1", $quality['qualityId']);
        $this->assertEquals("あくしゅう", $quality['qualityName']);
        $this->assertEquals("野生ポケモンと出会いにくくなる。攻撃した相手がたまにひるむ。", $quality['effect']);
    }
}
