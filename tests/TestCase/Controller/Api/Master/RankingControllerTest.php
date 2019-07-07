<?php
namespace App\Test\TestCase\Controller\Api\Master;

use App\Test\TestCase\Controller\Api\BaseControllerTest;

/**
 * RankingControllerTestクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Controller/Api/Master/RankingControllerTest.php
 */
class RankingControllerTest extends BaseControllerTest
{
    /**
     * ポケモン一覧取得(HP種族値昇順)
     */
    public function testgetHpList()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/ranking/hp');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }

    /**
     * ポケモン一覧取得(AT種族値昇順)
     */
    public function testgetAtList()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/ranking/at');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }

    /**
     * ポケモン一覧取得(DF種族値昇順)
     */
    public function testgetDfList()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/ranking/df');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }

    /**
     * ポケモン一覧取得(SA種族値昇順)
     */
    public function testgetSaList()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/ranking/sa');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }

    /**
     * ポケモン一覧取得(SD種族値昇順)
     */
    public function testgetSdList()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/ranking/sd');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }

    /**
     * ポケモン一覧取得(SP種族値昇順)
     */
    public function testgetSpList()
    {
        $this->get(BaseControllerTest::API_REVISION_V1 . '/ranking/sp');
        
        // ステータスコード
        $this->assertResponseCode(BaseControllerTest::HTTP_CODE_OK);
    }
}
