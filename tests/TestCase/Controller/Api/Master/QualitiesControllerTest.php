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
        
        // レスポンスボディー
        $res = json_decode($this->_response->getBody(), true)['data'][0];
        $this->assertEquals("1", $res['qualityId']);
        $this->assertEquals("あくしゅう", $res['qualityName']);
    }
    
    /**
     * 特性取得
     */
    public function testget()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/qualities/100');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
        
        // レスポンスボディー
        $res = json_decode($this->_response->getBody(), true)['data'];
        $this->assertEquals("100", $res['qualityId']);
        $this->assertEquals("あとだし", $res['qualityName']);
        $this->assertEquals("常に自分が後攻になる。", $res['effect']);
    }
    
}
