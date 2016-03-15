<?php
namespace App\Controller;

use Cake\Event\Event;

class UsersController extends AppController {
    
     public function beforeFilter(Event $event){
        $this->Auth->allow(['add']);
    }
    /*Page d'inscription*/
    public function add(){
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__("L'utilisateur a été sauvegardé."));
                return $this->redirect(['action' => 'login  ']);
            }
            $this->Flash->error(__("Impossible d'ajouter l'utilisateur."));
        }
        $this->set('user', $user);
    }
    
    
    public function login(){
            
        if ($this->request->is('post')) {
            /*Identification , cherche l'utilisateur et renvoie une entité*/
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__("Nom d'utilisateur ou mot de passe incorrect, essayez à nouveau."));
        }
    }
    
    public function logout(){
        $this->redirect($this->Auth->logout());
    }
    
    
}