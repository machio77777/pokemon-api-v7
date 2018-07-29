<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SkillsFixture
 *
 */
class SkillsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'skill_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '技ID', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '名称', 'precision' => null, 'fixed' => null],
        'type_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '属性ID', 'precision' => null, 'autoIncrement' => null],
        'power' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '威力', 'precision' => null, 'autoIncrement' => null],
        'zpower' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Z威力', 'precision' => null, 'autoIncrement' => null],
        'pp' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'PP', 'precision' => null, 'autoIncrement' => null],
        'classification' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '分類', 'precision' => null, 'fixed' => null],
        'accuracy' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '命中率', 'precision' => null, 'autoIncrement' => null],
        'target' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '対象', 'precision' => null, 'fixed' => null],
        'effect' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '効果', 'precision' => null, 'fixed' => null],
        'zeffect' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Z効果', 'precision' => null, 'fixed' => null],
        'direct_attack' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '直接攻撃', 'precision' => null, 'fixed' => null],
        'magic_coat' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'マジックガード', 'precision' => null, 'fixed' => null],
        'omugaeshi' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'オウムがえし', 'precision' => null, 'fixed' => null],
        'mamoru' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'まもる', 'precision' => null, 'fixed' => null],
        'yokodori' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'よこどり', 'precision' => null, 'fixed' => null],
        'migawarikantsu' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'みがわり貫通', 'precision' => null, 'fixed' => null],
        'delete_flg' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '削除FLG', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'skill_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'type_id' => 1,
                'power' => 1,
                'zpower' => 1,
                'pp' => 1,
                'classification' => 'Lorem ip',
                'accuracy' => 1,
                'target' => 'Lorem ipsum dolor ',
                'effect' => 'Lorem ipsum dolor sit amet',
                'zeffect' => 'Lorem ipsum dolor sit amet',
                'direct_attack' => 'Lorem ipsum dolor ',
                'magic_coat' => 'Lorem ipsum dolor ',
                'omugaeshi' => 'Lorem ipsum dolor ',
                'mamoru' => 'Lorem ipsum dolor ',
                'yokodori' => 'Lorem ipsum dolor ',
                'migawarikantsu' => 'Lorem ipsum dolor ',
                'delete_flg' => 1
            ],
        ];
        parent::init();
    }
}
