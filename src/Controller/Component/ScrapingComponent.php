<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Goutte\Client;

/**
 * スクレイピングコンポーネントクラス
 */
class ScrapingComponent extends Component
{
    protected $_defaultConfig = [];
    
    protected $types;
    
    public function __construct(ComponentRegistry $registry, array $config = array())
    {
        parent::__construct($registry, $config);
        
        $this->client = new Client();
        
        $this->initTypes();
    }
    
    /**
     * スクレイピング-ポケモン一覧
     * テーブル-Pokemons
     * 
     * @return array
     * 
     * レスポンス値
     * - 図鑑No
     * - ポケモン名
     * - 属性1
     * - 属性2
     */
    public function scrapingPokemons()
    {
        $uri = "https://wiki.xn--rckteqa2e.com/wiki/" . urlencode("ポケモン一覧");
        $crawler = $this->client->request('GET', $uri);
        $elements = $crawler->filter('table.bluetable tr td')->each(function($element){
            return $element->text();
        });
        
        $pokemons = array();
        $pokemon = array();
        $max = count($elements);
        
        for ($i = 0; $i < $max; $i++) {
            
            // 図鑑No+名前+属性1+属性2の順に格納
            if ($i !== 0 && ($i % 4 === 0)) {
                $pokemons[] = $pokemon;
                $pokemon = array();
            }
            
            // 単体属性(属性2が無いケースの考慮)
            $isNotBlank = (trim($elements[$i]) !== "");
            if ($isNotBlank) {
                $pokemon[] = trim($elements[$i]);
            }
            
            // 最後の図鑑Noのポケモン追加
            $isLast = ($i === ($max - 1));
            if ($isLast) {
                $pokemons[] = $pokemon;
            }
        }
        return $pokemons;
    }
    
    /**
     * スクレイピング-特性
     * テーブル-Qualities
     * 
     * @return array
     * 
     * レスポンス値
     * - No 
     * - とくせい名
     * - 効果
     */
    public function scrapingQualities()
    {
        $uri = "https://wiki.xn--rckteqa2e.com/wiki/" . urlencode("とくせい一覧");
        $crawler = $this->client->request('GET', $uri);
        $elements = $crawler->filter('table.bluetable tr td')->each(function($element){
            return $element->text();
        });
        
        $qualities = array();
        $qualitity = array();
        $max = count($elements);
        
        for ($i = 0; $i < $max; $i++) {
            
            // 初出世代は不要
            if ($i !== 0 && ($i % 4 === 0)) {
                array_pop($qualitity);
                $qualities[] = $qualitity;
                $qualitity = array();
            }
            
            $qualitity[] = trim($elements[$i]);
            
            $isLast = ($i === ($max - 1));
            if ($isLast) {
                array_pop($qualitity);
                $qualities[] = $qualitity;
            }
        }
        return $qualities;
    }
    
    /**
     * スクレイピング-技リスト
     * - skills
     * 
     * @return array
     * 
     * レスポンス値
     * 技情報
     * - 名前
     * - 属性
     * - 分類(物理/特殊/変化)
     * - 威力
     * - Z技
     * - 命中
     * - PP
     * - 直接
     * - 守る
     * - 対象
     * - 効果
     */
    public function scrapingSkills()
    {
        $skills = array();
        
        for ($i = 0; $i < 10; $i++) {
            
            $uri = "https://yakkun.com/sm/move_list.htm?c=" . $i;
            $crawler = $this->client->request('GET', $uri);
            $elements = $crawler->filter('table.center tr td')->each(function($element){
                return $element->text();
            });
            
            $skill = array();
            $max = count($elements);
            
            for ($j = 0; $j < $max; $j++) {
                
                if ($j !== 0 && ($j % 11 === 0)) {
                    $skills[] = $skill;
                    $skill = array();
                }
                
                $skill[] = trim($elements[$j]);
            
                $isLast = ($j === ($max - 1));
                if ($isLast) {
                    $skills[] = $skill;
                }
            }
        }
        return $skills;
    }
    
    /**
     * 属性変換
     * @param  string $typeNm
     * @return string 
     */
    public function convertType($typeNm)
    {
        if (array_key_exists($typeNm, $this->types)) {
            return $this->types[$typeNm];
        } else {
            return "";
        }
    }
    
    /**
     * 属性初期化
     */
    private function initTypes()
    {
        $this->types = array(
            'ノーマル' => 1,
            'ほのお' => 2,
            'みず' => 3,
            'でんき' => 4,
            'くさ' => 5,
            'こおり' => 6,
            'かくとう' => 7,
            'どく' => 8,
            'じめん' => 9,
            'ひこう' => 10,
            'エスパー' => 11,
            'むし' => 12,
            'いわ' => 13,
            'ゴースト' => 14,
            'ドラゴン' => 15,
            'あく' => 16,
            'はがね' => 17,
            'フェアリー' => 18
        );
    }
    
}
