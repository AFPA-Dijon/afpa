<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tweets Controller
 *
 * @property \App\Model\Table\TweetsTable $Tweets
 */
class TweetsController extends AppController
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
        $tweets = $this->paginate($this->Tweets);

        $this->set(compact('tweets'));
        $this->set('_serialize', ['tweets']);
    }

    /**
     * View method
     *
     * @param string|null $id Tweet id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tweet = $this->Tweets->get($id, [
            'contain' => ['Users', 'Hashtags']
        ]);

        $this->set('tweet', $tweet);
        $this->set('_serialize', ['tweet']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tweet = $this->Tweets->newEntity();
        if ($this->request->is('post')) {
            $tweet = $this->Tweets->patchEntity($tweet, $this->request->data);
            if ($this->Tweets->save($tweet)) {
                $this->Flash->success(__('The tweet has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tweet could not be saved. Please, try again.'));
            }
        }
        $users = $this->Tweets->Users->find('list', ['limit' => 200]);
        $hashtags = $this->Tweets->Hashtags->find('list', ['limit' => 200]);
        $this->set(compact('tweet', 'users', 'hashtags'));
        $this->set('_serialize', ['tweet']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tweet id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tweet = $this->Tweets->get($id, [
            'contain' => ['Hashtags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tweet = $this->Tweets->patchEntity($tweet, $this->request->data);
            if ($this->Tweets->save($tweet)) {
                $this->Flash->success(__('The tweet has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tweet could not be saved. Please, try again.'));
            }
        }
        $users = $this->Tweets->Users->find('list', ['limit' => 200]);
        $hashtags = $this->Tweets->Hashtags->find('list', ['limit' => 200]);
        $this->set(compact('tweet', 'users', 'hashtags'));
        $this->set('_serialize', ['tweet']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tweet id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tweet = $this->Tweets->get($id);
        if ($this->Tweets->delete($tweet)) {
            $this->Flash->success(__('The tweet has been deleted.'));
        } else {
            $this->Flash->error(__('The tweet could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
