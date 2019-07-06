<?php
namespace App\Controller\Api\Master;

use App\Controller\Api\ApiController;
use App\Model\Master\SkillsModel;

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
        $type = $this->request->getQuery('type');
        $skills = $this->createSkillsModel()->getList($type);
        if ($skills === false) {
            return $this->response503();
        }
        return $this->response200($skills);
    }
    
    /**
     * 技取得
     * @param  string $skillId 技ID
     * @return JSONレスポンス
     */
    public function get($skillId)
    {
        $skill = $this->createSkillsModel()->get($skillId);
        if ($skill === false) {
            return $this->response503();
        }
        return $this->response200($skill);
    }
    
    /**
     * SkillsModel生成
     * @return SkillsModel
     */
    private function createSkillsModel()
    {
        return new SkillsModel($this->logger);
    }
    
}
