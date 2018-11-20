<?php

namespace App\Model\Master;

use App\Model\BaseModel;
use \Exception;

class PokemonsModel extends BaseModel {
    
    /**
     * ポケモン図鑑一覧取得
     * @return ポケモン図鑑一覧
     */
    public function getList()
    {
        $sql = <<< SQL
SELECT 
  zukan_no AS zukanNo,
  sub_no AS subNo,
  name AS name 
FROM 
  POKEMONS 
WHERE 
  delete_flg = 0
ORDER BY zukan_no, sub_no
SQL;
        try {
            return $this->con->execute($sql)->fetchAll('assoc');
        } catch (Exception $e) {
            return false;
        }
    }
    
    /**
     * ポケモン図鑑取得
     * @param  integer $zukanNo 図鑑No
     * @param  integer $subNo   サブNo
     * @return ポケモン図鑑
     */
    public function get($zukanNo, $subNo)
    {
        $sql = <<< SQL
SELECT 
  zukan_no AS zukanNo,
  sub_no AS subNo,
  name AS name, 
  type_id1 AS type1,
  type_id2 AS type2,
  quality_id1 AS quality1,
  quality_id2 AS quality2,
  dream_quality_id AS dreamQuality,
  hp AS hp,
  at AS at,
  df AS df,
  sa AS sa,
  sd AS sd,
  sp AS sp, 
  mega_flg AS megaFlg 
FROM 
  POKEMONS 
WHERE 
    zukan_no =:zukanNo 
AND sub_no =:subNo 
AND delete_flg = 0 
ORDER BY zukan_no, sub_no
SQL;
        try {
            $pokemon = $this->con->execute($sql, ['zukanNo' => $zukanNo, 'subNo' => $subNo])->fetchAll('assoc');
            if (count($pokemon) > 0) {
                return $pokemon[0];
            } else {
                return null;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}
