<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
     /**
     * Before filter callback.
     *
     * @param \Cake\Event\Event $event The beforeFilter event.
     * @return void
     */
    public function beforeFilter(Event $event){
        $this->Auth->allow(['signin', 'login', 'view']);
    }

    /**
     * Login method
     *
     * @return \Cake\Network\Response|null
     */
     public function login(){
         
        if ($this->request->is('post')) {
           $user = $this->Auth->identify();
           if($user){
               $this->Auth->setUser($user);
               $this->Flash->success('Bienvenue '. $user->username);
               return $this->redirect($this->Auth->redirectUrl());
           } else {
               $this->Flash->error('Identifiants incorrects');
           }
        }
     }
     
     /**
     * Logout method
     *
     * @return \Cake\Network\Response|null
     */
     public function logout(){
         $this->Auth->logout();
         return $this->redirect($this->Auth->redirectUrl());
     }
   

    /**
     * View method
     * Profil de l'utilisateur
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user()){
            if(!$id){
                $id = $this->Auth->user('id');
            }
        } else {
            if(!$id){
                return $this->redirect(['controller' => 'Tweets', 'action' => 'index']);
            }
        }
        if(!$id){
            $id = $this->Auth->user('id');
        }
        $user = $this->Users->get($id, [
            'contain' => ['AccountParameters', 'Tweets']
        ]);
        $this->set('user', $user);
    }

    /**
     * Formulaire d'inscription
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function signin()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
    }

}
