<?php

namespace App\Common;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LogLevel;

class ApiLogger {
    
    private $logger;
    
    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->logger = new Logger('pokemon');
        $formatter = new LineFormatter(null, null, false, true);
        $infoheader = new StreamHandler(LOGS . "/pokemon.log", Logger::INFO);
        $infoheader->setFormatter($formatter);
        $this->logger->pushHandler($infoheader);
    }
    
    /**
     * API正常終了ログ
     * @param array $args 任意パラメータ
     */
    public function successProcess($args = null)
    {
        $message = "正常終了";
        $this->log($message, LogLevel::INFO, $args);
    }
    
    /**
     * API異常終了ログ
     * @param array $args 任意パラメータ
     */
    public function errorProcess($args = null)
    {
        $message = "異常終了";
        $this->log($message, LogLevel::ERROR, $args);
    }
    
    /**
     * ログ出力
     * @param string $message メッセージ
     * @param string $level   ログレベル
     * @param array  $args    任意パラメータ(key-val)
     */
    public function log($message, $level = LogLevel::ERROR, $args = null)
    {
        $output = $message;
        
        if ($args !== null) {
            foreach ($args as $key => $value) {
                $output = $output . " [{$key}]{$value}";
            }
        }
        $this->logger->log($level, $output);
    }
}
