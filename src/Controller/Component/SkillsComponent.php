<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Goutte\Client;

/**
 * Skillsコンポーネント
 */
class SkillsComponent extends Component
{
    CONST POKEMON_KORYAKU = "https://yakkun.com/";
    
    protected $_defaultConfig = [];
    
    private $client;
    
    public function __construct(ComponentRegistry $registry, array $config = array())
    {
        parent::__construct($registry, $config);
        
        $this->client = new Client();
    }
    
    /**
     * 技スクレイピング
     * @return $skills
     * - 名前[0]
     * - 属性[1]
     * - 分類(物理/特殊/変化)[2]
     * - 威力[3]
     * - Z技[4]
     * - 命中[5]
     * - PP[6]
     * - 直接[7]
     * - 守る[8]
     * - 対象[9]
     * - 効果[10]
     */
    public function collectSkills()
    {
        $skills = array();
        
        /**
         * $i : c1(あ行) - c9(わ行)
         */
        for ($i = 0; $i < 10; $i++) {
            
            $uri = self::POKEMON_KORYAKU . 'sm/move_list.htm?c=' . $i;
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
                
                if (trim($elements[$j]) === '-') {
                    $skill[] = 0;
                } else {
                    $skill[] = trim($elements[$j]);
                }
            
                $isLast = ($j === ($max - 1));
                if ($isLast) {
                    $skills[] = $skill;
                }
            }
        }
        return $skills;
    }
}
