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
        $kalastusalueet = TableRegistry::get("kalastusalueet");
        $surveys = $kalastusalueet->find()
            ->select(["kalastusalueet.id", "kalastusalueet.nimi", "vesisto_id", "u.nimi", "d.kysymysotsikko"])
            ->where(["kalastusalueet.id" =>  $this->Auth->user("kalastusalue_id")])
            ->hydrate(false)
            ->join([
                'c' => [
                    'table' => 'kalastusalue_kyselyt',
                    'type' => 'INNER',
                    'conditions' => 'c.kalastusalue_id = kalastusalueet.id',
                ],
                'u' => [
                    'table' => 'kyselyt',
                    'type' => 'INNER',
                    'conditions' => 'u.id = c.kalastusalue_id',
                ],
                'd '=> [
                    'table' => 'kysymykset',
                    'type' => 'INNER',
                    'conditions' => 'u.id = d.kysely_id',
                ]                
            ]);
        
        $this->set(compact('surveys'));

        $forms = "";
        $this->set('form', $forms);
        
        if ($this->request->is("post")) {
            // SIIRRETÄÄN NÄMÄ TABLEEN KUNHAN TULEE ENEMMÄN DATAA
            $usersTable = TableRegistry::get('users');
            $currentUser = $usersTable->findById($this->Auth->user("id"))->first();
            
            $currentUser->active = "0";
            $usersTable->save($currentUser);
            $this->redirect(['action' => 'thanks']);
        }
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