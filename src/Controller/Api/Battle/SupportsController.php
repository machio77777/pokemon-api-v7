<?php
namespace App\Controller\Api\Battle;

use App\Controller\Api\ApiController;
use App\Model\Battle\SupportsModel;

/**
 * SupportsController
 */
class SupportsController extends ApiController
{
    /**
     * 相性補完一覧取得
     * @return JSONレスポンス
     */
    public function getList()
    {
        $supports = $this->createSupportModel()->getList($this->request->getQuery('supportId'));
        if ($supports === false) {
            return $this->response503();
        }
        return $this->response200($supports);
    }
    
    /**
     * 相性補完登録
     * @return JSONレスポンス
     */
    public function add()
    {
        return $this->response200("相性補完登録");
    }
    
    /**
     * 相性補完取得
     * @param  string $supportId 相性補完ID
     * @return JSONレスポンス
     */
    public function update($supportId)
    {
        return $this->response200("相性補完更新{$supportId}");
    }
    
    /**
     * 相性補完削除
     * @param  string $supportId 相性補完ID
     * @return JSONレスポンス
     */
    public function delete($supportId)
    {
        return $this->response200("相性補完削除{$supportId}");
    }
    
    /**
     * SupportsModel生成
     * @return SupportModel
     */
    private function createSupportModel()
    {
        return new SupportsModel($this->logger);
    }
    
}
