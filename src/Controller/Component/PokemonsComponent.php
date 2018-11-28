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
    
    CONST POKEMON_KORYAKU = "https://yakkun.com/";
    
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
    
    /**
     * 種族値+特性スクレイピング
     * @param int $start 
     * @param int $end
     * @return $pokemons
     * - 図鑑No
     * - 種族値(HP)
     * - 種族値(AT)
     * - 種族値(DF)
     * - 種族値(SA)
     * - 種族値(SD)
     * - 種族値(SP)
     * - 特性1
     * - 特性2
     * - 夢特性
     */
    public function collectTribals(int $start, int $end)
    {
        if ($start <= 0 || ($start > $end)) {
            return false;
        }
        
        $pokemons = array();
        for ($i = $start; $i < $end; $i++) {
         
            $uri = self::POKEMON_KORYAKU . "sm/zukan/n{$i}";
            $crawler = $this->client->request('GET', $uri);
            $pokemon = array();
            
            $tribals = $crawler->filter('table.center td.left')->each(function($element){
                return $element->text();
            });
            
            // 改行無しのスペース(&nbsp;)削除
            $pokemon['no'] = $i;
            $pokemon['hp'] = trim($tribals[0], chr(0xC2).chr(0xA0));
            $pokemon['at'] = trim($tribals[1], chr(0xC2).chr(0xA0));
            $pokemon['df'] = trim($tribals[2], chr(0xC2).chr(0xA0));
            $pokemon['sa'] = trim($tribals[3], chr(0xC2).chr(0xA0));
            $pokemon['sd'] = trim($tribals[4], chr(0xC2).chr(0xA0));
            $pokemon['sp'] = trim($tribals[5], chr(0xC2).chr(0xA0));
            
            // 特性
            $qualities = $crawler->filter('table.center td.c1')->each(function($element){
                return $element->text();
            });
            
            // 特性1
            if (isset($qualities[29])) {
                $pokemon['quality_id1'] = trim($qualities[29]);
            } else {
                $pokemon['quality_id1'] = "";
            }
            
            // 特性2 or 夢特性
            if (isset($qualities[30])) {
                if (strpos($qualities[30],'*') !== false) {
                    $pokemon['quality_id2'] = "";
                    $pokemon['dream_quality'] = str_replace('*', '', trim($qualities[30]));
                } else {
                    $pokemon['quality_id2'] = trim($qualities[30]);
                    $pokemon['dream_quality'] = "";
                }
            } else {
                $pokemon['quality_id2'] = "";
                $pokemon['dream_quality'] = "";
            }
            
            // 夢特性
            if (isset($qualities[31])) {
                $pokemon['dream_quality'] = str_replace('*', '', trim($qualities[31]));
            }
            
            $pokemons[] = $pokemon;
        }
        return $pokemons;
    }
    
    /**
     * 覚える技スクレイピング
     * @param  int   $start
     * @param  int   $end
     * @return array $pokemons
     */
    public function collectSkillsByPokemon(int $start, int $end)
    {
        if ($start <= 0 || ($start > $end)) {
            return false;
        }
        
        $pokemons = [];
        for ($i = $start; $i < $end; $i++) {
            $uri = self::POKEMON_KORYAKU . "sm/zukan/n{$i}";
            $crawler = $this->client->request('GET', $uri);
            $elements = $crawler->filter('tr.move_main_row td.move_name_cell')->each(function($element){
                if (strpos($element->text(), '[') !== false) {
                    return explode('[', $element->text())[0];
                } else {
                    return str_replace(['New!', 'USUM', 'SM'], '', $element->text());
                }
            });
            $skills = array_unique($elements);
            $pokemons[$i] = $skills;
        }
        return $pokemons;
    }
    
}
