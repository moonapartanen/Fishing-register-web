<?php

namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Table;

class QuestionsTable extends Table
{    
    public function initialize(array $config)
    {
        $this->belongsTo("Surveys");
    }
}

?>