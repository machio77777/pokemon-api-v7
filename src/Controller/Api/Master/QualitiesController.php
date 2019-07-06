<?php
namespace App\Controller\Api\Master;

use App\Controller\Api\ApiController;
use App\Model\Master\QualitiesModel;

/**
 * QualitiesController
 */
class QualitiesController extends ApiController
{
    /**
     * 特性一覧取得
     * @return JSONレスポンス
     */
    public function getList()
    {
        $qualities = $this->createQualitiesModel()->getList();
        if ($qualities === false) {
            return $this->response503();
        }
        return $this->response200($qualities);
    }
    
    /**
     * 特性取得
     * @param  string $qualityId 特性ID
     * @return JSONレスポンス
     */
    public function get($qualityId)
    {
        $quality = $this->createQualitiesModel()->get($qualityId);
        if ($quality === false) {
            return $this->response503();
        }
        return $this->response200($quality);
    }

    /**
     * 特性に紐づくポケモン一覧取得
     * @param  string $qualityId 特性ID
     * @return JSONレスポンス
     */
    public function getPokemons($qualityId)
    {
        $pokemons = $this->createQualitiesModel()->getPokemons($qualityId);
        if ($pokemons === false) {
            return $this->response503();
        }
        return $this->response200($pokemons);
    }
    
    /**
     * QualitiesModel生成
     * @return QualitiesModel
     */
    private function createQualitiesModel()
    {
        return new QualitiesModel($this->logger);
    }
    
}
