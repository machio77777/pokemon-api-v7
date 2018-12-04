<?php

namespace App\Model\Battle;

use App\Model\BaseModel;
use \Exception;

class RoleTargetsModel extends BaseModel {
    
    /**
     * 役割対象一覧取得
     * @return 技一覧
     */
    public function getList($zukanNo, $subNo)
    {
        $sql = <<< SQL
SELECT 
  rt.target_id AS targetId,
  rt.target_zukan_no AS zukanNo,
  p.name AS name 
FROM 
  ROLETARGETS rt 
INNER JOIN POKEMONS p ON p.zukan_no = rt.target_zukan_no 
AND p.sub_no = rt.sub_no AND p.delete_flg=0 
WHERE 
    rt.zukan_no=:zukanNo 
AND rt.sub_no=:subNo 
AND rt.delete_flg=0 
SQL;
        try {
            return $this->con->execute($sql, ['zukanNo' => $zukanNo, 'subNo' => $subNo])->fetchAll('assoc');
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }
    
    /**
     * 役割対象登録
     * @param  array $roleTarget
     * @return boolean
     */
    public function add($roleTarget)
    {
        $sql = <<< SQL
INSERT ROLETARGETS 
(
  target_id,
  zukan_no,
  sub_no,
  target_zukan_no,
  target_sub_no
) VALUES (
  1,
  :zukanNo,
  :subNo,
  :targetZukanNo,
  :targetSubNo
)
SQL;
        try {
            $this->con->begin();
            $cnt = $this->con->execute($sql, $roleTarget)->count();
            $this->con->commit();
            return $cnt;
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }
    
    /**
     * 役割対象更新
     * @param  array $roleTarget
     * @return boolean
     */
    public function update($roleTarget)
    {
        $sql = <<< SQL
UPDATE ROLETARGETS 
SET 
  zukan_no=:zukanNo,
  sub_no=:subNo,
  target_zukan_no=:targetZukanNo,
  target_sub_no=:targetSubNo 
WHERE 
    target_id=:targetId  
AND delete_flg=0
SQL;
        try {
            $this->con->begin();
            $cnt = $this->con->execute($sql, $roleTarget)->count();
            $this->con->commit();
            return $cnt;
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }
    
    /**
     * 役割対象削除
     * @param  integer $targetId 対象ID
     * @return boolean
     */
    public function delete($targetId)
    {
        $sql = <<< SQL
UPDATE ROLETARGETS 
SET 
  delete_flg=1  
WHERE 
    target_id=:targetId  
AND delete_flg=0
SQL;
        try {
            $this->con->begin();
            $cnt = $this->con->execute($sql, ['targetId' => $targetId])->count();
            $this->con->commit();
            return $cnt;
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }
}
