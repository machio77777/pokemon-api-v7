<?php
namespace App\Model\Table;

use Cake\Validation\Validator;
use Cake\ORM\Table;

/**
 * PbattlesTable
 */
class PbattlesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('PBATTLES');
        $this->setPrimaryKey('id');
    }
    
    /**
     * 共通バリデーション
     * @param  Validator $validator
     * @param Validator $validator
     */
    public function validationCommon(Validator $validator)
    {
        return $validator;
    }
    
    /**
     * バリデーション - 登録
     * @param  Validator $validator
     * @return Validator
     */
    public function validationAdd(Validator $validator)
    {
        return $validator;
    }
    
    /**
     * バリデーション - 更新
     * @param  Validator $validator
     * @return Validator
     */
    public function validationUpdate(Validator $validator)
    {
        return $validator;
    }
}
