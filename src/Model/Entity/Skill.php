<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Skill Entity
 *
 * @property int $id
 * @property int $skill_id
 * @property string $name
 * @property int $type_id
 * @property int $power
 * @property int $zpower
 * @property int $pp
 * @property string $classification
 * @property int $accuracy
 * @property string $target
 * @property string $effect
 * @property string $zeffect
 * @property string $direct_attack
 * @property string $magic_coat
 * @property string $omugaeshi
 * @property string $mamoru
 * @property string $yokodori
 * @property string $migawarikantsu
 * @property int $delete_flg
 *
 * @property \App\Model\Entity\Skill[] $skills
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Trick[] $tricks
 */
class Skill extends Entity
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
        'skill_id' => true,
        'name' => true,
        'type_id' => true,
        'power' => true,
        'zpower' => true,
        'pp' => true,
        'classification' => true,
        'accuracy' => true,
        'target' => true,
        'effect' => true,
        'zeffect' => true,
        'direct_attack' => true,
        'magic_coat' => true,
        'omugaeshi' => true,
        'mamoru' => true,
        'yokodori' => true,
        'migawarikantsu' => true,
        'delete_flg' => true,
        'skills' => true,
        'type' => true,
        'tricks' => true
    ];
}
