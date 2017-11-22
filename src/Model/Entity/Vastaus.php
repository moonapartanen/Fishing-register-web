<?php

namespace App\Model\Entity;
use Cake\ORM\Entity;

class Vastaus extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}

?>