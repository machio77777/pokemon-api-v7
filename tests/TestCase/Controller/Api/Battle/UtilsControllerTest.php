<?php
namespace App\Test\TestCase\Controller\Api\Traning;

use App\Test\TestCase\Controller\Api\BaseControllerTest;

/**
 * UtilsControllerTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Controller/Api/Battle/UtilsControllerTest.php
 */
class UtilsControllerTest extends BaseControllerTest
{
    /**
     * 相性補完一覧取得
     */
    public function testgetList()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/pokemons/supports');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
}
