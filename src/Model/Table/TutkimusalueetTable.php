<?php

namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Table;
use Cake\ORM\Query;

class TutkimusalueetTable extends Table
{    
    public function initialize(array $config)
    {
        $this->hasOne("Kyselyt");
    }
    
    public function findSurveys(Query $query, array $options) 
    {
        $surveys = $this->find()
            ->select(["tutkimusalueet.id", "vesisto_id", "b.nimi", "c.kysymysotsikko", "c.kysymystyyppi_id", "c.kysymysnro"])
            ->where(["tutkimusalueet.id" =>  $options["tutkimusalue"]])
            ->hydrate(false)
            ->join([
                'a' => [
                    'table' => 'tutkimusalue_kyselyt',
                    'type' => 'INNER',
                    'conditions' => 'a.tutkimusalue_id = tutkimusalueet.id',
                ],
                'b' => [
                    'table' => 'kyselyt',
                    'type' => 'INNER',
                    'conditions' => 'b.id = a.kysely_id',
                ],
                'c'=> [
                    'table' => 'kysymykset',
                    'type' => 'INNER',
                    'conditions' => 'b.id = c.kysely_id',
                ]
                
            ])
            ->order(['c.kysymysnro' => 'ASC']);
        return $surveys;
    }
}

?>