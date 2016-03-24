<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $AccountParameters
 * @property \Cake\ORM\Association\HasMany $Tweets
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('AccountParameters', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Tweets', [
            'foreignKey' => 'user_id'
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
    
         /*autorise de 4 à 14 caractères de type :  
        *(a-z) alphanumérique minuscule, 
        * (A-Z) alphanumérique majuscule,
        *(0-9) 0 à 9, (_-) l’underscore et le tiret.
        */
        $regexUsername = '/^[a-zA-Z0-9_-]{4,14}$/';
        
        
        /*autorise de 8 à 12 caractères de type :
        *(a-z) alphanumérique minuscule,
        *(A-Z) alphanumérique majuscule,
        *(0-9) chiffres de 0 à 9,
        *(?@.;:!_-) les caractères ? @ . ; : ! _ et - 
        */
        $regexPassword = ' /^[a-zA-Z0-9?@\.;:!_-]{8,12}$/';
        
        
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add(
                'username', 'validFormat', 
                [
                    'rule' =>  ['custom' ,  $regexUsername] , 
                    'message' => 'Le nom d\'utilisateur autorise de 8 à 12 caractères de type :
                                (a-z) alphanumérique minuscule,
                                (A-Z) alphanumérique majuscule,
                                (0-9) chiffres de 0 à 9,
                                (?@.;:!_-) les caractères ? @ . ; : ! _ et - '
                ]
            );

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password')
            ->add(
                'password','validFormat',
                [
                    'rule' => ['custom' , $regexPassword] ,
                    'message' => 'Le mot de passe autorise de 8 à 12 caractères de type :
                    (a-z) alphanumérique minuscule,
                    (A-Z) alphanumérique majuscule,
                    (0-9) chiffres de 0 à 9,
                    (?@.;:!_-) les caractères ? @ . ; : ! _ et -  '
                    
                ]
                
            );

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

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
        $rules->add($rules->isUnique(['username'], 'Ce nom est déjà pris'));
        $rules->add($rules->isUnique(['email']), 'Cette adresse est déjà utilisée');
        return $rules;
    }
}
