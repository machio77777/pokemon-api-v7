<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Qualities Controller
 */
class QualitiesController extends AppController
{
    public function view($quality_id = null)
    {
        $quality = $this->Qualities
                ->find()
                ->where(['quality_id' => $quality_id]);
        
        $this->set(compact('quality'));
        $this->set('_serialize', 'quality');
    }
}
