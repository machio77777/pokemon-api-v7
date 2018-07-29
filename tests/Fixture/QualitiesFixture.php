<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QualitiesFixture
 *
 */
class QualitiesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'quality_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '特性ID', 'precision' => null, 'autoIncrement' => null],
        'quality_name' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '特性名', 'precision' => null, 'fixed' => null],
        'effect' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '効果', 'precision' => null, 'fixed' => null],
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
                'quality_id' => 1,
                'quality_name' => 'Lorem ip',
                'effect' => 'Lorem ipsum dolor sit amet',
                'delete_flg' => 1
            ],
        ];
        parent::init();
    }
}
