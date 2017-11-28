<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use App\Model\Entity\Vastaus;

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
            
            foreach ($this->request->data['kysymys'] as $kysymysnro => $kysymysotsikko) {
                $kysymys = explode('@', $kysymysotsikko);
                
                if ($kysymys[1] == 1 || $kysymys[1] == 2 || $kysymys[1] == 3) {
                    $connection->insert('vastaukset', [
                        'kysely_id' => $this->request->data['kysely'],
                        'kysymystyyppi_id' => $kysymys[1],
                        'kysymysnro' => $kysymysnro,
                        'kysymysotsikko' => $kysymys[0],
                        'vastaus' => 'testi',
                        'vastauspvm' => date('Y-m-d H:i:s')
                    ]);               
                } else if($kysymys[1] == 8) {
                    $this->log($this->request->data['vastaus'], 'debug');
                }
                /*
                else {
                    $connection->insert('vastaus_kentat', [
                        'vastaus_id' => $this->request->data['kysely'],
                        'rivi_resurssi_id' => $kysymystyyppi[1],
                        'sarake_resurssi_id' => $kysymysnro,
                        'vastaus' => 'testi'
                    ]);
                }
                
                */
                //$this->log($kysymysnro . ' - '. $kysymysotsikko, 'debug');
                /*
                foreach ($this->request->data['vastaus'] as $value) {
                    $this->log($value . ' - ', 'debug');
                }
                
                 */
            }
            
            
            
            //$this->log($this->request->data['kysymys'], 'debug');
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
