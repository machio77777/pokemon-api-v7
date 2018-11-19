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
        // 正常系
        $this->get(BaseControllerTest::API_REVISION_V1 . '/skills');
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
    /**
     * 特性取得
     */
    public function testget()
    {
        // 正常系
        $this->get(BaseControllerTest::API_REVISION_V1 . '/skills/100');
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
    
}
