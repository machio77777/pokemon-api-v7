<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pokemon Entity
 *
 * @property int $id
 * @property int $zukan_no
 * @property int $sub_no
 * @property string $name
 * @property int $type_id1
 * @property int $type_id2
 * @property int $quality_id1
 * @property int $quality_id2
 * @property int $dream_quality
 * @property int $hp
 * @property int $at
 * @property int $df
 * @property int $sa
 * @property int $sd
 * @property int $sp
 * @property int $delete_flg
 */
class Pokemon extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'zukan_no' => true,
        'sub_no' => true,
        'name' => true,
        'type_id1' => true,
        'type_id2' => true,
        'quality_id1' => true,
        'quality_id2' => true,
        'dream_quality' => true,
        'hp' => true,
        'at' => true,
        'df' => true,
        'sa' => true,
        'sd' => true,
        'sp' => true,
        'delete_flg' => true
    ];
}
