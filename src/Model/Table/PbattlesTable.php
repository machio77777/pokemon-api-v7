<?php
namespace App\Model\Table;

use Cake\Validation\Validator;
use Cake\ORM\Table;
use App\Common\ApiMessage;

/**
 * PbattlesTable
 */
class PbattlesTable extends Table
{
    CONST KEY_PERSONALITY = 'personality';
    CONST KEY_QUALITYID   = 'qualityId';
    CONST KEY_SKILLID1    = 'skillId1';
    CONST KEY_SKILLID2    = 'skillId2';
    CONST KEY_SKILLID3    = 'skillId3';
    CONST KEY_SKILLID4    = 'skillId4';
    CONST KEY_EHP         = 'ehp';
    CONST KEY_EAT         = 'eat';
    CONST KEY_EDF         = 'edf';
    CONST KEY_ESA         = 'esa';
    CONST KEY_ESD         = 'esd';
    CONST KEY_ESP         = 'esp';
    CONST KEY_AHP         = 'ahp';
    CONST KEY_AAT         = 'aat';
    CONST KEY_ADF         = 'adf';
    CONST KEY_ASA         = 'asa';
    CONST KEY_ASD         = 'asd';
    CONST KEY_ASP         = 'asp';
    
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
        $validator // 性格
            ->requirePresence(self::KEY_PERSONALITY, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_PERSONALITY, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 特性
            ->requirePresence(self::KEY_QUALITYID, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_QUALITYID, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 技1
            ->requirePresence(self::KEY_SKILLID1, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_SKILLID1, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 技2
            ->requirePresence(self::KEY_SKILLID2, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_SKILLID2, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 技3
            ->requirePresence(self::KEY_SKILLID3, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_SKILLID3, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 技4
            ->requirePresence(self::KEY_SKILLID4, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_SKILLID4, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 努力値-HP
            ->requirePresence(self::KEY_EHP, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_EHP, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 努力値-AT
            ->requirePresence(self::KEY_EAT, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_EAT, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 努力値-DF
            ->requirePresence(self::KEY_EDF, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_EDF, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 努力値-SA
            ->requirePresence(self::KEY_ESA, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_ESA, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 努力値-SD
            ->requirePresence(self::KEY_ESD, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_ESD, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 努力値-SP
            ->requirePresence(self::KEY_ESP, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_ESP, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 実数値-HP
            ->requirePresence(self::KEY_AHP, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_AHP, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 実数値-AT
            ->requirePresence(self::KEY_AAT, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_AAT, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 実数値-DF
            ->requirePresence(self::KEY_ADF, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_ADF, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 実数値-SA
            ->requirePresence(self::KEY_ASA, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_ASA, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 実数値-SD
            ->requirePresence(self::KEY_ASD, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_ASD, ApiMessage::VALID_ERROR_MSG_1);
        
        $validator // 実数値-SP
            ->requirePresence(self::KEY_ASP, true, ApiMessage::VALID_ERROR_MSG_0)
            ->notEmpty(self::KEY_ASP, ApiMessage::VALID_ERROR_MSG_1);
        
        return $validator;
    }
    
    /**
     * バリデーション - 登録
     * @param  Validator $validator
     * @return Validator
     */
    public function validationAdd(Validator $validator)
    {
        return $this->validationCommon($validator);
    }
    
    /**
     * バリデーション - 更新
     * @param  Validator $validator
     * @return Validator
     */
    public function validationUpdate(Validator $validator)
    {
        return $this->validationCommon($validator);
    }
}
