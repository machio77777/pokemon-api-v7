<?php

namespace App\Model\Battle;

use App\Model\BaseModel;
use \Exception;

class SupportsModel extends BaseModel {
    
    /**
     * 相性補完一覧取得
     * @return 技一覧
     */
    public function getList()
    {
        return [];
    }
    
    /**
     * 相性補完登録
     * @param  array $support
     * @return boolean
     */
    public function add($support)
    {
        return true;
    }
    
    /**
     * 相性補完取得
     * @param  integer $supportId 相性補完ID
     * @return 技
     */
    public function get($supportId)
    {
        return [];
    }
    
    /**
     * 相性補完更新
     * @param  array $support
     * @return boolean
     */
    public function update($support)
    {
        return true;
    }
    
    /**
     * 相性補完削除
     * @param  integer $supportId 相性補完ID
     * @return boolean
     */
    public function delete($supportId)
    {
        return true;
    }
}
