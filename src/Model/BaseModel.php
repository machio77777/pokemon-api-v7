<?php

namespace App\Model;

use Cake\Datasource\ConnectionManager;

class BaseModel {
    
    protected $con;
    
    protected $logger;
    
    public function __construct($logger)
    {
        $this->logger = $logger;
        $this->con = ConnectionManager::get('default');
    }
}
