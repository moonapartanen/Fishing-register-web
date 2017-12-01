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
            //
            //$connection = ConnectionManager::get('db_answers');
            $vastauksetTable = TableRegistry::get('Vastaukset');
            
           
            foreach ($this->request->data['kysymys'] as $kysymysotsikko) {
                $this->log($kysymysotsikko, 'debug');
                $kysymys = explode('@', $kysymysotsikko);
                
                
                
                    if ($kysymys[1] == 1 || $kysymys[1] == 2 || $kysymys[1] == 3) {
                        /*
                        $vastaus_single = $vastauksetTable->newEntity();

                        foreach ($this->request->data['vastaus'] as $id => $vastaus) {
                            
                            if ($id == $kysymys[2]) {
                                $vastaus_single->vastaus = $vastaus;
                            }
                            
                        }

                        $vastaus_single->kysymys_id = $kysymys[2];
                        $vastaus_single->vastauspvm = date('Y-m-d H:i:s');
                        
                        $vastauksetTable->save($vastaus_single); 
                        */
                    } 
                    elseif($kysymys[1] == 8 || $kysymys[1] == 9) {
                        $vastauksetTable = TableRegistry::get('Vastaukset');

                        $vastaus_single = $vastauksetTable->newEntity();
                        $vastaus_single->kysymys_id = $kysymys[2];
                        $vastaus_single->vastauspvm = date('Y-m-d H:i:s');

                        $vastauksetTable->save($vastaus_single); 
                        $lastinsertid = $vastaus_single->id;
                        $this->log($lastinsertid, 'debug');
                        foreach ($this->request->data['vastaus'] as $id => $vastaus) {
                            //$this->log($vastaus, 'debug');

                            if (is_array($vastaus)) {
                                foreach ($vastaus as $v) {
                                    if (is_array($v)) {
                                        foreach ($v as $index => $value) {
                                            //$this->log($index, 'debug');
                                            
                                            $vastaus_kentatTable = TableRegistry::get('Vastaus_kentat');
                                            $vastaus_single = $vastaus_kentatTable->newEntity();

                                            $vastaus_single->kysymys_kentat_id = '1043';
                                            $vastaus_single->vastaus_id  = $lastinsertid;
                                            $vastaus_single->vastaus  = $value;

                                            $vastaus_kentatTable->save($vastaus_single);

                                        }
                                    }
                                    
                                }
                                
                            }

                            if ($id == $kysymys[2]) {
                                $vastaus_single->vastaus = $vastaus;
                            }
                            
                        }

                    }

                
                    /*
                    foreach ($this->request->data['vastaus']['6']['0'] as $vastaus => $v) {
                        
                        $vastauksetTable = TableRegistry::get('Vastaus_kentat');
                        $this->log($vastaus . ' - ', 'debug');
                        
                        $connection->insert('vastaukset', [
                            'kysely_id' => $this->request->data['kysely'],
                            'kysymystyyppi_id' => $kysymys[1],
                            'kysymysnro' => $kysymysnro,
                            'kysymysotsikko' => $kysymys[0],
                            'vastaus' => '',
                            'vastauspvm' => date('Y-m-d H:i:s')
                        ]); 
                                               
                        $connection->insert('vastaus_kentat', [
                            'vastaus_id' => $lastId,
                            'rivi_resurssi_id' => $vastaus,
                            'sarake_resurssi_id' => $vastaus,
                            'vastaus' => $v,
                        ]);                         
                    */                    
                   /*
                        $connection->insert('vastaukset', [
                        'kysely_id' => $this->request->data['kysely'],
                        'kysymystyyppi_id' => $kysymys[1],
                        'kysymysnro' => $kysymysnro,
                        'kysymysotsikko' => $kysymys[0],
                        'vastaus' => 'testi',
                        'vastauspvm' => date('Y-m-d H:i:s')
                        ]);   
                    
                    
                }
               */
            }
            
            
            
            //$this->log($this->request->data['kysymys'], 'debug');
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
