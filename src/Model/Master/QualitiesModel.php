<?php

namespace App\Model\Master;

use App\Model\BaseModel;
use \Exception;

class QualitiesModel extends BaseModel {
    
    /**
     * 特性一覧取得
     * @return 特性一覧
     */
    public function getList()
    {
        $sql = <<< SQL
SELECT 
  quality_id AS qualityId,
  quality_name AS qualityName 
FROM 
  QUALITIES 
ORDER BY quality_id
SQL;
        try {
            return $this->con->execute($sql)->fetchAll('assoc');
        } catch (Exception $e) {
            return false;
        }
    }
    
    /**
     * 特性取得
     * @param  integer $qualityId 特性ID
     * @return ポケモン図鑑
     */
    public function get($qualityId)
    {
        $sql = <<< SQL
SELECT 
  quality_id AS qualityId,
  quality_name AS qualityName,
  effect AS effect  
FROM 
  QUALITIES 
WHERE 
  quality_id =:qualityId
ORDER BY quality_id
SQL;
        try {
            $quality = $this->con->execute($sql, ['qualityId' => $qualityId])->fetchAll('assoc');
            if (count($quality) > 0) {
                return $quality[0];
            } else {
                return null;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}
