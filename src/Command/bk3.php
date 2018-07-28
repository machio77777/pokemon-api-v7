<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Goutte\Client;

/**
 * ポケモン図鑑スクレイピング
 * (技データ)
 * - タイプ
 * - 威力
 * - PP
 * - 分類
 * - 命中率
 * - 対象
 * - 直接攻撃
 * - マジックコート
 * - オウムがえし
 * - まもる
 * - よこどり
 * - みがわり貫通
 * - 効果
 * - Z技
 */
class ScrapingSkillCommand extends Command
{
    public function initialize()
    {
        parent::initialize();
        $this->client = new Client();
    }
    
    public function buildOptionParser(ConsoleOptionParser $parser)
    {
        return parent::buildOptionParser($parser);
    }

    public function execute(Arguments $args, ConsoleIo $io)
    {
        $io->out("scraping start");
        
        $id = 788;
        $uri = "https://wiki.xn--rckteqa2e.com/wiki/" . urlencode("カプ・レヒレ");
        $crawler = $this->client->request('GET', $uri);
        
        $dataList = $crawler->filter('table.bluetable .r')->each(function($element){
            return $element->text();
        });
        
        $tribalValues = array();
        $tribalValue = array();
        
        if ($id <= 151) {
            for ($i = 0; $i < count($dataList); $i++) {
                if ($i === 6 || $i === 13) {
                    $tribalValues[] = $tribalValue;
                    $tribalValue = array();
                } else if ($i === count($dataList) - 1) {
                    $tribalValue[] = $dataList[$i];
                    $tribalValues[] = $tribalValue;
                }

                $tribalValue[] = $dataList[$i];
            }
        } else {
            for ($i = 0; $i < count($dataList); $i++) {
                if ($i % 7 === 0) {
                    $tribalValues[] = $tribalValue;
                    $tribalValue = array();
                } else if ($i === count($dataList) - 1) {
                    $tribalValue[] = $dataList[$i];
                    $tribalValues[] = $tribalValue;
                }
                $tribalValue[] = $dataList[$i];
            }
        }
        
        
        
        
        
        var_dump($tribalValues);
        
        $io->out("scraping end");
    }
}
