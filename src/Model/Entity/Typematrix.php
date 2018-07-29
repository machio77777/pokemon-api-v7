<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Typematrix Entity
 *
 * @property int $id
 * @property int $type_id
 * @property int $target
 * @property int $aisho_flg
 * @property int $delete_flg
 *
 * @property \App\Model\Entity\Type $type
 */
class Typematrix extends Entity
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
        'type_id' => true,
        'target' => true,
        'aisho_flg' => true,
        'delete_flg' => true,
        'type' => true
    ];
}
