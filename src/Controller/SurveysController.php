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
        $this->loadModel('Tutkimusalueet');
        
        $tutkimusalue = $this->Auth->user("tutkimusalue_id");
        $kyselyt = $this->Tutkimusalueet->find('surveys', [
            'tutkimusalue' => $tutkimusalue
        ]);
                
        $this->loadModel('Resurssit');
        
        $this->set([
            'tutkimusalue' => $tutkimusalue,
            'kyselyt' => $kyselyt,
            'resurssit_pyydykset' =>  $this->Resurssit->find('list', ['conditions' => ['Resurssit.resurssityyppi_id' => 2]]),
            'resurssit_haittatekijat' =>  $this->Resurssit->find('list', ['conditions' => ['Resurssit.resurssityyppi_id' => 3]]),
            'resurssit_kalat' => $this->Resurssit->find('list', ['conditions' => ['Resurssit.resurssityyppi_id' => 1]]),
            'kalastusalueet' => $this->Resurssit->find('list', ['conditions' => ['Resurssit.resurssityyppi_id' => 1]])
        ]);
        
        $this->loadModel('Kalastusalueet');
        
        $this->set([
            'kalastusalueet' => $this->Kalastusalueet->find('list')
        ]);
    }
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    
}
?>