<?php
namespace App\Model\Table;

use App\Model\Entity\Student;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 */
class StudentsTable extends Table
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

        $this->table('students');
        $this->displayField('nom');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $regexNomPrenom = '/^[a-zA-Z0-9]{3,20}$/';
        $regexCP_FR = '/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/';
        
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nom')
            ->notEmpty('nom')
            ->add(
                'nom', 'validFormat', 
                [
                    'rule' =>  ['custom' ,  $regexNomPrenom] , 
                    'message' => 'Le nom ne doit contenir que des caractères alphanumériques  min 3 caractères, max 20 caractères'
                ]
            );

        $validator
            ->requirePresence('prenom', 'create')
            ->notEmpty('prenom')
            ->add(
                'prenom', 'validFormat', 
                [
                    'rule' => ['custom' ,  $regexNomPrenom] , 
                    'message' => 'Le nom ne doit contenir que des caractères alphanumériques min 3 caractères, max 20 caractères'
                ]
            );

        $validator
            ->date('datenaiss')
            ->requirePresence('datenaiss', 'create')
            ->notEmpty('datenaiss');

        $validator
            ->allowEmpty('rue');

        $validator
            ->allowEmpty('cp')
            ->add(
                'cp', 'validFormat', 
                [
                    'rule' => ['custom', $regexCP_FR] , 
                    'message' => 'Le code postal n\'est pas valide'
                ]
            );

        $validator
            ->allowEmpty('ville');

        $validator
            ->allowEmpty('image')
            ->add('file', 'checksize', [
                        'rule' => ['fileSize', '<=', '500KB'],
                        'message' => 'Taille image invalide'
                    ])
            ->add('file', 'checktype', [
                        'rule' => ['extension', ['gif', 'jpeg', 'png', 'jpg'] ],
                        'message' => 'Type image invalide'
                    ]);
                    
                    
            

        return $validator;
    }
}
