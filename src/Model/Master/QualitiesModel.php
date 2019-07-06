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
  quality_name AS qualityName,
  effect AS effect 
FROM 
  QUALITIES 
ORDER BY quality_id
SQL;
        try {
            return $this->con->execute($sql)->fetchAll('assoc');
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }
    
    /**
     * 特性取得
     * @param  integer $qualityId 特性ID
     * @return 特性
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
            $this->logger->log($e->getMessage());
            return false;
        }
    }

    /**
     * 特性に紐づくポケモン一覧取得
     * @param  string $qualityId 特性ID
     * @return ポケモン一覧
     */
    public function getPokemons($qualityId)
    {
        $sql = <<< SQL
SELECT 
  po.zukan_no AS zukanNo,
  po.sub_no AS subNo,
  po.name AS name  
FROM 
  POKEMONS po 
WHERE 
   po.quality_id1 =:qualityId
OR po.quality_id2 =:qualityId
OR po.dream_quality_id =:qualityId
SQL;
        try {
            return $this->con->execute($sql, ['qualityId' => $qualityId])->fetchAll('assoc');
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }
}
