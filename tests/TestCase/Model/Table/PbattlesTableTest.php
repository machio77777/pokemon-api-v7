<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use App\Model\Table\PbattlesTable;
use App\Common\ApiMessage;

/**
 * PbattlesTableTest
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Model/Table/PbattlesTableTest.php
 */
class PbattlesTableTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->pbattles = TableRegistry::get('Pbattles');
    }
    
    /**
     * 登録 - ポケモン対戦用育成済み
     */
    public function testadd()
    {
        // 異常系 - 必須チェック(key未存在)
        $isEmpty = $this->pbattles->newEntity([], ['validate' => 'add']);
        $errObj1 = $isEmpty->getErrors();
        $this->assertNotEmpty($errObj1);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_PERSONALITY][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_QUALITYID][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_SKILLID1][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_SKILLID2][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_SKILLID3][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_SKILLID4][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_EHP][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_EAT][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_EDF][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_ESA][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_ESD][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_ESP][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_AHP][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_AAT][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_ADF][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_ASA][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_ASD][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_ASP][ApiMessage::VALID_KEY_REQUIRED]);
        
        // 異常系 - 必須チェック(ブランク)
        $isBlank = $this->pbattles->newEntity($this->createBlankObj(), ['validate' => 'add']);
        $errObj2 = $isBlank->getErrors();
        $this->assertNotEmpty($errObj2);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_PERSONALITY][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_QUALITYID][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_SKILLID1][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_SKILLID2][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_SKILLID3][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_SKILLID4][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_EHP][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_EAT][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_EDF][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_ESA][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_ESD][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_ESP][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_AHP][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_AAT][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_ADF][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_ASA][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_ASD][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_ASP][ApiMessage::VALID_KEY_EMPTY]);
    }
    
    /**
     * 更新 - ポケモン対戦用育成済み
     */
    public function testupdate()
    {
        // 異常系 - 必須チェック(key未存在)
        $isEmpty = $this->pbattles->newEntity([], ['validate' => 'update']);
        $errObj1 = $isEmpty->getErrors();
        $this->assertNotEmpty($errObj1);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_PERSONALITY][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_QUALITYID][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_SKILLID1][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_SKILLID2][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_SKILLID3][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_SKILLID4][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_EHP][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_EAT][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_EDF][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_ESA][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_ESD][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_ESP][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_AHP][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_AAT][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_ADF][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_ASA][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_ASD][ApiMessage::VALID_KEY_REQUIRED]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_0, $errObj1[PbattlesTable::KEY_ASP][ApiMessage::VALID_KEY_REQUIRED]);
        
        // 異常系 - 必須チェック(ブランク)
        $isBlank = $this->pbattles->newEntity($this->createBlankObj(), ['validate' => 'update']);
        $errObj2 = $isBlank->getErrors();
        $this->assertNotEmpty($errObj2);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_PERSONALITY][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_QUALITYID][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_SKILLID1][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_SKILLID2][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_SKILLID3][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_SKILLID4][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_EHP][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_EAT][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_EDF][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_ESA][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_ESD][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_ESP][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_AHP][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_AAT][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_ADF][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_ASA][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_ASD][ApiMessage::VALID_KEY_EMPTY]);
        $this->assertEquals(ApiMessage::VALID_ERROR_MSG_1, $errObj2[PbattlesTable::KEY_ASP][ApiMessage::VALID_KEY_EMPTY]);
    }
    
    private function createBlankObj()
    {
        return [
            PbattlesTable::KEY_PERSONALITY => '',
            PbattlesTable::KEY_QUALITYID   => '',
            PbattlesTable::KEY_SKILLID1    => '',
            PbattlesTable::KEY_SKILLID2    => '',
            PbattlesTable::KEY_SKILLID3    => '',
            PbattlesTable::KEY_SKILLID4    => '',
            PbattlesTable::KEY_EHP         => '',
            PbattlesTable::KEY_EAT         => '',
            PbattlesTable::KEY_EDF         => '',
            PbattlesTable::KEY_ESA         => '',
            PbattlesTable::KEY_ESD         => '',
            PbattlesTable::KEY_ESP         => '',
            PbattlesTable::KEY_AHP         => '',
            PbattlesTable::KEY_AAT         => '',
            PbattlesTable::KEY_ADF         => '',
            PbattlesTable::KEY_ASA         => '',
            PbattlesTable::KEY_ASD         => '',
            PbattlesTable::KEY_ASP         => ''
        ];
    }    
}
