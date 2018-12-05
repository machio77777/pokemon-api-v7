<?php

namespace App\Test\TestCase\Model\Battle;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use App\Model\Battle\SoldiersModel;
use App\Common\ApiLogger;

/**
 * SoldiersModelTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Model/Battle/SoldiersModelTest.php
 */
class SoldiersModelTest extends TestCase {
    
    private $soldiersModel;
    private $pbattles;
    
    public function setup()
    {
        parent::setUp();
        $this->pbattles = TableRegistry::get('Pbattles');
        $this->soldiersModel = new SoldiersModel(new ApiLogger());
    }
    
    /**
     * 対戦用育成済みポケモン一覧取得
     */
    public function testgetList()
    {
        // 取得件数0件の確認
        $this->assertEquals([], $this->soldiersModel->getList('test', 'test'));
    }
    
    /**
     * 対戦用育成済みポケモン取得
     */
    public function testget()
    {
        // 取得件数0件の確認
        $this->assertEquals([], $this->soldiersModel->get('test', 'test', 'test'));
    }
    
    /**
     * 対戦用育成済みポケモン登録
     */
    public function testadd()
    {
        // 初期化
        $this->pbattles->deleteAll([]);
        
        // 正常系
        $soldier = [];
        $soldier['zukanNo'] = 1;
        $soldier['subNo'] = 2;
        $soldier['personality'] = 'いじっぱり';
        $soldier['qualityId'] = 3;
        $soldier['skillId1'] = 4;
        $soldier['skillId2'] = 5;
        $soldier['skillId3'] = 6;
        $soldier['skillId4'] = 7;
        $soldier['ehp'] = 250;
        $soldier['eat'] = 251;
        $soldier['edf'] = 252;
        $soldier['esa'] = 253;
        $soldier['esd'] = 254;
        $soldier['esp'] = 255;
        $soldier['ahp'] = 101;
        $soldier['aat'] = 102;
        $soldier['adf'] = 103;
        $soldier['asa'] = 104;
        $soldier['asd'] = 105;
        $soldier['asp'] = 106;
        $this->assertEquals(1, $this->soldiersModel->add($soldier));
        
        // DB値の確認
        $sol = $this->pbattles->find('all')->where(['soldier_id' => 'SOL0000001'])->toArray()[0];
        $this->assertEquals(1, $sol['zukan_no']);
        $this->assertEquals(2, $sol['sub_no']);
        $this->assertEquals('いじっぱり', $sol['personality']);
        $this->assertEquals(3, $sol['quality_id']);
        $this->assertEquals(4, $sol['skill_id1']);
        $this->assertEquals(5, $sol['skill_id2']);
        $this->assertEquals(6, $sol['skill_id3']);
        $this->assertEquals(7, $sol['skill_id4']);
        $this->assertEquals(250, $sol['ehp']);
        $this->assertEquals(251, $sol['eat']);
        $this->assertEquals(252, $sol['edf']);
        $this->assertEquals(253, $sol['esa']);
        $this->assertEquals(254, $sol['esd']);
        $this->assertEquals(255, $sol['esp']);
        $this->assertEquals(101, $sol['ahp']);
        $this->assertEquals(102, $sol['aat']);
        $this->assertEquals(103, $sol['adf']);
        $this->assertEquals(104, $sol['asa']);
        $this->assertEquals(105, $sol['asd']);
        $this->assertEquals(106, $sol['asp']);
    }
    
    /**
     * 対戦用育成済みポケモン更新
     */
    public function testupdate()
    {
        // 正常系
        $soldier = [];
        $soldier['soldierId'] = 'SOL0000001';
        $soldier['zukanNo'] = 21;
        $soldier['subNo'] = 22;
        $soldier['personality'] = 'しんちょう';
        $soldier['qualityId'] = 13;
        $soldier['skillId1'] = 14;
        $soldier['skillId2'] = 15;
        $soldier['skillId3'] = 16;
        $soldier['skillId4'] = 17;
        $soldier['ehp'] = 150;
        $soldier['eat'] = 151;
        $soldier['edf'] = 152;
        $soldier['esa'] = 153;
        $soldier['esd'] = 154;
        $soldier['esp'] = 155;
        $soldier['ahp'] = 201;
        $soldier['aat'] = 202;
        $soldier['adf'] = 203;
        $soldier['asa'] = 204;
        $soldier['asd'] = 205;
        $soldier['asp'] = 206;
        $this->assertEquals(1, $this->soldiersModel->update($soldier));
        
        // DB値の確認
        $sol = $this->pbattles->find('all')->where(['soldier_id' => 'SOL0000001'])->toArray()[0];
        $this->assertEquals(21, $sol['zukan_no']);
        $this->assertEquals(22, $sol['sub_no']);
        $this->assertEquals('しんちょう', $sol['personality']);
        $this->assertEquals(13, $sol['quality_id']);
        $this->assertEquals(14, $sol['skill_id1']);
        $this->assertEquals(15, $sol['skill_id2']);
        $this->assertEquals(16, $sol['skill_id3']);
        $this->assertEquals(17, $sol['skill_id4']);
        $this->assertEquals(150, $sol['ehp']);
        $this->assertEquals(151, $sol['eat']);
        $this->assertEquals(152, $sol['edf']);
        $this->assertEquals(153, $sol['esa']);
        $this->assertEquals(154, $sol['esd']);
        $this->assertEquals(155, $sol['esp']);
        $this->assertEquals(201, $sol['ahp']);
        $this->assertEquals(202, $sol['aat']);
        $this->assertEquals(203, $sol['adf']);
        $this->assertEquals(204, $sol['asa']);
        $this->assertEquals(205, $sol['asd']);
        $this->assertEquals(206, $sol['asp']);
    }
    
    /**
     * 対戦用育成済みポケモン削除
     */
    public function testdelete()
    {
        // 正常系
        $this->assertEquals(1, $this->soldiersModel->delete('SOL0000001'));
        
        // DB値の確認
        $sol = $this->pbattles->find('all')->where(['soldier_id' => 'SOL0000001'])->toArray()[0];
        $this->assertEquals(1, $sol['delete_flg']);
    }
}
