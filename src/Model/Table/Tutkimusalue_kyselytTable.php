<?php

namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Table;

class Tutkimusalue_kyselytTable extends Table
{    
    public function initialize(array $config)
    {
        $this->hasMany("Kyselyt");
        $this->hasMany('Tutkimusalueet');
    }
}

?>