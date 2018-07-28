<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Goutte\Client;

/**
 * Qualitiesコンポーネントクラス
 */
class QualitiesComponent extends Component
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
     * 特性スクレイピング
     * @return $qualities
     * - No
     * - 技名
     * - 効果
     */
    public function collectQualities()
    {
        $uri = self::POKEMON_WIKI . urlencode("とくせい一覧");
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
}
