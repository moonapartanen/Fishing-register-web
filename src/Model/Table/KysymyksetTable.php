<?php

namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Table;

class KysymyksetTable extends Table
{    
    public function initialize(array $config)
    {
        $this->hasOne("vastaukset");
    }
}

?>