<?php
namespace App\Controller\Api\Master;

use App\Controller\Api\ApiController;
use App\Model\Master\UtilsModel;

/**
 * UtilsController
 */
class UtilsController extends ApiController
{
    /**
     * 性格一覧取得
     * @return JSONレスポンス
     */
    public function getCharList()
    {
        $chars = $this->createUtilsModel()->getCharList();
        if ($chars === false) {
            return $this->response503();
        }
        return $this->response200($chars);
    }

    /**
     * 属性一覧取得
     * @return JSONレスポンス
     */
    public function getTypeList()
    {
        $types = $this->createUtilsModel()->getTypeList();
        if ($types === false) {
            return $this->response503();
        }
        return $this->response200($types);
    }
    
    /**
     * UtilsModel生成
     * @return UtilsModel
     */
    private function createUtilsModel()
    {
        return new UtilsModel($this->logger);
    }
    
}
