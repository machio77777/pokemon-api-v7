<?php
namespace App\Controller\Api\Master;

use App\Controller\Api\ApiController;

/**
 * SkillsController
 */
class SkillsController extends ApiController
{
    /**
     * 技一覧取得
     * @return JSONレスポンス
     */
    public function getList()
    {
        return $this->response200("json api skills get");
    }
    
    /**
     * 技取得
     * @param  string $skillId 技ID
     * @return JSONレスポンス
     */
    public function get($skillId)
    {
        return $this->response200("json api skill get");
    }
    
}
