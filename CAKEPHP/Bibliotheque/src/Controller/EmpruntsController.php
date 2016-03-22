<?php
namespace App\Controller;

use App\Controller\AppController;
/**
 * Emprunts Controller
 *
 * @property \App\Model\Table\EmpruntsTable $Emprunts
 */
class EmpruntsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $emprunts = $this->Emprunts->find('allWithOeuvresAndUsers');
        $emprunts = $this->paginate($emprunts);
        $this->set(compact('emprunts'));
    }

    /**
     * View method
     *
     * @param string|null $id Emprunt id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $emprunt = $this->Emprunts->get($id, [
            'contain' => ['Oeuvres', 'Users']
        ]);

        $this->set('emprunt', $emprunt);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $emprunt = $this->Emprunts->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            debug($data);
            $emprunt = $this->Emprunts->patchEntity($emprunt, $this->request->data);
            /*on s'assure que l'oeuvre sélectionnée existe et est disponible*/
            $oeuvre = $this->Emprunts->Oeuvres->get(
                $data['oeuvre_id'], 
                [
                    'where' => ['retour' => true]
                ]
            );
            /*on s'assure que l'utilisateur sélectionné existe et n'est pas admin*/
            $user = $this->Emprunts->Users->get(
                $data['user_id'], 
                [
                    'where' => ['role !=' => 'Admin']
                ]
            );
            if($oeuvre){
                $oeuvre->retour = false;
            }
            if ($oeuvre && $user && $this->Emprunts->save($emprunt) &&  $this->Emprunts->Oeuvres->save($oeuvre)) {
                
                $this->Flash->success(__('The emprunt has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The emprunt could not be saved. Please, try again.'));
            }
        }
        $oeuvres = $this->Emprunts->Oeuvres->find('list', ['limit' => 200])->where(['retour' => true]);
        $users = $this->Emprunts->Users->find('list', ['limit' => 200])->where(['role !=' => 'Admin']);
        $this->set(compact('emprunt', 'oeuvres', 'users'));
        $this->set('_serialize', ['emprunt']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Emprunt id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $emprunt = $this->Emprunts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emprunt = $this->Emprunts->patchEntity($emprunt, $this->request->data);
            if ($this->Emprunts->save($emprunt)) {
                $this->Flash->success(__('The emprunt has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The emprunt could not be saved. Please, try again.'));
            }
        }
        $oeuvres = $this->Emprunts->Oeuvres->find('list', ['limit' => 200]);
        $users = $this->Emprunts->Users->find('list', ['limit' => 200]);
        $this->set(compact('emprunt', 'oeuvres', 'users'));
        $this->set('_serialize', ['emprunt']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Emprunt id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emprunt = $this->Emprunts->get($id);
        if ($this->Emprunts->delete($emprunt)) {
            $this->Flash->success(__('The emprunt has been deleted.'));
        } else {
            $this->Flash->error(__('The emprunt could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
