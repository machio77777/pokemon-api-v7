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
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
        
        // レスポンスボディー
        $res = json_decode($this->_response->getBody(), true)['data'][0];
        $this->assertEquals("1", $res['zukanNo']);
        $this->assertEquals("1", $res['subNo']);
        $this->assertEquals("フシギダネ", $res['name']);
    }
    
    /**
     * ポケモン図鑑取得
     */
    public function testget()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons/150/1');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
        
        // レスポンスボディー
        $res = json_decode($this->_response->getBody(), true)['data'];
        $this->assertEquals("150", $res['zukanNo']);
        $this->assertEquals("1", $res['subNo']);
        $this->assertEquals("ミュウツー", $res['name']);
        $this->assertEquals("エスパー", $res['type1']);
        $this->assertEquals(null, $res['type2']);
        $this->assertEquals("プレッシャー", $res['quality1']);
        $this->assertEquals(null, $res['quality2']);
        $this->assertEquals("きんちょうかん", $res['dreamQuality']);
        $this->assertEquals("106", $res['hp']);
        $this->assertEquals("110", $res['at']);
        $this->assertEquals("90", $res['df']);
        $this->assertEquals("154", $res['sa']);
        $this->assertEquals("90", $res['sd']);
        $this->assertEquals("130", $res['sp']);
        $this->assertEquals("0", $res['megaFlg']);
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
