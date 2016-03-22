<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Editeurs Controller
 *
 * @property \App\Model\Table\EditeursTable $Editeurs
 */
class EditeursController extends AppController
{
    public function isAuthorized($user = null)
    {
        if(isset($user['role']) && $user['role'] !== $this->roles['Admin']){
            if($this->request->action === 'view'){
                return false;
            }
        }
        // Par défaut n'autorise pas
        return parent::isAuthorized($user);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $editeurs = $this->paginate($this->Editeurs);
        $this->set(compact('editeurs'));
        $this->set('_serialize', ['editeurs']);
    }

    /**
     * View method
     *
     * @param string|null $id Editeur id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $editeur = $this->Editeurs->get($id, [
            'contain' => ['Oeuvres']
        ]);

        $this->set('editeur', $editeur);
        $this->set('_serialize', ['editeur']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $editeur = $this->Editeurs->newEntity();
        if ($this->request->is('post')) {
            $editeur = $this->Editeurs->patchEntity($editeur, $this->request->data);
            if ($this->Editeurs->save($editeur)) {
                $this->Flash->success(__('The editeur has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The editeur could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('editeur'));
        $this->set('_serialize', ['editeur']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Editeur id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $editeur = $this->Editeurs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $editeur = $this->Editeurs->patchEntity($editeur, $this->request->data);
            if ($this->Editeurs->save($editeur)) {
                $this->Flash->success(__('The editeur has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The editeur could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('editeur'));
        $this->set('_serialize', ['editeur']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Editeur id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $editeur = $this->Editeurs->get($id);
        if ($this->Editeurs->delete($editeur)) {
            $this->Flash->success(__('The editeur has been deleted.'));
        } else {
            $this->Flash->error(__('The editeur could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
