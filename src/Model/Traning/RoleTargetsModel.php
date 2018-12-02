<?php

namespace App\Model\Traning;

use App\Model\BaseModel;
use \Exception;

class RoleTargetsModel extends BaseModel {
    
    /**
     * 役割対象一覧取得
     * @return 技一覧
     */
    public function getList()
    {
        return [];
    }
    
    /**
     * 役割対象登録
     * @param  array $roleTarget
     * @return boolean
     */
    public function add($roleTarget)
    {
        return true;
    }
    
    /**
     * 役割対象更新
     * @param  array $roleTarget
     * @return boolean
     */
    public function update($roleTarget)
    {
        return true;
    }
    
    /**
     * 役割対象削除
     * @param  integer $targetId 対象ID
     * @return boolean
     */
    public function delete($targetId)
    {
        return true;
    }
}
