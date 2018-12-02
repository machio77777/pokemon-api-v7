<?php
namespace App\Test\TestCase\Controller\Api\Traning;

use App\Test\TestCase\Controller\Api\BaseControllerTest;

/**
 * RolesTargetsControllerTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Controller/Api/Traning/RolesTargetsControllerTest.php
 */
class RolesTargetsControllerTest extends BaseControllerTest
{
    /**
     * 役割対象一覧取得
     */
    public function testgetList()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/roleTargets');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * 役割対象登録
     */
    public function testadd()
    {
        $this->post(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/roleTargets');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * 役割対象更新
     */
    public function testupdate()
    {
        $this->put(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/roleTargets/1');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * 役割対象削除
     */
    public function testdelete()
    {
        $this->delete(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/roleTargets/1');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
}
