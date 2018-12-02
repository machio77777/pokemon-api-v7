<?php

namespace App\Test\TestCase\Model\Traning;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use App\Model\Traning\SoldiersModel;
use App\Common\ApiLogger;

/**
 * SoldiersModelTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Model/Traning/SoldiersModelTest.php
 */
class SoldiersModelTest extends TestCase {
    
    private $soldiersModel;
    private $pbattle;
    
    public function setup()
    {
        parent::setUp();
        $this->pbattle = TableRegistry::get('Pbattle');
        $this->soldiersModel = new SoldiersModel(new ApiLogger());
    }
    
    /**
     * 対戦用育成済みポケモン一覧取得
     */
    public function testgetList()
    {
        // 正常系パターン
        $supports = $this->soldiersModel->getList();
        $this->assertEquals([], $supports);
    }
    
    /**
     * 対戦用育成済みポケモン登録
     */
    public function testadd()
    {
        // 正常系
        $this->assertTrue($this->soldiersModel->add([]));
    }
    
    /**
     * 対戦用育成済みポケモン取得
     */
    public function testget()
    {
        // NULLパターン
        $this->assertEquals([], $this->soldiersModel->get(1));
    }
    
    /**
     * 対戦用育成済みポケモン更新
     */
    public function testupdate()
    {
        // 正常系
        $this->assertTrue($this->soldiersModel->update([]));
    }
    
    /**
     * 対戦用育成済みポケモン削除
     */
    public function delete()
    {
        // 正常系
        $this->assertEquals([], $this->soldiersModel->delete(1));
    }
}
