<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Compatibilities Entity
 */
class Compatibilities extends Entity
{
    
    protected $_accessible = [
        'support_id' => true,
        'target1_zukan_no' => true,
        'target1_sub_no' => true,
        'target2_zukan_no' => true,
        'target2_sub_no' => true,
        'delete_flg' => true
    ];
}
