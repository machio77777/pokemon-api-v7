<?php

namespace App\Model\Master;

use App\Model\BaseModel;
use \Exception;

class RankingModel extends BaseModel {

    /**
     * HP(ヒットポイント)種族値ランキング
     */
    public function getHpList()
    {
        $sql =<<< SQL
SELECT 
  zukan_no AS zukanNo,
  sub_no AS subNo,
  name AS name, 
  hp AS value 
FROM 
  POKEMONS 
ORDER BY hp DESC, zukanNo, subNo
SQL;
        try {
            return $this->con->execute($sql)->fetchAll('assoc');
        } catch(Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }

    /**
     * AT(物理攻撃)種族値ランキング
     * @return ポケモン一覧(AT昇順)
     */
    public function getAtList()
    {
        $sql =<<< SQL
SELECT 
  zukan_no AS zukanNo,
  sub_no AS subNo,
  name AS name, 
  at AS value 
FROM 
  POKEMONS 
ORDER BY at DESC, zukanNo, subNo
SQL;
        try {
            return $this->con->execute($sql)->fetchAll('assoc');
        } catch(Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }

    /**
     * DF(物理防御)種族値ランキング
     * @return ポケモン一覧(DF昇順)
     */
    public function getDfList()
    {
        $sql =<<< SQL
SELECT 
  zukan_no AS zukanNo,
  sub_no AS subNo,
  name AS name, 
  df AS value 
FROM 
  POKEMONS 
ORDER BY df DESC, zukanNo, subNo
SQL;
        try {
            return $this->con->execute($sql)->fetchAll('assoc');
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }

    /**
     * SA(特殊攻撃)種族値ランキング
     * @return ポケモン一覧(SA昇順)
     */
    public function getSaList()
    {
        $sql =<<< SQL
SELECT 
  zukan_no AS zukanNo,
  sub_no AS subNo,
  name AS name, 
  sa AS value 
FROM 
  POKEMONS 
ORDER BY sa DESC, zukanNo, subNo
SQL;
        try {
            return $this->con->execute($sql)->fetchAll('assoc');
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }

    /**
     * SD(特殊防御)種族値ランキング
     * @return ポケモン一覧(SD昇順)
     */
    public function getSdList()
    {
        $sql =<<< SQL
SELECT 
  zukan_no AS zukanNo,
  sub_no AS subNo,
  name AS name, 
  sd AS value 
FROM 
  POKEMONS 
ORDER BY sd DESC, zukanNo, subNo
SQL;
        try {
            return $this->con->execute($sql)->fetchAll('assoc');
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }

    /**
     * SP(素早さ)種族値ランキング
     * @return ポケモン一覧(SP昇順)
     */
    public function getSpList()
    {
        $sql =<<< SQL
SELECT 
  zukan_no AS zukanNo,
  sub_no AS subNo,
  name AS name, 
  sp AS value 
FROM 
  POKEMONS 
ORDER BY sp DESC, zukanNo, subNo
SQL;
        try {
            return $this->con->execute($sql)->fetchAll('assoc');
        } catch (Exception $e) {
            $this->logger->log($e->getMessage());
            return false;
        }
    }
}