<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RoletargetsTable
 */
class RoletargetsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('roletargets');
        $this->setPrimaryKey('id');
    }
}
