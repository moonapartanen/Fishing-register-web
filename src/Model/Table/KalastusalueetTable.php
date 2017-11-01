<?php

namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Table;
use Cake\ORM\Query;

class KalastusalueetTable extends Table
{    
    public function initialize(array $config)
    {
        $this->displayField("nimi");
    }
}
