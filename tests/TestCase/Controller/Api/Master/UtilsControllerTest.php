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
     * 性格一覧取得
     */
    public function testgetList()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/character');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }

    /**
     * 属性一覧取得
     */
    public function testgetType()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/type');

        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
}
