<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PbattleTable
 */
class PbattleTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('pbattle');
        $this->setPrimaryKey('id');
    }
}
