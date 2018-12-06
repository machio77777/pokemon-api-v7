<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\CommonComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * CommonComponentテストクラス
 * 
 * [実行コマンド]
 * vendor/bin/phpunit tests/TestCase/Controller/Component/CommonComponentTest.php
 */
class CommonComponentTest extends TestCase
{
    public $Common;

    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Common = new CommonComponent($registry);
    }
    
    /**
     * 属性変換
     */
    public function testconvertType()
    {
        $typeCd1 = $this->Common->convertType('みず');
        $this->assertTextEquals(3, $typeCd1);
        $typeCd2 = $this->Common->convertType('フェアリー');
        $this->assertTextEquals(18, $typeCd2);
    }
    
    /**
     * 特性変換
     */
    public function testconvertQuality()
    {
        $quality1 = $this->Common->convertQuality('いかく');
        $this->assertTextEquals(22, $quality1);
        $quality2 = $this->Common->convertQuality('テスト');
        $this->assertTextEquals(0, $quality2);
    }
    
    /**
     * CakePHP3標準ValidateObject変換
     */
    public function testconvertCakeValidateObj()
    {
        $correctResponse = '{"val1":["xxxxx"],"val3":["yyyyy","zzzzz"]}';
        $errors = array("val1" => array("_empty" => "xxxxx"), "val3" => array("maxLength" => "yyyyy", "numeric" => "zzzzz"));
        
        $result = json_encode($this->Common->convertCakeValidateObject($errors));
        $this->assertEquals($correctResponse, $result);
    }
    
}
