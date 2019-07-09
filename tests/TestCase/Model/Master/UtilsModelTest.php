<?php

namespace App\Test\TestCase\Model\Master;

use Cake\TestSuite\TestCase;
use App\Model\Master\UtilsModel;
use App\Common\ApiLogger;

/**
 * UtilsModelクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Model/Master/UtilsModelTest.php
 */
class UtilsModelTest extends TestCase {
    
    private $utilsModel;
    
    public function setup()
    {
        parent::setUp();
        $this->utilsModel = new UtilsModel(new ApiLogger());
    }
    
    /**
     * 性格一覧取得
     */
    public function testgetList()
    {
        $chars = $this->utilsModel->getCharList();
        $this->assertEquals("1", $chars[0]['charId']);
        $this->assertEquals("さみしがり", $chars[0]['name']);
        $this->assertEquals("1", $chars[0]['at']);
        $this->assertEquals("0", $chars[0]['df']);
        $this->assertNull($chars[0]['sa']);
        $this->assertNull($chars[0]['sd']);
        $this->assertNull($chars[0]['sp']);
    }

    /**
     * 属性一覧取得
     */
    public function testgetTypeList()
    {
        $types = $this->utilsModel->getTypeList();
        $this->assertEquals("1", $types[0]['typeId']);
        $this->assertEquals("ノーマル", $types[0]['typeName1']);
        $this->assertEquals("ノ", $types[0]['typeName2']);
    }
    
}
