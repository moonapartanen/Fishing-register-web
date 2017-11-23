<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;

use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Log\Log;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class FormController extends AppController
{
    public function index()
    {
        if ($this->request->is("post")) {
            // SIIRRETÄÄN NÄMÄ TABLEEN KUNHAN TULEE ENEMMÄN DATAA
            $this->loadModel('Kayttajat');
            $currentUser = $this->Kayttajat->findById($this->Auth->user("id"))->first();
            
            //$currentUser->status = "0";
            //$this->Kayttajat->save($currentUser);
            $connection = ConnectionManager::get('db_answers');
            
            
            
            $connection->insert('vastaukset', [
                'kysely_id' => $this->request->data['kysely'],
                'kysymystyyppi_id' => $this->request->data['kysymystyyppi'],
                'kysymysnro' => 1,
                'kysymysotsikko' => $this->request->data['kysymys-1'],
                'vastaus' => 'testi',
                'vastauspvm' => date('Y-m-d H:i:s')
            ]);            
            
            //$this->log($args, 'debug');
            //$this->loadModel("Vastaukset");
            //$this->Vastaukset->save($args);
            //$this->redirect(['action' => 'thanks']);
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
