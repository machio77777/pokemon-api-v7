<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quality Entity
 *
 * @property int $id
 * @property int $quality_id
 * @property string $quality_name
 * @property string $effect
 * @property int $delete_flg
 *
 * @property \App\Model\Entity\Quality[] $qualities
 */
class Quality extends Entity
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
        'quality_id' => true,
        'quality_name' => true,
        'effect' => true,
        'delete_flg' => true,
        'qualities' => true
    ];
}
