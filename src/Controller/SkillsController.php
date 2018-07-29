<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Skills Controller
 */
class SkillsController extends AppController
{
    
    public function view($skill_id = null)
    {
        $skill = $this->Skills
                ->find()
                ->where(['skill_id' => $skill_id]);
        
        $this->set(compact('skill'));
        $this->set('_serialize', 'skill');
    }
}
