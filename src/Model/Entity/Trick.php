<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trick Entity
 *
 * @property int $id
 * @property int $zukan_no
 * @property int $skill_id
 * @property int $delete_flg
 *
 * @property \App\Model\Entity\Skill $skill
 */
class Trick extends Entity
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
        'skill_id' => true,
        'delete_flg' => true,
        'skill' => true
    ];
}
