<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Goutte\Client;

/**
 * ポケモン基本情報スクレイピング
 */
class PokemonCommand extends Command
{
    CONST BASE_URI = "https://wiki.xn--rckteqa2e.com/wiki/";
    
    CONST POKEMON_KORYAKU = "https://yakkun.com/";
    
    private $client;
    
    private $types;
    
    public function initialize()
    {
        parent::initialize();
        $this->client = new Client();
    }
    
    public function buildOptionParser(ConsoleOptionParser $parser)
    {
        return parent::buildOptionParser($parser);
    }
    
    /**
     * ポケモン基本情報収集
     * 
     * @param Arguments $args
     * @param ConsoleIo $io
     * 
     * レスポンス値
     * - 図鑑No
     * - ポケモン名
     * - 属性1
     * - 属性2
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $uri = self::POKEMON_KORYAKU . "sm/zukan/n1";
            $crawler = $this->client->request('GET', $uri);
            $pokemon = array();
            
            $skills = $crawler->filter('tr.move_main_row td a')->each(function($element) {
                return $element->text();
            });
            
            $isSkipval = "遺伝経路";
            foreach ($skills as $skill) {
                if ($isSkipval !== $skill) {
                    $pokemon[] = trim($skill);
                }
            }
        
        ob_start();
        $res = var_dump($pokemon);
        $ret = ob_get_contents();
        ob_end_clean();
        echo $ret;
        
    }
    
    /**
     * 属性変換
     * @param  string $typeNm
     * @return string 
     */
    private function convertType($typeNm)
    {
        if (array_key_exists($typeNm, $this->types)) {
            return $this->types[$typeNm];
        } else {
            return "";
        }
    }
}
