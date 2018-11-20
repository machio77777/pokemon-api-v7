<?php
namespace App\Controller\Api\Master;

use App\Controller\Api\ApiController;

/**
 * PokemonsController
 */
class PokemonsController extends ApiController
{
    /**
     * ポケモン図鑑一覧取得
     * @return JSONレスポンス
     */
    public function getList()
    {
        return $this->response200("json api pokemons get");
    }
    
    /**
     * ポケモン図鑑取得
     * @param  string $zukanNo 図鑑No
     * @param  string $subNo   図鑑サブNo
     * @return JSONレスポンス
     */
    public function get($zukanNo, $subNo)
    {
        return $this->response200("json api pokemon get");
    }
    
    /**
     * ポケモン別に覚える技一覧取得
     * @param  string $zukanNo 図鑑No
     * @param  string $subNo   図鑑サブNo
     * @return JSONレスポンス
     */
    public function getSkills($zukanNo, $subNo)
    {
        return $this->response200("json api skills get");
    }
    
}
