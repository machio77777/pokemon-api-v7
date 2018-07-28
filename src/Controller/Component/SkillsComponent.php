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
    public function collectSkills()
    {
        $skills = array();
        
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
                
                $skill[] = trim($elements[$j]);
            
                $isLast = ($j === ($max - 1));
                if ($isLast) {
                    $skills[] = $skill;
                }
            }
        }
        return $skills;
    }
}
