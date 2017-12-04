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
                //$this->log($kysymysotsikko, 'debug');
                $kysymys = explode('@', $kysymysotsikko);

                    if ($kysymys[1] == 1 || $kysymys[1] == 2 || $kysymys[1] == 3) {
                        
                        $vastaus_single = $vastauksetTable->newEntity();

                        foreach ($this->request->data['vastaus'] as $id => $vastaus) {
                            
                            if ($id == $kysymys[2]) {
                                $vastaus_single->vastaus = $vastaus;
                            }
                            
                        }

                        $vastaus_single->kysymys_id = $kysymys[2];
                        $vastaus_single->vastauspvm = date('Y-m-d H:i:s');
                        
                        $vastauksetTable->save($vastaus_single); 
                        
                    } 
                    elseif($kysymys[1] == 8) {

                        /*
                        $vastauksetTable = TableRegistry::get('Vastaukset');

                        $vastaus_single = $vastauksetTable->newEntity();
                        $vastaus_single->kysymys_id = $kysymys[2];
                        $vastaus_single->vastauspvm = date('Y-m-d H:i:s');

                        $vastauksetTable->save($vastaus_single); 
                        $lastVastausid = $vastaus_single->id;

                        //$this->log($lastVastausid, 'debug');
                        foreach ($this->request->data['vastaus'] as $id => $vastaus) {

                            if ($id == $kysymys[2]) {
                                if (is_array($vastaus)) {
                                    foreach ($vastaus as $index => $value) {
                                        //$this->log($value, 'debug');
                                        // loopataan kysymys_kentat
                                        $KysymysKentatTable = TableRegistry::get('Kysymys_kentat');
                                        $vastaus_single = $KysymysKentatTable->newEntity();
                                        $vastaus_single->kysymys_id = $kysymys[2];
                                        $vastaus_single->sarake_resurssi_id = $index;
                                        $KysymysKentatTable->save($vastaus_single); 
                                        $lastKysymyskenttaid = $vastaus_single->id;
                                        //$this->log($value, 'debug');
                                        //$this->log($index, 'debug');
                                        $vastaus_kentatTable = TableRegistry::get('Vastaus_kentat');
                                        $vastaus_single = $vastaus_kentatTable->newEntity();
                                        $vastaus_single->kysymys_kentta_id  = $lastKysymyskenttaid;
                                        $vastaus_single->vastaus_id  = $lastVastausid;
                                        $vastaus_single->vastaus  = $value;

                                        $vastaus_kentatTable->save($vastaus_single); 
                                    }
                                }
                            }
                            
                        }
                        */

                    }
                    elseif ($kysymys[1] == 9) {
                        /*
                        $vastauksetTable = TableRegistry::get('Vastaukset');

                        $vastaus_single = $vastauksetTable->newEntity();
                        $vastaus_single->kysymys_id = $kysymys[2];
                        $vastaus_single->vastauspvm = date('Y-m-d H:i:s');

                        $vastauksetTable->save($vastaus_single); 
                        $lastVastausid = $vastaus_single->id;

                        //$this->log($lastVastausid, 'debug');
                        foreach ($this->request->data['vastaus'] as $id => $vastaus) {

                            if ($id == $kysymys[2]) {
                                if (is_array($vastaus)) {
                                    foreach ($vastaus as $v) {
                                        if (is_array($v)) {
                                            foreach ($v as $index => $value) {
                                                //$this->log($value, 'debug');
                                                // loopataan kysymys_kentat
                                                $KysymysKentatTable = TableRegistry::get('Kysymys_kentat');
                                                $vastaus_single = $KysymysKentatTable->newEntity();
                                                $vastaus_single->kysymys_id = $kysymys[2];
                                                $vastaus_single->rivi_resurssi_id = $index;
                                                $KysymysKentatTable->save($vastaus_single); 
                                                $lastKysymyskenttaid = $vastaus_single->id;
                                                //$this->log($value, 'debug');
                                                //$this->log($index, 'debug');
                                                $vastaus_kentatTable = TableRegistry::get('Vastaus_kentat');
                                                $vastaus_single = $vastaus_kentatTable->newEntity();
                                                $vastaus_single->kysymys_kentta_id  = $lastKysymyskenttaid;
                                                $vastaus_single->vastaus_id  = $lastVastausid;
                                                $vastaus_single->vastaus  = $value;
    
                                                $vastaus_kentatTable->save($vastaus_single);
                                                
                                            }
                                        }           
                                    }
                                }
                            }
                            
                        }
                        */

                    }
                    elseif ($kysymys[1] == 10) {
                        $vastauksetTable = TableRegistry::get('Vastaukset');

                        $vastaus_single = $vastauksetTable->newEntity();
                        $vastaus_single->kysymys_id = $kysymys[2];
                        $vastaus_single->vastauspvm = date('Y-m-d H:i:s');

                        foreach ($this->request->data['vastaus'] as $id => $vastaus) {

                            if ($id == $kysymys[2]) {

                                if (is_array($vastaus)) {
                                    foreach ($vastaus as $v) {
                                        $vastaus_single->vastaus = $v;
                                        break;
                                    }
                                }
                                
                            }
                            
                        }

                        $vastauksetTable->save($vastaus_single); 

                    }
                    elseif ($kysymys[1] == 5) {
                        /*
                        $vastauksetTable = TableRegistry::get('Vastaukset');

                        $vastaus_single = $vastauksetTable->newEntity();
                        $vastaus_single->kysymys_id = $kysymys[2];
                        $vastaus_single->vastauspvm = date('Y-m-d H:i:s');

                        $vastauksetTable->save($vastaus_single); 
                        $lastVastausid = $vastaus_single->id;

                        foreach ($this->request->data['vastaus'] as $id => $vastaus) {

                            if ($id == $kysymys[2]) {
                                if (is_array($vastaus)) {
                                    foreach ($vastaus as $resurssi_id => $v) {
                                        $this->log($resurssi_id, 'debug');

                                        if (is_array($v)) {
                                            foreach ($v as $index => $value) {
                                                $this->log($value . "-" .$index , 'debug');
                                                // loopataan kysymys_kentat
                                                
                                                $KysymysKentatTable = TableRegistry::get('Kysymys_kentat');
                                                $vastaus_single = $KysymysKentatTable->newEntity();
                                                $vastaus_single->kysymys_id = $kysymys[2];
                                                $vastaus_single->sarake_resurssi_id = $index;
                                                $vastaus_single->rivi_resurssi_id = $resurssi_id;
                                                $KysymysKentatTable->save($vastaus_single); 
                                                $lastKysymyskenttaid = $vastaus_single->id;
                                                //$this->log($index, 'debug');
                                                //$this->log($index, 'debug');
                                                $vastaus_kentatTable = TableRegistry::get('Vastaus_kentat');
                                                $vastaus_single = $vastaus_kentatTable->newEntity();
                                                $vastaus_single->kysymys_kentta_id  = $lastKysymyskenttaid;
                                                $vastaus_single->vastaus_id  = $lastVastausid;
                                                $vastaus_single->vastaus  = $value;
    
                                                $vastaus_kentatTable->save($vastaus_single);
                                                
                                            }
                                        }           
                                    }
                                }
                            }
                            
                        }
                        */
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
