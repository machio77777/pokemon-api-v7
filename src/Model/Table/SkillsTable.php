<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Skills Model
 */
class SkillsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('skills');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Skills', [
            'foreignKey' => 'skill_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Types', [
            'foreignKey' => 'type_id'
        ]);
        $this->hasMany('Skills', [
            'foreignKey' => 'skill_id'
        ]);
        $this->hasMany('Tricks', [
            'foreignKey' => 'skill_id'
        ]);
    }
    
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->allowEmpty('name');

        $validator
            ->integer('power')
            ->allowEmpty('power');

        $validator
            ->integer('zpower')
            ->allowEmpty('zpower');

        $validator
            ->integer('pp')
            ->allowEmpty('pp');

        $validator
            ->scalar('classification')
            ->maxLength('classification', 10)
            ->allowEmpty('classification');

        $validator
            ->integer('accuracy')
            ->allowEmpty('accuracy');

        $validator
            ->scalar('target')
            ->maxLength('target', 20)
            ->allowEmpty('target');

        $validator
            ->scalar('effect')
            ->maxLength('effect', 200)
            ->allowEmpty('effect');

        $validator
            ->scalar('zeffect')
            ->maxLength('zeffect', 200)
            ->allowEmpty('zeffect');

        $validator
            ->scalar('direct_attack')
            ->maxLength('direct_attack', 20)
            ->allowEmpty('direct_attack');

        $validator
            ->scalar('magic_coat')
            ->maxLength('magic_coat', 20)
            ->allowEmpty('magic_coat');

        $validator
            ->scalar('omugaeshi')
            ->maxLength('omugaeshi', 20)
            ->allowEmpty('omugaeshi');

        $validator
            ->scalar('mamoru')
            ->maxLength('mamoru', 20)
            ->allowEmpty('mamoru');

        $validator
            ->scalar('yokodori')
            ->maxLength('yokodori', 20)
            ->allowEmpty('yokodori');

        $validator
            ->scalar('migawarikantsu')
            ->maxLength('migawarikantsu', 20)
            ->allowEmpty('migawarikantsu');

        $validator
            ->integer('delete_flg')
            ->requirePresence('delete_flg', 'create')
            ->notEmpty('delete_flg');

        return $validator;
    }
    
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['skill_id'], 'Skills'));
        $rules->add($rules->existsIn(['type_id'], 'Types'));

        return $rules;
    }
}
