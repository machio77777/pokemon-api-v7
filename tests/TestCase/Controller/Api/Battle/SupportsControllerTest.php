<?php
namespace App\Test\TestCase\Controller\Api\Traning;

use App\Test\TestCase\Controller\Api\BaseControllerTest;

/**
 * SupportsControllerTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Controller/Api/Traning/SoldiersControllerTest.php
 */
class SoldiersControllerTest extends BaseControllerTest
{
    /**
     * 対戦用育成ポケモン一覧取得
     */
    public function testgetList()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/soldiers');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * 対戦用育成ポケモン登録
     */
    public function testadd()
    {
        $this->post(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/soldiers');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * 対戦用育成ポケモン取得
     */
    public function testget()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/soldiers/1');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * 対戦用育成ポケモン更新
     */
    public function testupdate()
    {
        $this->put(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/soldiers/1');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * 対戦用育成ポケモン削除
     */
    public function testdelete()
    {
        $this->delete(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/soldiers/1');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
}
