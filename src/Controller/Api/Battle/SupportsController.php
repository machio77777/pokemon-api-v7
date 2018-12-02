<?php
namespace App\Controller\Api\Battle;

use App\Controller\Api\ApiController;

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
        return $this->response200("相性補完一覧取得");
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
     * @return JSONレスポンス
     */
    public function get()
    {
        return $this->response200("相性補完取得");
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
        //return new SupportsModel($this->logger);
    }
    
}
