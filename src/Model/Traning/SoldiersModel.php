<?php

namespace App\Model\Traning;

use App\Model\BaseModel;
use \Exception;

class SoldiersModel extends BaseModel {
    
    /**
     * 対戦用育成済みポケモン一覧取得
     * @return 技一覧
     */
    public function getList()
    {
        return [];
    }
    
    /**
     * 対戦用育成済みポケモン登録
     * @param  array $soldiers
     * @return boolean
     */
    public function add($soldiers)
    {
        return true;
    }
    
    /**
     * 対戦用育成済みポケモン取得
     * @param  integer $soldierId 育成済みID
     * @return 技
     */
    public function get($soldierId)
    {
        return [];
    }
    
    /**
     * 対戦用育成済みポケモン更新
     * @param  array $soldiers
     * @return boolean
     */
    public function update($soldiers)
    {
        return true;
    }
    
    /**
     * 対戦用育成済みポケモン削除
     * @param  integer $soldierId 育成済みID
     * @return boolean
     */
    public function delete($soldierId)
    {
        return true;
    }
}
