<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pbattles Entity
 */
class Pbattles extends Entity
{
    
    protected $_accessible = [
        'soldier_id' => true,
        'zukan_no' => true,
        'sub_no' => true,
        'personality' => true,
        'quality_id' => true,
        'skill_id1' => true,
        'skill_id2' => true,
        'skill_id3' => true,
        'skill_id4' => true,
        'ehp' => true,
        'eat' => true,
        'edf' => true,
        'esa' => true,
        'esd' => true,
        'ahp' => true,
        'aat' => true,
        'adf' => true,
        'asa' => true,
        'asd' => true,
        'asp' => true,
        'delete_flg' => true
    ];
}
