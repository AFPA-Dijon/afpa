<?php
namespace App\Model\Table;

use App\Model\Entity\Hashtag;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hashtags Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Tweets
 */
class HashtagsTable extends Table
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

        $this->table('hashtags');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsToMany('Tweets', [
            'foreignKey' => 'hashtag_id',
            'targetForeignKey' => 'tweet_id',
            'joinTable' => 'hashtags_tweets'
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

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('counter')
            ->requirePresence('counter', 'create')
            ->notEmpty('counter');

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
        $rules->add($rules->isUnique(['name']));
        return $rules;
    }
    
    /*Finders*/
    
    
    /**
     * Trouve les hashtags par nom
     * @param $query Query
     * @param $options array: must contain a 'name' index
    */
    public function findHashtagsByName(Query $query, array $options){
        return $query->where(['name' => $options['name']]);
    }
    
    /**
     * Trouve les hashtags les plus populaires
     * @param $query la requête
     * @return la requête
    */
    public function findPopular(Query $query){
        return $query->order(['Hashtags.counter' => 'DESC'])
                     ->limit(8);
    }
    
}
