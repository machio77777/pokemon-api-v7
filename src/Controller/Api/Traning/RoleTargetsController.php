<?php
namespace App\Controller\Api\Traning;

use App\Controller\Api\ApiController;

/**
 * RoleTargetsController
 */
class RoleTargetsController extends ApiController
{
    /**
     * 役割対象一覧取得
     * @param  String $zukanNo 図鑑No
     * @param  String $subNo   明細No
     * @return JSONレスポンス
     */
    public function getList($zukanNo, $subNo)
    {
        return $this->response200("役割対象一覧取得{$zukanNo}/{$subNo}");
    }
    
    /**
     * 役割対象登録
     * @param  String $zukanNo 図鑑No
     * @param  String $subNo   明細No
     * @return JSONレスポンス
     */
    public function add($zukanNo, $subNo)
    {
        return $this->response200("役割対象登録{$zukanNo}/{$subNo}");
    }
    
    /**
     * 役割対象更新
     * @param  String $zukanNo  図鑑No
     * @param  String $subNo    明細No
     * @param  String $targetId 役割対象ID
     * @return JSONレスポンス
     */
    public function update($zukanNo, $subNo, $targetId)
    {
        return $this->response200("役割対象更新{$zukanNo}/{$subNo}/{$targetId}");
    }
    
    /**
     * 役割対象削除
     * @param  String $zukanNo  図鑑No
     * @param  String $subNo    明細No
     * @param  String $targetId 役割対象ID
     * @return JSONレスポンス
     */
    public function delete($zukanNo, $subNo, $targetId)
    {
        return $this->response200("役割対象削除{$zukanNo}/{$subNo}/{$targetId}");
    }
    
    /**
     * RoleTargetsModel生成
     * @return SupportModel
     */
    private function createRoleTargetsModel()
    {
        //return new RoleTargetsModel($this->logger);
    }
    
}
