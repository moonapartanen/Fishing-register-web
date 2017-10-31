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
class FormController extends AppController
{
    public function index()
    {
        if ($this->request->is("post")) {
            // SIIRRETÄÄN NÄMÄ TABLEEN KUNHAN TULEE ENEMMÄN DATAA
            $usersTable = TableRegistry::get('kayttajat');
            $currentUser = $usersTable->findById($this->Auth->user("id"))->first();
            
            $currentUser->status = "0";
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
