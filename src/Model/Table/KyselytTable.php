<?php

namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Table;

class KyselytTable extends Table
{    
    public function initialize(array $config)
    {
        $this->hasMany("kysymykset");
        $this->belongsTo("tutkimusalueet");
    }
}

?>
