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
    CONST BASE_URI = "https://wiki.xn--rckteqa2e.com/wiki/";

    protected $_defaultConfig = [];
    
    protected $types;
    
    public function __construct(ComponentRegistry $registry, array $config = array())
    {
        parent::__construct($registry, $config);
        
        $this->client = new Client();
        
        $this->initTypes();
    }
    
    /**
     * ポケモン基本情報
     * 
     * @return array
     * 
     * レスポンス値
     * - 図鑑No
     * - ポケモン名
     * - 属性1
     * - 属性2
     */
    public function createPokemonBasic()
    {
        $uri = self::BASE_URI . urlencode("ポケモン一覧");
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
                
                $idx = count($pokemon);
                $isType = ($idx === 2 || $idx === 3);
                
                if ($isType) {
                    $pokemon[] = $this->convertType(trim($elements[$i]));
                } else {
                    $pokemon[] = trim($elements[$i]);
                }
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
