<?php
namespace App\Controller\Api\Battle;

use App\Controller\Api\ApiController;
use App\Model\Battle\UtilsModel;

/**
 * SupportsController
 */
class UtilsController extends ApiController
{
    /**
     * 相性補完一覧取得
     * @return JSONレスポンス
     */
    public function getSuportsList()
    {
        $supports = $this->createUtilsModel()->getSuportsList();
        if ($supports === false) {
            return $this->response503();
        }
        return $this->response200($supports);
    }
    
    /**
     * UtilsModel生成
     * @return UtilsModels
     */
    private function createUtilsModel()
    {
        return new UtilsModel($this->logger);
    }
    
}
