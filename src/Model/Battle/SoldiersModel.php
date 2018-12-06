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
     * @param  array $soldier
     * @return boolean
     */
    public function add($soldier)
    {
        $sql = <<< SQL
INSERT INTO PBATTLES 
(
  soldier_id,
  zukan_no,
  sub_no,
  personality,
  quality_id,
  skill_id1,
  skill_id2,
  skill_id3,
  skill_id4,
  ehp,
  eat,
  edf,
  esa,
  esd,
  esp,
  ahp,
  aat,
  adf,
  asa,
  asd,
  asp
) 
SELECT
  CONCAT('SOL',LPAD(COALESCE(MAX(SUBSTRING(SOLDIER_ID,4,7)),0)+1,7,0)),
  :zukanNo,
  :subNo,
  :personality,
  :qualityId,
  :skillId1,
  :skillId2,
  :skillId3,
  :skillId4,
  :ehp,
  :eat,
  :edf,
  :esa,
  :esd,
  :esp,
  :ahp,
  :aat,
  :adf,
  :asa,
  :asd,
  :asp 
FROM
  PBATTLES 
WHERE 
    zukan_no=:zukanNo 
AND sub_no=:subNo 
AND delete_flg=0
SQL;
        try {
            $this->con->begin();
            if ($this->con->execute($sql, $soldier)->count() === 0) {
                $this->con->rollback();
                return 0;
            }
            $this->con->commit();
            return true;
        } catch (Exception $e) {
            $this->con->rollback();
            $this->logger->log($e->getMessage());
            return false;
        }
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
     * @param  array $soldier
     * @return boolean
     */
    public function update($soldier)
    {
        $sql = <<< SQL
UPDATE PBATTLES 
SET 
  zukan_no=:zukanNo,
  sub_no=:subNo,
  personality=:personality,
  quality_id=:qualityId,
  skill_id1=:skillId1,
  skill_id2=:skillId2,
  skill_id3=:skillId3,
  skill_id4=:skillId4,
  ehp=:ehp,
  eat=:eat,
  edf=:edf,
  esa=:esa,
  esd=:esd,
  esp=:esp,
  ahp=:ahp,
  aat=:aat,
  adf=:adf,
  asa=:asa,
  asd=:asd,
  asp=:asp 
WHERE 
    soldier_id=:soldierId 
AND delete_flg=0
SQL;
        try {
            $this->con->begin();
            if ($this->con->execute($sql, $soldier)->count() === 0) {
                $this->con->rollback();
                return 0;
            }
            $this->con->commit();
            return true;
        } catch (Exception $e) {
            $this->con->rollback();
            $this->logger->log($e->getMessage());
            return false;
        }
    }
    
    /**
     * 対戦用育成済みポケモン削除
     * @param  integer $soldierId 育成済みID
     * @return boolean
     */
    public function delete($soldierId)
    {
        $sql = <<< SQL
UPDATE PBATTLES 
SET 
  delete_flg=1 
WHERE 
    soldier_id=:soldierId 
AND delete_flg=0
SQL;
        try {
            $this->con->begin();
            if ($this->con->execute($sql, ['soldierId' => $soldierId])->count() === 0) {
                $this->con->rollback();
                return 0;
            }
            $this->con->commit();
            return true;
        } catch (Exception $e) {
            $this->con->rollback();
            $this->logger->log($e->getMessage());
            return false;
        }
    }
}
