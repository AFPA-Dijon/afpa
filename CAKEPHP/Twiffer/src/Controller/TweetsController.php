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
    public function index($hashTagFilter = null)
    {
        $tendances = $this->Tweets->HashTags->find('popular');
        $tweets = $this->Tweets->find()->contain(['Users.AccountParameters'])->order(['Tweets.created' => 'DESC']);
        if(!empty($hashTagFilter)){
            $tweets->find('byHashtag', ['hashtag' => $hashTagFilter]);
        }
        
        
        $newTweet = $this->Tweets->newEntity();
        if($this->request->is('post') && $this->Auth->user()){
            $data = $this->request->data;
            $data['user_id'] = $this->Auth->user('id');
            $data['formatted_content'] = $this->formatContent($data['content']);
            
            $newTweet = $this->Tweets->patchEntity($newTweet, $data);
            $newTweet = $this->Tweets->save($newTweet);
            if($newTweet){
                $hashtags = $this->extractHashTags($data['content'], false);
                $this->insertHashTags($hashtags, $newTweet->id);
                $this->Flash->success('Le nouveau tweet a bien été créé');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Erreur lors de la création du nouveau tweet');
            }
        }

        $this->set(compact('tweets', 'newTweet', 'tendances'));
    }
    
    
    
     /**
     * Extract hashtags from tweet content
     *
     * @param string $content the content
     * @param boolean $withSharp the content
     * @return array the hashtags as strings
     */
    private function extractHashTags($content, $withSharp = null){
        preg_match_all($this->regexHashtag2, $content, $hashtags);
        if($withSharp === null){
            return $hashtags;
        }
        return $withSharp ? $hashtags[0]:  $hashtags[1];
    }
    
    /**
     * Insert or update hashtags from tweet content
     *
     * @param string $content the content
     * @return array the hashtags as strings
     */
    private function insertHashTags($hashtags, $tweetId){
        foreach($hashtags as $hashtag){
            $entity = $this->Tweets->HashTags->find('hashtagsByName', ['name' => $hashtag])->first();

            if($entity){//si le hashtag existe déjà
                $entity->counter++;
            } else {
               $entity = $this->Tweets->HashTags->newEntity();
               $entity->name = $hashtag;
               $entity->counter = 1;
            }
            $newHashTag = $this->Tweets->HashTags->save($entity);
            if($newHashTag){
                $hashtagTweet = $this->Tweets->HashtagsTweets->newEntity();
                $hashtagTweet->tweet_id = $tweetId;
                $hashtagTweet->hashtag_id = $newHashTag->id;
                $this->Tweets->HashtagsTweets->save($hashtagTweet);
            }
            
        }
    }
    
    
    /**
     * Format tweet content (replace hashtags with links)
     *
     * @param string $content the content to format
     * @return string the formatted_content
     */
    private function formatContent($content){
       $hashtags = $this->extractHashTags($content);
       $direction = "/org/afpa/CAKEPHP/Twiffer/tweets/index/";
       foreach($hashtags[0] as $key => $hashtag){
           $replace = '<a href="'.$direction.$hashtags[1][$key].'">'.$hashtag.'</a>';
           $content = str_replace($hashtag, $replace, $content);
       }
       return $content;
    }
    
   
}
