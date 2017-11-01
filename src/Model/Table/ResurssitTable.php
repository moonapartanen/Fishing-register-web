<?php

namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Table;

class ResurssitTable extends Table
{    
    public function initialize(array $config)
    {
        $this->hasMany("kysymykset");
        $this->belongsTo("tutkimusalueet");
        $this->displayField("nimi");
    }
}