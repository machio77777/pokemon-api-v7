<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ScrapingComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * スクレイピングコンポーネントテスト
 */
class ScrapingComponentTest extends TestCase
{
    public $Scraping;
    
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Scraping = new ScrapingComponent($registry);
    }
    
    /**
     * ポケモン基本情報取得
     */
    public function testcreatePokemonBasic()
    {
        $pokemons = $this->Scraping->createPokemonBasic();
        $this->assertTextEquals("フシギダネ", $pokemons[0][1]);
        $this->assertTextEquals("ゼラオラ", $pokemons[844][1]);
    }
    
    /**
     * 属性変換
     */
    public function testconvertType()
    {
        $typeCd1 = $this->Scraping->convertType('みず');
        $this->assertTextEquals(3, $typeCd1);
        $typeCd2 = $this->Scraping->convertType('フェアリー');
        $this->assertTextEquals(18, $typeCd2);
    }
}
