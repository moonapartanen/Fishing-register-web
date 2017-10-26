<?php
namespace App\Model\Table;
use Cake\ORM\Table;

class SurveysTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasMany('questions');
    }
}
?>