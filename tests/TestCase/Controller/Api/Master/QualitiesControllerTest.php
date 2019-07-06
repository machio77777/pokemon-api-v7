<?php
namespace App\Test\TestCase\Controller\Api\Master;

use App\Test\TestCase\Controller\Api\BaseControllerTest;

/**
 * QualitiesControllerTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Controller/Api/Master/QualitiesControllerTest.php
 */
class QualitiesControllerTest extends BaseControllerTest
{
    /**
     * 特性一覧取得
     */
    public function testgetList()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/qualities');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * 特性取得
     */
    public function testget()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/qualities/100');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }

    /**
     * 特性に紐づくポケモン一覧取得
     */
    public function testgetPokemons()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/qualities/100/pokemons');

        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
}
