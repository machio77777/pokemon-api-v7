<?php
namespace App\Test\TestCase\Controller\Api\Master;

use App\Test\TestCase\Controller\Api\BaseControllerTest;

/**
 * SkillsControllerTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Controller/Api/Master/SkillsControllerTest.php
 */
class SkillsControllerTest extends BaseControllerTest
{
    /**
     * 技一覧取得
     */
    public function testgetList()
    {
        // パターン1 クエリストリングなし
        $this->get(BaseControllerTest::API_REVISION_V1 . '/skills');

        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);

        // パターン2 クエリストリングあり
        $this->get(BaseControllerTest::API_REVISION_V1 . '/skills?typeId=1');

        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * 技取得
     */
    public function testget()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/skills/1');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }

    /**
     * 技に紐づくポケモン一覧取得
     */
    public function testgetPokemons()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/skills/1/pokemons');

        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
}
