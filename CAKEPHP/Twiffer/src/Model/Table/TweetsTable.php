<?php
namespace App\Model\Table;

use App\Model\Entity\Tweet;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tweets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsToMany $Hashtags
 */
class TweetsTable extends Table
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

        $this->table('tweets');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Hashtags', [
            'foreignKey' => 'tweet_id',
            'targetForeignKey' => 'hashtag_id',
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
            ->requirePresence('content', 'create')
            ->notEmpty('content')
            ->add('content', [
                'length' => [
                    'rule' => ['maxLength', 144 ],
                    'message' => '144 caractères maximum',
                ]
            ]);

        $validator
            ->requirePresence('formatted_content', 'create')
            ->notEmpty('formatted_content');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
    
    /*Finders*/
    
    public function findByHashtag(Query $query, array $options){
        return $query->matching( 'Hashtags', function ($q) use ($options)  {
                return $q->where(['Hashtags.name' => $options['hashtag']]);
            }
        );
    }
    
    
}
