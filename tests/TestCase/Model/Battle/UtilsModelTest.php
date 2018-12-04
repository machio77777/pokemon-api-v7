<?php

namespace App\Test\TestCase\Model\Battle;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use App\Model\Battle\UtilsModel;
use App\Common\ApiLogger;

/**
 * UtilsModelTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Model/Battle/UtilsModelTest.php
 */
class UtilsModelTest extends TestCase {
    
    private $utilsModel;
    private $compatibilities;
    
    public function setup()
    {
        parent::setUp();
        $this->compatibilities = TableRegistry::get('Compatibilities');
        $this->utilsModel = new UtilsModel(new ApiLogger());
    }
    
    /**
     * 相性補完一覧取得
     */
    public function testgetList()
    {
        // 正常系パターン
        $supports = $this->utilsModel->getSuportsList();
        $this->assertEquals([], $supports);
    }
}
