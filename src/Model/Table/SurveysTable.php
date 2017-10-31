<?php
namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Table;

class SurveysTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasMany("kalastusalue_kyselyt");
    }
}
?>