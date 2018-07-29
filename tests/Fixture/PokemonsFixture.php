<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PokemonsFixture
 *
 */
class PokemonsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'zukan_no' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '図鑑No', 'precision' => null, 'autoIncrement' => null],
        'sub_no' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'サブNo', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '名前', 'precision' => null, 'fixed' => null],
        'type_id1' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '属性1', 'precision' => null, 'autoIncrement' => null],
        'type_id2' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '属性2', 'precision' => null, 'autoIncrement' => null],
        'quality_id1' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '特性1', 'precision' => null, 'autoIncrement' => null],
        'quality_id2' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '特性2', 'precision' => null, 'autoIncrement' => null],
        'dream_quality' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '夢特性', 'precision' => null, 'autoIncrement' => null],
        'hp' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '種族値HP', 'precision' => null, 'autoIncrement' => null],
        'at' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '種族値AT', 'precision' => null, 'autoIncrement' => null],
        'df' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '種族値DF', 'precision' => null, 'autoIncrement' => null],
        'sa' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '種族値SA', 'precision' => null, 'autoIncrement' => null],
        'sd' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '種族値SD', 'precision' => null, 'autoIncrement' => null],
        'sp' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '種族値SP', 'precision' => null, 'autoIncrement' => null],
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
                'zukan_no' => 1,
                'sub_no' => 1,
                'name' => 'Lorem ipsum dolor ',
                'type_id1' => 1,
                'type_id2' => 1,
                'quality_id1' => 1,
                'quality_id2' => 1,
                'dream_quality' => 1,
                'hp' => 1,
                'at' => 1,
                'df' => 1,
                'sa' => 1,
                'sd' => 1,
                'sp' => 1,
                'delete_flg' => 1
            ],
        ];
        parent::init();
    }
}
