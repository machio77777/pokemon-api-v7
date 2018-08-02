<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\CommonComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * CommonComponentテストクラス
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
}
