<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Goutte\Client;

/**
 * ポケモン図鑑スクレイピング
 * - データ拝借元:ポケモンWiki(https://wiki.xn--rckteqa2e.com)
 */
class ScrapingBasicCommand extends Command
{
    private $client;
    
    CONST BASE_URI = "https://wiki.xn--rckteqa2e.com/wiki/";
    
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
     * ポケモン基本データ取得
     * 
     * @param Arguments $args
     * @param ConsoleIo $io
     * 
     * レスポンス値
     * - id    : 図鑑ID
     * - name  : 名前
     * - type1 : 属性1
     * - type2 : 属性2(単一属性の場合はなし)
     */
    
    
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $io->out("scraping start");
        
        $uri = self::BASE_URI . urlencode("ポケモン一覧");
        $crawler = $this->client->request('GET', $uri);
        $element = $crawler->filter('table.bluetable tr td')->each(function($element){
            return $element->text();
        });
        
        $dataList = array();
        $data = array();
        $max = count($element);
        
        for ($i = 0; $i < $max; $i++) {
            
            if ($i !== 0 && ($i % 4 === 0)) {
                $dataList[] = $data;
                $data = array();
            }
            
            if (trim($element[$i]) !== "") {
                $data[] = $element[$i];
            }
            
            if ($i === ($max - 1)) {
                $dataList[] = $data;
            }
        }
        
        $pokemonList = array();
        foreach ($dataList as $data) {
            
            $pokemon = array();
            for ($i = 0; $i < count($data); $i++) {
                if ($i === 0) {
                    $pokemon['id'] = $data[$i];
                } else if ($i === 1) {
                    $pokemon['name'] = $data[$i];
                } else {
                    if (array_key_exists("type1", $pokemon)) {
                        $pokemon['type2'] = $data[$i];
                    } else {
                        $pokemon['type1'] = $data[$i];
                    }
                }
            }
            $pokemonList[] = $pokemon;
        }        
        $io->out("scraping end");
    }
}
