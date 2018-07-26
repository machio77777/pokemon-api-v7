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
     * ポケモン一覧取得
     */
    public function testsscrapingPokemons()
    {
        $pokemons = $this->Scraping->scrapingPokemons();
        $this->assertTextEquals("フシギダネ", $pokemons[0][1]);
        $this->assertTextEquals("ゼラオラ", $pokemons[844][1]);
    }
    
    /**
     * 特性一覧取得
     */
    public function testscrapingQualities()
    {
        $qualities = $this->Scraping->scrapingQualities();
        $this->assertTextEquals("あくしゅう", $qualities[0][1]);
        $this->assertTextEquals("野生ポケモンと出会いにくくなる。攻撃した相手がたまにひるむ。", $qualities[0][2]);
        $this->assertTextEquals("ブレインフォース", $qualities[232][1]);
        $this->assertTextEquals("効果抜群のわざの威力を1.2倍に上げる。s", $qualities[232][2]);
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
