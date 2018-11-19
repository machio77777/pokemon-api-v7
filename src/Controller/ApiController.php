<?php

namespace App\Controller;

use App\Controller\AppController;

class ApiController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }
    
    /**
     * レスポンス共通処理 - 200
     * @param  array  $data
     * @param  string $message
     * @return JSONレスポンス
     */
    protected function response200($data = '', $message = 'Success')
    {
        return $this->response->withStringBody(json_encode(['message' => $message, 'data' => $data]));
    }
}
