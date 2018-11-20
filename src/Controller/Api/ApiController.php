<?php

namespace App\Controller\Api;

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
    protected function response200($data = '', $message = 'Ok')
    {
        return $this->response->withStringBody(json_encode(['message' => $message, 'data' => $data]));
    }
    
    /**
     * レスポンス共通処理 - 400
     * @param  array  $data
     * @param  string $message
     * @return JSONレスポンス
     */
    protected function response400($data = '', $message = 'Bad Request')
    {
        $response = $this->response->withStatus(400);
        return $response->withStringBody(json_encode(['message' => $message, 'data' => $data]));
    }
    
    /**
     * レスポンス共通処理 - 503
     * @param  array  $data
     * @param  string $message
     * @return JSONレスポンス
     */
    protected function response503($data = '', $message = 'Service Unavailable')
    {
        $response = $this->response->withStatus(503);
        return $response->withStringBody(json_encode(['message' => $message, 'data' => $data]));
    }
}
