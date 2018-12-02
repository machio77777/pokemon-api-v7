<?php
namespace App\Controller\Api\Master;

use App\Controller\Api\ApiController;
use App\Model\Master\PokemonsModel;

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
        $pokemons = $this->createPokemonsModel()->getList();
        if ($pokemons === false) {
            return $this->response503();
        }
        return $this->response200($pokemons);
    }
    
    /**
     * ポケモン図鑑取得
     * @param  string $zukanNo 図鑑No
     * @param  string $subNo   図鑑サブNo
     * @return JSONレスポンス
     */
    public function get($zukanNo, $subNo)
    {
        $pokemon = $this->createPokemonsModel()->get($zukanNo, $subNo);
        if ($pokemon === false) {
            return $this->response503();
        }
        return $this->response200($pokemon);
    }
    
    /**
     * ポケモン別に覚える技一覧取得
     * @param  string $zukanNo 図鑑No
     * @param  string $subNo   図鑑サブNo
     * @return JSONレスポンス
     */
    public function getSkills($zukanNo, $subNo)
    {
        $skills = $this->createPokemonsModel()->getSkills($zukanNo, $subNo);
        if ($skills === false) {
            return $this->response503();
        }
        return $this->response200($skills);
    }
    
    /**
     * PokemonsModel生成
     * @return PokemonsModel
     */
    private function createPokemonsModel()
    {
        return new PokemonsModel($this->logger);
    }
    
}
