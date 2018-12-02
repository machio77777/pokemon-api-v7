<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TricksTable
 */
class TricksTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('tricks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Skills', [
            'foreignKey' => 'skill_id'
        ]);
    }
    
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('zukan_no')
            ->allowEmpty('zukan_no');

        $validator
            ->integer('delete_flg')
            ->requirePresence('delete_flg', 'create')
            ->notEmpty('delete_flg');

        return $validator;
    }
    
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['skill_id'], 'Skills'));

        return $rules;
    }
}
