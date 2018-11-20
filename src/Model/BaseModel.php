<?php

namespace App\Model;

use Cake\Datasource\ConnectionManager;

class BaseModel {
    
    protected $con;
    
    public function __construct()
    {
        $this->con = ConnectionManager::get('default');
    }
}
