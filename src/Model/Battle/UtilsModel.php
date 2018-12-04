<?php

namespace App\Model\Battle;

use App\Model\BaseModel;
use \Exception;

class SupportsModel extends BaseModel {
    
    /**
     * 相性補完一覧取得
     * @param  string $supportId 相性補完ID
     * @return 技一覧
     */
    public function getList($supportId = null)
    {
        $sql = <<< SQL
SELECT 
  cb.support_id AS supportId,
  p1.name AS name1,
  p2.name AS name2  
FROM 
  COMPATIBILITIES cb  
INNER JOIN POKEMONS p1 ON p1.zukan_no = target1_zukan_no  
AND p1.sub_no = target1_sub_no AND p1.delete_flg = 0 
INNER JOIN POKEMONS p2 ON p2.zukan_no = target2_zukan_no  
AND p2.sub_no = target2_sub_no AND p2.delete_flg = 0 
WHERE  
  cb.delete_flg=0
SQL;
        $keys = [];
        if ($supportId !== null && $supportId !== "") {
            $sql .= " AND cb.support_id=:supportId ";
            $keys['supportId'] = $supportId;
        }
        
        try {
            return $this->con->execute($sql, $keys)->fetchAll('assoc');
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
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
