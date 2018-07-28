<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * Commonコンポーネントクラス
 */
class CommonComponent extends Component
{
    protected $_defaultConfig = [];
    
    private $types;
    
    public function __construct(ComponentRegistry $registry, array $config = array())
    {
        parent::__construct($registry, $config);
        
        $this->initTypes();
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
