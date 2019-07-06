<?php
namespace App\Test\TestCase\Controller\Api\Master;

use App\Test\TestCase\Controller\Api\BaseControllerTest;

/**
 * PokemonsControllerTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Controller/Api/Master/PokemonsControllerTest.php
 */
class PokemonsControllerTest extends BaseControllerTest
{
    /**
     * ポケモン図鑑一覧取得
     */
    public function testgetList()
    {
        // パターン1 クエリストリングなし
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);

        // パターン2 クエリストリングあり
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons?generation=1&megaFlg=1');

        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * ポケモン図鑑取得
     */
    public function testget()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons/150/1');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * ポケモン別に覚える技一覧取得
     */
    public function testgetSkills()
    {
        // パターン1 クエリストリングなし
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/skills');

        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);

        // パターン2 クエリストリングあり
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons/1/1/skills?typeId=1');

        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
}
