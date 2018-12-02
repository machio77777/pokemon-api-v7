<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesTable
 */
class TypesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Skills', [
            'foreignKey' => 'type_id'
        ]);
        $this->hasMany('Typematrix', [
            'foreignKey' => 'type_id'
        ]);
        $this->hasMany('Types', [
            'foreignKey' => 'type_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('type_name1')
            ->maxLength('type_name1', 10)
            ->allowEmpty('type_name1');

        $validator
            ->scalar('type_name2')
            ->maxLength('type_name2', 10)
            ->allowEmpty('type_name2');

        $validator
            ->integer('delete_flg')
            ->requirePresence('delete_flg', 'create')
            ->notEmpty('delete_flg');

        return $validator;
    }
    
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['type_id'], 'Types'));

        return $rules;
    }
}
