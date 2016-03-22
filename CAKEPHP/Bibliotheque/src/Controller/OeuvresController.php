<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Oeuvres Controller
 *
 * @property \App\Model\Table\OeuvresTable $Oeuvres
 */
class OeuvresController extends AppController
{
    
    public function beforeFilter(Event $event){
        $this->Auth->allow(['index']);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        
        $this->paginate = [
            'contain' => ['Editeurs']
        ];
        $oeuvres = $this->paginate($this->Oeuvres);

        $this->set(compact('oeuvres'));
        $this->set('_serialize', ['oeuvres']);
    }

    /**
     * View method
     *
     * @param string|null $id Oeuvre id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $oeuvre = $this->Oeuvres->get($id, [
            'contain' => ['Editeurs', 'Auteurs', 'Emprunts']
        ]);

        $this->set('oeuvre', $oeuvre);
        $this->set('_serialize', ['oeuvre']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $oeuvre = $this->Oeuvres->newEntity();
        if ($this->request->is('post')) {
            $oeuvre = $this->Oeuvres->patchEntity($oeuvre, $this->request->data);
            if ($this->Oeuvres->save($oeuvre)) {
                $this->Flash->success(__('The oeuvre has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The oeuvre could not be saved. Please, try again.'));
            }
        }
        $editeurs = $this->Oeuvres->Editeurs->find('list', ['limit' => 200]);
        $auteurs = $this->Oeuvres->Auteurs->find('list', ['limit' => 200]);
        $this->set(compact('oeuvre', 'editeurs', 'auteurs'));
        $this->set('_serialize', ['oeuvre']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Oeuvre id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $oeuvre = $this->Oeuvres->get($id, [
            'contain' => ['Auteurs']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $oeuvre = $this->Oeuvres->patchEntity($oeuvre, $this->request->data);
            if ($this->Oeuvres->save($oeuvre)) {
                $this->Flash->success(__('The oeuvre has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The oeuvre could not be saved. Please, try again.'));
            }
        }
        $editeurs = $this->Oeuvres->Editeurs->find('list', ['limit' => 200]);
        $auteurs = $this->Oeuvres->Auteurs->find('list', ['limit' => 200]);
        $this->set(compact('oeuvre', 'editeurs', 'auteurs'));
        $this->set('_serialize', ['oeuvre']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Oeuvre id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $oeuvre = $this->Oeuvres->get($id);
        if ($this->Oeuvres->delete($oeuvre)) {
            $this->Flash->success(__('The oeuvre has been deleted.'));
        } else {
            $this->Flash->error(__('The oeuvre could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
