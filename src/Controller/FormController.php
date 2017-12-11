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
            $vastauksetTable = TableRegistry::get('Vastaukset');
            
            foreach ($this->request->data['kysymys'] as $kysymysotsikko) {
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
                elseif ($kysymys[1] == 4) {
                    foreach ($this->request->data['vastaus'] as $id => $vastaus) {
                        if ($id == $kysymys[2]) {               
                            if (is_array($vastaus)) {
                                foreach ($vastaus as $index => $v) {
                                    $this->log($index, 'debug');
                                    $vastauksetTable = TableRegistry::get('Vastaukset');

                                    $vastaus_single = $vastauksetTable->newEntity();
                                    $vastaus_single->kysymys_id = $kysymys[2];
                                    $vastaus_single->vastauspvm = date('Y-m-d H:i:s');
                                    $vastaus_single->vastaus = $v;
                                    
                                    $vastauksetTable->save($vastaus_single); 
                                    $lastVastausid = $vastaus_single->id;
                                    
                                    $KysymysKentatTable = TableRegistry::get('Kysymys_kentat');
                                    $vastaus_single = $KysymysKentatTable->newEntity();
                                    $vastaus_single->kysymys_id = $kysymys[2];
                                    $KysymysKentatTable->save($vastaus_single); 
                                    $lastKysymyskenttaid = $vastaus_single->id;

                                    $vastaus_kentatTable = TableRegistry::get('Vastaus_kentat');
                                    $vastaus_single = $vastaus_kentatTable->newEntity();
                                    $vastaus_single->kysymys_kentta_id  = $lastKysymyskenttaid;
                                    $vastaus_single->vastaus_id  = $lastVastausid;
                                    $vastaus_single->vastaus  = $index;

                                    $vastaus_kentatTable->save($vastaus_single);          
                                }
                            }
                        }
                    }                        
                }
                elseif ($kysymys[1] == 5 || $kysymys[1] == 6) {
                    
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
                                            
                                            $KysymysKentatTable = TableRegistry::get('Kysymys_kentat');
                                            $vastaus_single = $KysymysKentatTable->newEntity();
                                            $vastaus_single->kysymys_id = $kysymys[2];
                     
                                            if ($kysymys[1] == 5) {
                                                $vastaus_single->sarake_resurssi_id = $index;
                                            }
                     
                                            $vastaus_single->rivi_resurssi_id = $resurssi_id;
                                            $KysymysKentatTable->save($vastaus_single); 
                                            $lastKysymyskenttaid = $vastaus_single->id;

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
                }
                elseif($kysymys[1] == 8) {

                    $vastauksetTable = TableRegistry::get('Vastaukset');

                    $vastaus_single = $vastauksetTable->newEntity();
                    $vastaus_single->kysymys_id = $kysymys[2];
                    $vastaus_single->vastauspvm = date('Y-m-d H:i:s');

                    $vastauksetTable->save($vastaus_single); 
                    $lastVastausid = $vastaus_single->id;

                    foreach ($this->request->data['vastaus'] as $id => $vastaus) {
                        if ($id == $kysymys[2]) {
                            if (is_array($vastaus)) {
                                foreach ($vastaus as $index => $value) {
                                    // loopataan kysymys_kentat
                                    $KysymysKentatTable = TableRegistry::get('Kysymys_kentat');
                                    $vastaus_single = $KysymysKentatTable->newEntity();
                                    $vastaus_single->kysymys_id = $kysymys[2];
                                    $vastaus_single->sarake_resurssi_id = $index;
                                    $KysymysKentatTable->save($vastaus_single); 
                                    $lastKysymyskenttaid = $vastaus_single->id;

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
                elseif ($kysymys[1] == 9) {
                    
                    $vastauksetTable = TableRegistry::get('Vastaukset');

                    $vastaus_single = $vastauksetTable->newEntity();
                    $vastaus_single->kysymys_id = $kysymys[2];
                    $vastaus_single->vastauspvm = date('Y-m-d H:i:s');

                    $vastauksetTable->save($vastaus_single); 
                    $lastVastausid = $vastaus_single->id;

                    foreach ($this->request->data['vastaus'] as $id => $vastaus) {

                        if ($id == $kysymys[2]) {
                            if (is_array($vastaus)) {
                                foreach ($vastaus as $v) {
                                    if (is_array($v)) {
                                        foreach ($v as $index => $value) {

                                            $KysymysKentatTable = TableRegistry::get('Kysymys_kentat');
                                            $vastaus_single = $KysymysKentatTable->newEntity();
                                            $vastaus_single->kysymys_id = $kysymys[2];
                                            $vastaus_single->rivi_resurssi_id = $index;
                                            $KysymysKentatTable->save($vastaus_single); 
                                            $lastKysymyskenttaid = $vastaus_single->id;

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
            }

            $this->loadModel('Kayttajat');
            $currentUser = $this->Kayttajat->findById($this->Auth->user("id"))->first();
            $currentUser->status = "0";
            $this->Kayttajat->save($currentUser);
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
