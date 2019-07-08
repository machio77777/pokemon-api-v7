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
     * ポケモン図鑑一覧取得
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
    
}
