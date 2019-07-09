<?php

namespace App\Model\Master;

use App\Model\BaseModel;
use \Exception;

class UtilsModel extends BaseModel {
    
    /**
     * 性格一覧取得
     * @return 性格一覧
     */
    public function getCharList()
    {
        $sql = <<< SQL
SELECT 
  char_id AS charId,
  name AS name,
  at AS at,
  df AS df,
  sa AS sa,
  sd AS sd,
  sp AS sp 
FROM 
  CHARMATRIX 
ORDER BY char_id
SQL;
        try {
            return $this->con->execute($sql)->fetchAll('assoc');
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }

    /**
     * 属性一覧取得
     */
    public function getTypeList()
    {
        $sql =<<< SQL
SELECT 
  type_id AS typeId,
  type_name1 AS typeName1,
  type_name2 AS typeName2 
FROM 
  TYPES 
ORDER BY type_id
SQL;
        try {
            return $this->con->execute($sql)->fetchAll('assoc');
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }
}
