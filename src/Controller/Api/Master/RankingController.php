<?php
namespace App\Controller\Api\Master;

use App\Controller\Api\ApiController;
use App\Model\Master\RankingModel;

/**
 * RankingController
 */
class RankingController extends ApiController
{
    /**
     * ポケモン一覧取得(H種族値昇順)
     * @return JSONレスポンス
     */
    public function getHpList()
    {
        $pokemons = $this->createRankingModel()->getHpList();
        if ($pokemons === false) {
            return $this->response503();
        }
        return $this->response200($pokemons);
    }

    /**
     * ポケモン一覧取得(AT種族値昇順)
     * @return JSONレスポンス
     */
    public function getAtList()
    {
        $pokemons = $this->createRankingModel()->getAtList();
        if ($pokemons === false) {
            return $this->response503();
        }
        return $this->response200($pokemons);
    }

    /**
     * ポケモン一覧取得(DF種族値昇順)
     * @return JSONレスポンス
     */
    public function getDfList()
    {
        $pokemons = $this->createRankingModel()->getDfList();
        if ($pokemons === false) {
            return $this->response503();
        }
        return $this->response200($pokemons);
    }

    /**
     * ポケモン一覧取得(SA種族値昇順)
     * @return JSONレスポンス
     */
    public function getSaList()
    {
        $pokemons = $this->createRankingModel()->getSaList();
        if ($pokemons === false) {
            return $this->response503();
        }
        return $this->response200($pokemons);
    }

    /**
     * ポケモン一覧取得(SD種族値昇順)
     * @return JSONレスポンス
     */
    public function getSdList()
    {
        $pokemons = $this->createRankingModel()->getSdList();
        if ($pokemons === false) {
            return $this->response503();
        }
        return $this->response200($pokemons);
    }

    /**
     * ポケモン一覧取得(SP種族値昇順)
     * @return JSONレスポンス
     */
    public function getSpList()
    {
        $pokemons = $this->createRankingModel()->getSpList();
        if ($pokemons === false) {
            return $this->response503();
        }
        return $this->response200($pokemons);
    }

    /**
     * RankingModel生成
     * @return RankingModel
     */
    private function createRankingModel()
    {
        return new RankingModel($this->logger);
    }
    
}
