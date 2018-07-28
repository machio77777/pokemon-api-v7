<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Goutte\Client;

/**
 * Pokemonsコンポーネントクラス
 */
class PokemonsComponent extends Component
{
    CONST POKEMON_WIKI = "https://wiki.xn--rckteqa2e.com/wiki/";
    
    protected $_defaultConfig = [];
    
    private $client;
    
    public function __construct(ComponentRegistry $registry, array $config = array())
    {
        parent::__construct($registry, $config);
        
        $this->client = new Client();
    }
    
    /**
     * ポケモン基本情報スクレイピング
     * @return $pokemons
     * - 図鑑No
     * - ポケモン名
     * - 属性1
     * - 属性2
     */
    public function collectBasicInfo()
    {
        $uri = self::POKEMON_WIKI . urlencode("ポケモン一覧");
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
    
    // 特性 + 種族値の紐付け
    public function addStrengthStatus()
    {
        // 
    }
    
}
