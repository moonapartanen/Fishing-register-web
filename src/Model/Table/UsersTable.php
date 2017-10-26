<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Log\Log;
class UsersTable extends Table
{
	public function findAuth(\Cake\ORM\Query $query, array $options)
	{
	    $query
	        ->select(['username', 'password'])
	        ->where(['active' => 1]);
            
	    return $query;
	}
}

?>