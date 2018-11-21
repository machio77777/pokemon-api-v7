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
     * 特性一覧取得
     */
    public function testgetList()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/skills');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
        
        // レスポンスボディー
        $res = json_decode($this->_response->getBody(), true)['data'][0];
        $this->assertEquals("1", $res['skillId']);
        $this->assertEquals("アームハンマー", $res['skillName']);
    }
    
    /**
     * 特性取得
     */
    public function testget()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/skills/1');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
        
        // レスポンスボディー
        $res = json_decode($this->_response->getBody(), true)['data'];
        $this->assertEquals("1", $res['skillId']);
        $this->assertEquals("アームハンマー", $res['skillName']);
        $this->assertEquals("かくとう", $res['typeName']);
        $this->assertEquals("100", $res['power']);
        $this->assertEquals("180", $res['zpower']);
        $this->assertEquals("10", $res['pp']);
        $this->assertEquals("物理", $res['classification']);
        $this->assertEquals("90", $res['accuracy']);
        $this->assertEquals("1", $res['target']);
        $this->assertEquals("攻撃後、自分の『すばやさ』ランクが1段階下がる。特性『てつのこぶし』の時、威力が1.2倍になる。", $res['effect']);
        $this->assertEquals("直○", $res['directAttack']);
        $this->assertEquals("守○", $res['mamoru']);
    }
    
}
