<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Type Entity
 *
 * @property int $id
 * @property int $type_id
 * @property string $type_name1
 * @property string $type_name2
 * @property int $delete_flg
 *
 * @property \App\Model\Entity\Type[] $types
 * @property \App\Model\Entity\Skill[] $skills
 * @property \App\Model\Entity\Typematrix[] $typematrix
 */
class Type extends Entity
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
        'type_name1' => true,
        'type_name2' => true,
        'delete_flg' => true,
        'types' => true,
        'skills' => true,
        'typematrix' => true
    ];
}
