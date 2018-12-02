<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CompatibilitiesTable
 */
class CompatibilitiesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('compatibilities');
        $this->setPrimaryKey('id');
    }
}
