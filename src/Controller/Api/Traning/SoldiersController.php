<?php
namespace App\Controller\Api\Traning;

use App\Controller\Api\ApiController;

/**
 * SoldiersController
 */
class SoldiersController extends ApiController
{
    /**
     * 対戦用育成済みポケモン一覧取得
     * @param  String $zukanNo 図鑑No
     * @param  String $subNo   明細No
     * @return JSONレスポンス
     */
    public function getList($zukanNo, $subNo)
    {
        return $this->response200("対戦用育成済みポケモン一覧取得{$zukanNo}/{$subNo}");
    }
    
    /**
     * 対戦用育成済みポケモン登録
     * @param  String $zukanNo 図鑑No
     * @param  String $subNo   明細No
     * @return JSONレスポンス
     */
    public function add($zukanNo, $subNo)
    {
        return $this->response200("対戦用育成済みポケモン登録{$zukanNo}/{$subNo}");
    }
    
    /**
     * 対戦用育成済みポケモン取得
     * @param  String $zukanNo   図鑑No
     * @param  String $subNo     明細No
     * @param  String $soldierId 育成ID
     * @return JSONレスポンス
     */
    public function get($zukanNo, $subNo, $soldierId)
    {
        return $this->response200("対戦用育成済みポケモン取得{$zukanNo}/{$subNo}/{$soldierId}");
    }
    
    /**
     * 対戦用育成済みポケモン更新
     * @param  String $zukanNo   図鑑No
     * @param  String $subNo     明細No
     * @param  String $soldierId 育成ID
     * @return JSONレスポンス
     */
    public function update($zukanNo, $subNo, $soldierId)
    {
        return $this->response200("対戦用育成済みポケモン更新{$zukanNo}/{$subNo}/{$soldierId}");
    }
    
    /**
     * 対戦用育成済みポケモン削除
     * @param  String $zukanNo   図鑑No
     * @param  String $subNo     明細No
     * @param  String $soldierId 育成ID
     * @return JSONレスポンス
     */
    public function delete($zukanNo, $subNo, $soldierId)
    {
        return $this->response200("対戦用育成済みポケモン削除{$zukanNo}/{$subNo}/{$soldierId}");
    }
    
    /**
     * SupportsModel生成
     * @return SupportModel
     */
    private function createSoldiersModel()
    {
        //return new SoldiersModel($this->logger);
    }
    
}
