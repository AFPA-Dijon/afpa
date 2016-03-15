<?php
namespace App\Model\Table;

use App\Model\Entity\Country;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Countries Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cities
 * @property \Cake\ORM\Association\HasMany $Cities
 * @property \Cake\ORM\Association\HasMany $Languages
 */
class CountriesTable extends Table
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

        $this->table('countries');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id'
        ]);
        $this->hasMany('Cities', [
            'foreignKey' => 'country_id'
        ]);
        $this->hasMany('Languages', [
            'foreignKey' => 'country_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('continent', 'create')
            ->notEmpty('continent');

        $validator
            ->requirePresence('region', 'create')
            ->notEmpty('region');

        $validator
            ->numeric('surface_area')
            ->requirePresence('surface_area', 'create')
            ->notEmpty('surface_area');

        $validator
            ->integer('independence_year')
            ->allowEmpty('independence_year');

        $validator
            ->integer('population')
            ->requirePresence('population', 'create')
            ->notEmpty('population');

        $validator
            ->numeric('life_expectancy')
            ->allowEmpty('life_expectancy');

        $validator
            ->numeric('gnp')
            ->allowEmpty('gnp');

        $validator
            ->requirePresence('local_name', 'create')
            ->notEmpty('local_name');

        $validator
            ->requirePresence('government_form', 'create')
            ->notEmpty('government_form');

        $validator
            ->allowEmpty('head_of_state');

        $validator
            ->requirePresence('code', 'create')
            ->notEmpty('code');

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
        $rules->add($rules->existsIn(['city_id'], 'Cities'));
        return $rules;
    }
    
    /*Finders*/
    
    public function findBiggestMonarchies(Query $query){
        return $query->select(['name', 'population', 'government_form'])
                     ->where(['government_form LIKE' => '%Monarchy%'])
                     ->order(['population' => 'DESC']);
                     
    }
    
     public function findRepublics(Query $query){
        return $query->select(['name', 'population', 'government_form', 'life_expectancy'])
                     ->where(['government_form LIKE' => '%Republic%'])
                     ->order(['population' => 'DESC']);
    }
    
    public function findWorldLifeExpectancy(Query $query){
        return $query->select(['avg' => $query->func()->avg('life_expectancy')]);
    }
    
    public function findRepublicsHighLifeExpectancy(Query $query, array $options){
        return $query->where(['government_form LIKE'=>'%republic%', 'life_expectancy >='=> $options['expectancy']])
                     ->order(['life_expectancy' => 'DESC']);
    }
    
    public function findCountriesWithOfficialLanguage(Query $query, array $options){
       return $query->select(['Countries.name'])->matching(
           'Languages',
           function ($q) use ($options) {
               return $q->select(['Languages.language'])
                        ->where(['Languages.is_official' => true, 'Languages.language' => $options['language']]);
           }
       );
    }
    
    public function findCountriesWithProbability(Query $query, array $options){
        $query->select(['Countries.name', 'Languages.percentage'])
                     ->matching(
                         'Languages',
                         function ($q) use ($options) {
                             return $q->where( 
                                    [
                                        'Languages.percentage >=' => $options['percentage'], 
                                        'Languages.language' => $options['language'] 
                                    ]
                            );
                         }
                     );
        return $query;
    }
    
   
    
   
    
    
}
