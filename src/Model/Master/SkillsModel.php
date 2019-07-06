<?php

namespace App\Model\Master;

use App\Model\BaseModel;
use \Exception;

class SkillsModel extends BaseModel {
    
    /**
     * 技一覧取得
     * @param  $type 属性
     * @return 技一覧
     */
    public function getList($type)
    {
        $sql = <<< SQL
SELECT 
  sk.skill_id AS skillId,
  sk.skill_name AS skillName,
  ty.type_id AS typeId,
  ty.type_name1 AS typeName,
  sk.power AS power,
  sk.effect AS effect 
FROM 
  SKILLS sk  
INNER JOIN TYPES ty ON sk.type_id = ty.type_id 

SQL;
        $params = [];
        if ($type !== null && $type !== '') {
          $params['type'] = $type;
          $sql .= ' WHERE sk.type_id =:type';
        }
        $sql .= ' ORDER BY skill_id ';
        try {
            return $this->con->execute($sql, $params)->fetchAll('assoc');
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }
    
    /**
     * 技取得
     * @param  integer $skillId 技ID
     * @return 技
     */
    public function get($skillId)
    {
        $sql = <<< SQL
SELECT 
  sk.skill_id AS skillId,
  sk.skill_name AS skillName,
  ty.type_name1 AS typeName,
  sk.power AS power,
  sk.zpower AS zpower,
  sk.pp AS pp,
  sk.classification AS classification,
  sk.accuracy AS accuracy,
  sk.target AS target,
  sk.effect AS effect,
  sk.direct_attack AS directAttack,
  sk.mamoru AS mamoru 
FROM 
  SKILLS sk 
INNER JOIN TYPES ty ON sk.type_id = ty.type_id 
WHERE 
  sk.skill_id =:skillId 
ORDER BY sk.skill_id
SQL;
        try {
            $skill = $this->con->execute($sql, ['skillId' => $skillId])->fetchAll('assoc');
            if (count($skill) > 0) {
                return $skill[0];
            } else {
                return null;
            }
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }

    /**
     * 技に紐づくポケモン一覧取得
     * @param  integer $skillId 技ID
     * @return ポケモン一覧
     */
    public function getPokemons($skillId)
    {
        $sql = <<< SQL
SELECT 
  po.zukan_no AS zukanNo,
  po.sub_no AS subNo,
  po.name AS name  
FROM 
  POKEMONS po 
INNER JOIN TRICKS tr ON po.zukan_no = tr.zukan_no 
AND po.sub_no = tr.sub_no 
WHERE 
  tr.skill_id =:skillId
SQL;
        try {
            return $this->con->execute($sql, ['skillId' => $skillId])->fetchAll('assoc');
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }
}
