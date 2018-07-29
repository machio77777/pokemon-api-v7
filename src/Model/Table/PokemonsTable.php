<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pokemons Model
 */
class PokemonsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('pokemons');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('zukan_no')
            ->requirePresence('zukan_no', 'create')
            ->notEmpty('zukan_no');

        $validator
            ->integer('sub_no')
            ->allowEmpty('sub_no');

        $validator
            ->scalar('name')
            ->maxLength('name', 20)
            ->allowEmpty('name');

        $validator
            ->integer('type_id1')
            ->allowEmpty('type_id1');

        $validator
            ->integer('type_id2')
            ->allowEmpty('type_id2');

        $validator
            ->integer('quality_id1')
            ->allowEmpty('quality_id1');

        $validator
            ->integer('quality_id2')
            ->allowEmpty('quality_id2');

        $validator
            ->integer('dream_quality')
            ->allowEmpty('dream_quality');

        $validator
            ->integer('hp')
            ->allowEmpty('hp');

        $validator
            ->integer('at')
            ->allowEmpty('at');

        $validator
            ->integer('df')
            ->allowEmpty('df');

        $validator
            ->integer('sa')
            ->allowEmpty('sa');

        $validator
            ->integer('sd')
            ->allowEmpty('sd');

        $validator
            ->integer('sp')
            ->allowEmpty('sp');

        $validator
            ->integer('delete_flg')
            ->requirePresence('delete_flg', 'create')
            ->notEmpty('delete_flg');

        return $validator;
    }
}
