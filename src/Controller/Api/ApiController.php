<?php

namespace App\Controller\Api;

use App\Controller\AppController;
use App\Common\ApiLogger;

class ApiController extends AppController
{
    protected $logger;
    
    public function initialize()
    {
        parent::initialize();
        $this->logger = new ApiLogger();
    }
    
    /**
     * レスポンス共通処理 - 200
     * @param  array  $data
     * @param  string $message
     * @return JSONレスポンス
     */
    protected function response200($data = '', $message = 'Ok')
    {
        $this->logger->successProcess();
        return $this->response->withStringBody(json_encode(['message' => $message, 'data' => $data], JSON_UNESCAPED_UNICODE));
    }
    
    /**
     * レスポンス共通処理 - 400
     * @param  array  $data
     * @param  string $message
     * @return JSONレスポンス
     */
    protected function response400($data = '', $message = 'Bad Request')
    {
        $this->logger->errorProcess();
        $response = $this->response->withStatus(400);
        return $response->withStringBody(json_encode(['message' => $message, 'data' => $data], JSON_UNESCAPED_UNICODE));
    }
    
    /**
     * レスポンス共通処理 - 409
     * @param  array  $data
     * @param  string $message
     * @return JSONレスポンス
     */
    protected function response409($data = '', $message = 'Conflict')
    {
        $this->logger->errorProcess();
        $response = $this->response->withStatus(409);
        return $response->withStringBody(json_encode(['message' => $message, 'data' => $data], JSON_UNESCAPED_UNICODE));
    }
    
    /**
     * レスポンス共通処理 - 503
     * @param  array  $data
     * @param  string $message
     * @return JSONレスポンス
     */
    protected function response503($data = '', $message = 'Service Unavailable')
    {
        $this->logger->errorProcess();
        $response = $this->response->withStatus(503);
        return $response->withStringBody(json_encode(['message' => $message, 'data' => $data], JSON_UNESCAPED_UNICODE));
    }
}
