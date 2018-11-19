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
        // 正常系
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons');
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * ポケモン図鑑取得
     */
    public function testget()
    {
        // 正常系
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons/150/150');
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * ポケモン別に覚える技一覧取得
     */
    public function testgetSkills()
    {
        // 正常系
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons/150/150/skills');
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
}
