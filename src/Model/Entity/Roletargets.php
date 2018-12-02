<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Roletargets Entity
 */
class Roletargets extends Entity
{
    
    protected $_accessible = [
        'zukan_no' => true,
        'sub_no' => true,
        'detail_no' => true,
        'target_zukan_no' => true,
        'target_sub_no' => true,
        'delete_flg' => true
    ];
}
