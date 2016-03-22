<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AccountParameters Controller
 *
 * @property \App\Model\Table\AccountParametersTable $AccountParameters
 */
class AccountParametersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $accountParameters = $this->paginate($this->AccountParameters);

        $this->set(compact('accountParameters'));
        $this->set('_serialize', ['accountParameters']);
    }

    /**
     * View method
     *
     * @param string|null $id Account Parameter id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accountParameter = $this->AccountParameters->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('accountParameter', $accountParameter);
        $this->set('_serialize', ['accountParameter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $accountParameter = $this->AccountParameters->newEntity();
        if ($this->request->is('post')) {
            $accountParameter = $this->AccountParameters->patchEntity($accountParameter, $this->request->data);
            if ($this->AccountParameters->save($accountParameter)) {
                $this->Flash->success(__('The account parameter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The account parameter could not be saved. Please, try again.'));
            }
        }
        $users = $this->AccountParameters->Users->find('list', ['limit' => 200]);
        $this->set(compact('accountParameter', 'users'));
        $this->set('_serialize', ['accountParameter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Account Parameter id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accountParameter = $this->AccountParameters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accountParameter = $this->AccountParameters->patchEntity($accountParameter, $this->request->data);
            if ($this->AccountParameters->save($accountParameter)) {
                $this->Flash->success(__('The account parameter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The account parameter could not be saved. Please, try again.'));
            }
        }
        $users = $this->AccountParameters->Users->find('list', ['limit' => 200]);
        $this->set(compact('accountParameter', 'users'));
        $this->set('_serialize', ['accountParameter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Account Parameter id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accountParameter = $this->AccountParameters->get($id);
        if ($this->AccountParameters->delete($accountParameter)) {
            $this->Flash->success(__('The account parameter has been deleted.'));
        } else {
            $this->Flash->error(__('The account parameter could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
