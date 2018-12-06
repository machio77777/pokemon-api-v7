<?php
namespace App\Controller\Api\Battle;

use Cake\ORM\TableRegistry;
use App\Controller\Api\ApiController;
use App\Model\Battle\SoldiersModel;

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
        $soldiers = $this->createSoldiersModel()->getList($zukanNo, $subNo);
        if ($soldiers === false) {
            return $this->response503();
        }
        return $this->response200($soldiers);
    }
    
    /**
     * 対戦用育成済みポケモン登録
     * @param  String $zukanNo 図鑑No
     * @param  String $subNo   明細No
     * @return JSONレスポンス
     */
    public function add($zukanNo, $subNo)
    {
        $soldier = TableRegistry::get('Pbattles')->newEntity($this->request->getData(), ['validate' => 'add']);
        if ($soldier->getErrors()) {
            return $this->response400($this->Common->convertCakeValidateObject($soldier->getErrors()));
        }
        
        $result = $this->createSoldiersModel()->add(array_merge(['zukanNo' => $zukanNo, 'subNo' => $subNo], $soldier->toArray()));
        if ($result === false) {
            return $this->response503();
        } elseif ($result === 0) {
            return $this->response409();
        } else {
            return $this->response200();
        }
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
        $soldier = $this->createSoldiersModel()->get($zukanNo, $subNo, $soldierId);
        if ($soldier === false) {
            return $this->response503();
        }
        return $this->response200($soldier);
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
        $soldier = TableRegistry::get('Pbattles')->newEntity($this->request->getData(), ['validate' => 'update']);
        if ($soldier->getErrors()) {
            return $this->response400($this->Common->convertCakeValidateObject($soldier->getErrors()));
        }
        
        $result = $this->createSoldiersModel()->update(
                array_merge(['zukanNo' => $zukanNo, 'subNo' => $subNo, 'soldierId' => $soldierId], $soldier->toArray()));
        
        if ($result === false) {
            return $this->response503();
        } elseif ($result === 0) {
            return $this->response409();
        } else {
            return $this->response200();
        }
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
        $result = $this->createSoldiersModel()->delete($zukanNo, $subNo, $soldierId);
        if ($result === false) {
            return $this->response503();
        } elseif($result === 0) {
            return $this->response409();
        } else {
            return $this->response200();
        }
    }
    
    /**
     * SupportsModel生成
     * @return SupportModel
     */
    private function createSoldiersModel()
    {
        return new SoldiersModel($this->logger);
    }
    
}
