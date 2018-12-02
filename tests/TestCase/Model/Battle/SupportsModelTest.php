<?php

namespace App\Test\TestCase\Model\Battle;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use App\Model\Battle\SupportsModel;
use App\Common\ApiLogger;

/**
 * SupportsModelTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Model/Battle/SupportsModelTest.php
 */
class SupportsModelTest extends TestCase {
    
    private $supportsModel;
    private $compatibilities;
    
    public function setup()
    {
        parent::setUp();
        $this->compatibilities = TableRegistry::get('Compatibilities');
        $this->supportsModel = new SupportsModel(new ApiLogger());
    }
    
    /**
     * 相性補完一覧取得
     */
    public function testgetList()
    {
        // 正常系パターン
        $supports = $this->supportsModel->getList();
        $this->assertEquals([], $supports);
    }
    
    /**
     * 相性補完登録
     */
    public function testadd()
    {
        // 正常系
        $this->assertTrue($this->supportsModel->add([]));
    }
    
    /**
     * 相性補完取得
     */
    public function testget()
    {
        // NULLパターン
        $this->assertEquals([], $this->supportsModel->get(1));
    }
    
    /**
     * 相性補完更新
     */
    public function testupdate()
    {
        // 正常系
        $this->assertTrue($this->supportsModel->update([]));
    }
    
    /**
     * 相性補完削除
     */
    public function delete()
    {
        // 正常系
        $this->assertEquals([], $this->supportsModel->delete(1));
    }
}
