<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QualitiesTable
 */
class QualitiesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('qualities');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Qualities', [
            'foreignKey' => 'quality_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Qualities', [
            'foreignKey' => 'quality_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('quality_name')
            ->maxLength('quality_name', 10)
            ->allowEmpty('quality_name');

        $validator
            ->scalar('effect')
            ->maxLength('effect', 200)
            ->allowEmpty('effect');

        $validator
            ->integer('delete_flg')
            ->requirePresence('delete_flg', 'create')
            ->notEmpty('delete_flg');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['quality_id'], 'Qualities'));

        return $rules;
    }
}
