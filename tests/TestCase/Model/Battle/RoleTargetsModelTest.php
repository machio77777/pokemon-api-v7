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
        // 初期化
        $this->roleTargets->deleteAll([]);
        
        // 正常系
        $roleTarget = [];
        $roleTarget['zukanNo'] = 1;
        $roleTarget['subNo'] = 2;
        $roleTarget['targetZukanNo'] = 3;
        $roleTarget['targetSubNo'] = 4;
        $this->assertEquals(1, $this->roleTargetsModel->add($roleTarget));
        
        // DB値の確認
        $tar = $this->roleTargets->find('all')->where(['target_id' => 1])->toArray()[0];
        $this->assertEquals(1, $tar['zukan_no']);
        $this->assertEquals(2, $tar['sub_no']);
        $this->assertEquals(3, $tar['target_zukan_no']);
        $this->assertEquals(4, $tar['target_sub_no']);
    }
    
    /**
     * 役割対象更新
     */
    public function testupdate()
    {
        // 正常系
        $roleTarget = [];
        $roleTarget['targetId'] = 1;
        $roleTarget['zukanNo'] = 11;
        $roleTarget['subNo'] = 22;
        $roleTarget['targetZukanNo'] = 33;
        $roleTarget['targetSubNo'] = 44;
        $this->assertEquals(1, $this->roleTargetsModel->update($roleTarget));
        
        // DB値の確認
        $tar = $this->roleTargets->find('all')->where(['target_id' => 1])->toArray()[0];
        $this->assertEquals(11, $tar['zukan_no']);
        $this->assertEquals(22, $tar['sub_no']);
        $this->assertEquals(33, $tar['target_zukan_no']);
        $this->assertEquals(44, $tar['target_sub_no']);
        
    }
    
    /**
     * 役割対象削除
     */
    public function testdelete()
    {
        // 正常系
        $this->assertEquals(1, $this->roleTargetsModel->delete(1));
        
        // DB値の確認
        $tar = $this->roleTargets->find('all')->where(['target_id' => 1])->toArray()[0];
        $this->assertEquals(1, $tar['delete_flg']);
    }
}
