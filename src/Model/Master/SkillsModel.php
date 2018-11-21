<?php

namespace App\Model\Master;

use App\Model\BaseModel;
use \Exception;

class SkillsModel extends BaseModel {
    
    /**
     * 技一覧取得
     * @return 技一覧
     */
    public function getList()
    {
        $sql = <<< SQL
SELECT 
  skill_id AS skillId,
  skill_name AS skillName 
FROM 
  SKILLS 
ORDER BY skill_id
SQL;
        try {
            return $this->con->execute($sql)->fetchAll('assoc');
        } catch (Exception $e) {
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
            return false;
        }
    }
}
