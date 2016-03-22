<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Auteurs Controller
 *
 * @property \App\Model\Table\AuteursTable $Auteurs
 */
class AuteursController extends AppController
{

    public function beforeFilter(Event $event){
        $this->Auth->allow(['index', 'view']);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $auteurs = $this->paginate($this->Auteurs);

        $this->set(compact('auteurs'));
        $this->set('_serialize', ['auteurs']);
    }

    /**
     * View method
     *
     * @param string|null $id Auteur id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auteur = $this->Auteurs->get($id, [
            'contain' => ['Oeuvres']
        ]);

        $this->set('auteur', $auteur);
        $this->set('_serialize', ['auteur']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $auteur = $this->Auteurs->newEntity();
        if ($this->request->is('post')) {
            $auteur = $this->Auteurs->patchEntity($auteur, $this->request->data);
            if ($this->Auteurs->save($auteur)) {
                $this->Flash->success(__('The auteur has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The auteur could not be saved. Please, try again.'));
            }
        }
        $oeuvres = $this->Auteurs->Oeuvres->find('list', ['limit' => 200]);
        $this->set(compact('auteur', 'oeuvres'));
        $this->set('_serialize', ['auteur']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Auteur id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $auteur = $this->Auteurs->get($id, [
            'contain' => ['Oeuvres']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $auteur = $this->Auteurs->patchEntity($auteur, $this->request->data);
            if ($this->Auteurs->save($auteur)) {
                $this->Flash->success(__('The auteur has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The auteur could not be saved. Please, try again.'));
            }
        }
        $oeuvres = $this->Auteurs->Oeuvres->find('list', ['limit' => 200]);
        $this->set(compact('auteur', 'oeuvres'));
        $this->set('_serialize', ['auteur']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Auteur id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $auteur = $this->Auteurs->get($id);
        if ($this->Auteurs->delete($auteur)) {
            $this->Flash->success(__('The auteur has been deleted.'));
        } else {
            $this->Flash->error(__('The auteur could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
