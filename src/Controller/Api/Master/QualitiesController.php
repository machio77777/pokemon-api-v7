<?php
namespace App\Controller\Api\Master;

use App\Controller\Api\ApiController;

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
        return $this->response200("json api qualities get");
    }
    
    /**
     * 特性取得
     * @param  string $qualityId 特性ID
     * @return JSONレスポンス
     */
    public function get($qualityId)
    {
        return $this->response200("json api quality get");
    }
    
}
