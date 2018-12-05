<?php
namespace App\Test\TestCase\Controller\Api\Battle;

use App\Test\TestCase\Controller\Api\BaseControllerTest;
use Cake\ORM\TableRegistry;

/**
 * SoldiersControllerTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Controller/Api/Battle/SoldiersControllerTest.php
 */
class SoldiersControllerTest extends BaseControllerTest
{
    /**
     * 対戦用育成済みポケモン一覧取得
     */
    public function testgetList()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/soldiers');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * 対戦用育成済みポケモン登録
     */
    public function testadd()
    {
        // 初期化
        $pbattles = TableRegistry::get('Pbattles');
        $pbattles->deleteAll([]);
        
        $soldier = [];
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
        
        $this->post(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/soldiers', $soldier);
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * 対戦用育成済みポケモン取得
     */
    public function testget()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/soldiers/1');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * 対戦用育成済みポケモン更新
     */
    public function testupdate()
    {
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
        
        $this->put(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/soldiers/SOL0000001', $soldier);
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * 対戦用育成済みポケモン削除
     */
    public function testdelete()
    {
        // 初期化
        $pbattles = TableRegistry::get('Pbattles');
        $pbattles->deleteAll([]);
        
        $soldier = [];
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
        
        $this->post(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/soldiers', $soldier);
        
        $this->delete(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/soldiers/SOL0000001');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
}
