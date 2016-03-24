<?php
namespace App\Model\Table;

use App\Model\Entity\HashtagsTweet;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HashtagsTweets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Tweets
 * @property \Cake\ORM\Association\BelongsTo $Hashtags
 */
class HashtagsTweetsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('hashtags_tweets');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Tweets', [
            'foreignKey' => 'tweet_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Hashtags', [
            'foreignKey' => 'hashtag_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['tweet_id'], 'Tweets'));
        $rules->add($rules->existsIn(['hashtag_id'], 'Hashtags'));
        return $rules;
    }
}
