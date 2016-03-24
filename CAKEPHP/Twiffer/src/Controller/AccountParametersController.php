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
     * Form method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function form()
    {
        $tendances = $this->AccountParameters->Users->Tweets->HashTags->find('popular');
        $userId = $this->Auth->user('id');
        $user = $this->AccountParameters->Users->get($userId, ['contain' => 'AccountParameters']);
        
        $accountParameter = empty($user->account_parameters[0]) ? $this->AccountParameters->newEntity() : $user->account_parameters[0];
        
        if ($this->request->is(['post', 'put'])) {
            
            $data =  $this->request->data;
            $data['avatar_file_name'] = $data['file']['name'];
            $data['user_id'] = $this->Auth->user('id');
            $accountParameter = $this->AccountParameters->patchEntity($accountParameter, $data);
            if ($this->AccountParameters->save($accountParameter)) {

                move_uploaded_file( $data['file']['tmp_name'], 
                WWW_ROOT . '/img/' .  $data['file']['name']);

                $this->Flash->success(__('Les paramètres ont été sauvegardés'));
                return $this->redirect(['controller' => 'Users', 'action' => 'view']);
            } else {
                $this->Flash->error(__('Les paramètres n\'ont pas été sauvegardés. Veuillez rééssayer.'));
            }
        }
        $this->set(compact('accountParameter', 'tendances'));
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

   
}
