<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hashtags Controller
 *
 * @property \App\Model\Table\HashtagsTable $Hashtags
 */
class HashtagsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $hashtags = $this->paginate($this->Hashtags);

        $this->set(compact('hashtags'));
        $this->set('_serialize', ['hashtags']);
    }

    /**
     * View method
     *
     * @param string|null $id Hashtag id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hashtag = $this->Hashtags->get($id, [
            'contain' => ['Tweets']
        ]);

        $this->set('hashtag', $hashtag);
        $this->set('_serialize', ['hashtag']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hashtag = $this->Hashtags->newEntity();
        if ($this->request->is('post')) {
            $hashtag = $this->Hashtags->patchEntity($hashtag, $this->request->data);
            if ($this->Hashtags->save($hashtag)) {
                $this->Flash->success(__('The hashtag has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hashtag could not be saved. Please, try again.'));
            }
        }
        $tweets = $this->Hashtags->Tweets->find('list', ['limit' => 200]);
        $this->set(compact('hashtag', 'tweets'));
        $this->set('_serialize', ['hashtag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hashtag id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hashtag = $this->Hashtags->get($id, [
            'contain' => ['Tweets']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hashtag = $this->Hashtags->patchEntity($hashtag, $this->request->data);
            if ($this->Hashtags->save($hashtag)) {
                $this->Flash->success(__('The hashtag has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hashtag could not be saved. Please, try again.'));
            }
        }
        $tweets = $this->Hashtags->Tweets->find('list', ['limit' => 200]);
        $this->set(compact('hashtag', 'tweets'));
        $this->set('_serialize', ['hashtag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hashtag id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hashtag = $this->Hashtags->get($id);
        if ($this->Hashtags->delete($hashtag)) {
            $this->Flash->success(__('The hashtag has been deleted.'));
        } else {
            $this->Flash->error(__('The hashtag could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
