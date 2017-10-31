<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;

use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class SurveysController extends AppController
{
    public function index()
    {
        $tutkimusalueet = TableRegistry::get("tutkimusalueet");
        $surveys = $tutkimusalueet->find()
            ->select(["tutkimusalueet.id", "tutkimusalueet.nimi", "vesisto_id", "b.nimi", "c.kysymysotsikko", "c.kysymystyyppi_id", "c.kysymysnro"])
            ->where(["tutkimusalueet.id" =>  $this->Auth->user("tutkimusalue_id")])
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
                
            ]);
        
        /*
        $surveys = $kalastusalueet->find()
                ->contain([
                    'Kalastusalue_kyselyt.Kyselyt' => function ($q) {
                        return $q->where(['Kalastusalue_kyselyt.kalastusalue_id' => "kalastusalueet.id"]);
                    }
                ]);
        */
        
        $resources = TableRegistry::get("resurssit");
        $resources->find('all', [
            'conditions' => ['Resurssit.resurssityyppi_id' => 1]
        ]);
        
        $pyydykset = $resources->find('all', [
            'conditions' => ['Resurssit.resurssityyppi_id' => 2]
        ]);
        
        $haittatekijät = $resources->find('all', [
            'conditions' => ['Resurssit.resurssityyppi_id' => 3]
        ]);
        
        $surveys->order(['c.kysymysnro' => 'ASC']);
        $form = "";
        $this->set(compact('surveys'));
        $this->set(compact('kalat'));
        $this->set(compact('pyydykset'));
        $this->set(compact('haittatekijät'));
        $this->set(compact("form"));
       
    }
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
    } 
    
    public function thanks() 
    {
        $this->Auth->logout();
    }
}
?>