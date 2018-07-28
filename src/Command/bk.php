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
     * - 名前 / 属性 / 特性 / 種族値 / 覚える技
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {        
        /**
        $crawler = $this->client->request('GET', 'https://wiki.xn--rckteqa2e.com/wiki/%E3%83%A9%E3%83%B3%E3%83%89%E3%83%AD%E3%82%B9');
        
        $basicData = array();
        
        // 名前
        $names = $crawler->filter('#content h1')->each(function($element){
            return $element->text();
        });
        if (count($names) !== 0) {
            $basicData['name'] = $names[0];
        }
        **/
        /**
         * 属性 / 特性(隠れ含む)
         * [TODO]
         * - メガ進化前後で属性が異なるケースがあるので考慮要
         * - 隠れ特性もあるので考慮要
         */
        /**
        $types = $crawler->filter('.blueinfobox tr td a')->each(function($element){
            return $element->text();
        });
        **/
        
        /**
         * 種族値
         * [TODO]
         * - 世代別に種族値が異なるケースやメガ進化ポケモンの取得に考慮要
         */
        /**
        $tribalValues = $crawler->filter('table.bluetable .r')->each(function($element){
            return $element->text();
        });
        if (count($tribalValues) > 6) {
            $tribalValue = array(
                'HP' => $tribalValues[0],
                'AK' => $tribalValues[1],
                'DF' => $tribalValues[2],
                'SA' => $tribalValues[3],
                'SD' => $tribalValues[4],
                'SP' => $tribalValues[5],
                'SUM' => $tribalValues[6]
            );
            $basicData['tribalValue'] = $tribalValue;
            
            if (count($tribalValues) === 14) {
                $tribalValue2 = array(
                    'HP' => $tribalValues[7],
                    'AK' => $tribalValues[8],
                    'DF' => $tribalValues[9],
                    'SA' => $tribalValues[10],
                    'SD' => $tribalValues[11],
                    'SP' => $tribalValues[12],
                    'SUM' => $tribalValues[13]
                );
                $basicData['tribalValue2'] = $tribalValue2;
            }   
        }
        **/
        /**
         * 覚える技(HTML構造上、取得しづらいので他サイトから拝借するか...)
         */
        /**
        $skills = $crawler->filter('table.bluetable tr')->each(function($element){
            return $element->text();
        });
        
        var_dump($skills[22]);
        **/
        
    }
}
