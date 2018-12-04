<?php

namespace App\Test\TestCase\Model\Battle;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use App\Model\Battle\RoleTargetsModel;
use App\Common\ApiLogger;

/**
 * RoleTargetsModesTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Model/Battle/RoleTargetsModelTest.php
 */
class RoleTargetsModelTest extends TestCase {
    
    private $roleTargetsModel;
    private $roleTargets;
    
    public function setup()
    {
        parent::setUp();
        $this->roleTargets = TableRegistry::get('RoleTargets');
        $this->roleTargetsModel = new RoleTargetsModel(new ApiLogger());
    }
    
    /**
     * 役割対象一覧取得
     */
    public function testgetList()
    {
        // 正常系パターン
        $supports = $this->roleTargetsModel->getList('test', 'test');
        $this->assertEquals([], $supports);
    }
    
    /**
     * 役割対象登録
     */
    public function testadd()
    {
        // 正常系
        $this->assertTrue($this->roleTargetsModel->add([]));
    }
    
    /**
     * 役割対象更新
     */
    public function testupdate()
    {
        // 正常系
        $this->assertTrue($this->roleTargetsModel->update([]));
    }
    
    /**
     * 役割対象削除
     */
    public function delete()
    {
        // 正常系
        $this->assertEquals([], $this->roleTargetsModel->delete(1));
    }
}
