<?php

namespace App\Model\Battle;

use App\Model\BaseModel;
use \Exception;

class SoldiersModel extends BaseModel {
    
    /**
     * 対戦用育成済みポケモン一覧取得
     * @param string $zukanNo 図鑑No
     * @param string $subNo   明細No
     * @return 技一覧
     */
    public function getList($zukanNo, $subNo)
    {
        $sql = <<< SQL
SELECT 
  pb.zukan_no AS zukanNo,
  pb.sub_no AS subNo,
  pb.soldier_id AS soldierId 
FROM 
  PBATTLES pb 
WHERE 
    pb.zukan_no=:zukanNo 
AND pb.sub_no=:subNo 
AND pb.delete_flg=0
SQL;
        try {
            return $this->con->execute($sql, ['zukanNo' => $zukanNo, 'subNo' => $subNo])->fetchAll('assoc');
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
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
     * @param  string  $zukanNo   図鑑No
     * @param  string  $subNo     明細No
     * @param  integer $soldierId 育成済みID
     * @return 技
     */
    public function get($zukanNo, $subNo, $soldierId)
    {
        $sql = <<< SQL
SELECT 
  pb.zukan_no AS zukanNo,
  pb.sub_no AS subNo,
  pb.soldier_id AS soldierId,
  p.name AS name, 
  pb.personality AS personality,
  pb.quality_id AS qualityId,
  pb.skill_id1 AS skillId1,
  sk1.skill_name AS skillName1,
  pb.skill_id2 AS skillId2,
  sk2.skill_name AS skillName2,
  pb.skill_id3 AS skillId3,
  sk3.skill_name AS skillName3,
  pb.skill_id4 AS skillId4,
  sk4.skill_name AS skillName4,
  pb.ehp AS ehp,
  pb.eat AS eat,
  pb.edf AS edf,
  pb.esa AS esa,
  pb.esd AS esd,
  pb.esp AS esp,
  pb.ahp AS ahp,
  pb.aat AS aat,
  pb.adf AS adf,
  pb.asa AS asa,
  pb.asd AS asd,
  pb.asp AS asp 
FROM 
  PBATTLES pb 
INNER JOIN POKEMONS p ON p.zukan_no = pb.zukan_no AND p.sub_no = pb.sub_no 
INNER JOIN SKILLS sk1 ON sk1.skill_id = pb.skill_id1 AND sk1.delete_flg=0
INNER JOIN SKILLS sk2 ON sk2.skill_id = pb.skill_id2 AND sk2.delete_flg=0 
INNER JOIN SKILLS sk3 ON sk3.skill_id = pb.skill_id3 AND sk3.delete_flg=0
INNER JOIN SKILLS sk4 ON sk4.skill_id = pb.skill_id4 AND sk4.delete_flg=0
WHERE 
    pb.zukan_no=:zukanNo 
AND pb.sub_no=:subNo 
AND pb.soldier_id=:soldierId  
AND pb.delete_flg=0
SQL;
        try {
            $soldier = $this->con->execute($sql, ['zukanNo' => $zukanNo, 'subNo' => $subNo, 'soldierId' => $soldierId])->fetchAll('assoc');
            if (count($soldier) > 0) {
                return $soldier[0];
            } else {
                return [];
            }
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
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
