<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Tweets Controller
 *
 * @property \App\Model\Table\TweetsTable $Tweets
 */
class TweetsController extends AppController
{
    
    private $regexHashtag = '/#([^#]+)[,;]*/';
    private $regexHashtag2 = '/#([\w]{1,})/';
    
     /**
     * Before filter callback.
     *
     * @param \Cake\Event\Event $event The beforeFilter event.
     * @return void
     */
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
            'contain' => ['Users']
        ];
        $tweets = $this->paginate($this->Tweets);
        
        $newTweet = $this->Tweets->newEntity();
        if($this->request->is('post')){
            $data = $this->request->data;
            $data['user_id'] = $this->Auth->user('id');
            
            $hashtags = $this->extractHashTags($data['content']);
            debug($hashtags);die;
            
            $data = $this->Tweets->patchEntity($newTweet, $data);
            
            if($this->Tweets->save($newTweet)){
                $this->Flash->success('Le nouveau tweet a bien été créé');
            } else {
                $this->Flash->error('Erreur lors de la création du nouveau tweet');
            }
        }

        $this->set(compact('tweets', 'newTweet'));
        $this->set('_serialize', ['tweets']);
    }
    
    
    
     /**
     * Extract hashtags from tweet content
     *
     * @param string $content the content
     * @return array the hashtags as strings
     */
    private function extractHashTags($content){
        preg_match_all($this->regexHashtag2, $content, $hashtags);
        return $hashtags;
    }
    
    
    /**
     * Format tweet content (replace hashtags with links)
     *
     * @param string $content the content to format
     * @return string the formatted_content
     */
    private function formatContent($content){
        
    }
    
   
}
