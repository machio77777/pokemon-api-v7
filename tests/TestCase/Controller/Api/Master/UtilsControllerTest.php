<?php
namespace App\Test\TestCase\Controller\Api\Master;

use App\Test\TestCase\Controller\Api\BaseControllerTest;

/**
 * UtilsControllerTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Controller/Api/Master/UtilsControllerTest.php
 */
class UtilsControllerTest extends BaseControllerTest
{
    /**
     * ポケモン図鑑一覧取得
     */
    public function testgetList()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/character');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
}
