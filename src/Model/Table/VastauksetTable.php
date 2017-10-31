<?php

namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Table;

class VastauksetTable extends Table
{    
    public function initialize(array $config)
    {
        $this->belongsTo("kysymykset");
    }
}

?>