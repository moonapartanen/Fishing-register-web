<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if ($this->Auth->user("active") == 1) {
                    return $this->redirect(['controller' => 'surveys']);
                }
                else {
                    $this->Flash->error('Tilisi ei ole aktiivinen');
                    $this->Auth->logout();
                }
            } else {
                $this->Flash->error('Käyttäjätunnus tai salasana on väärä');
            }
        }
    }

    public function logout()
    {
        $this->Flash->success('Uloskirjautuminen onnistui!');
        return $this->redirect($this->Auth->logout());
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
        
        $this->Auth->config('authenticate', [
            'Form' => ['userModel' => 'Kayttajat']
        ]);
    }

    public function index()
    {
        $this->redirect(['controller' => 'surveys']);
    } 

}
