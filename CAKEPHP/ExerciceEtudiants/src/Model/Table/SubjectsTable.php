<?php
namespace App\Model\Table;

use App\Model\Entity\Subject;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subjects Model
 *
 * @property \Cake\ORM\Association\HasMany $Tests
 */
class SubjectsTable extends Table
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

        $this->table('subjects');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Tests', [
            'foreignKey' => 'subject_id'
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
        $regexCodeMat = '/^[A-Z]{3}$/';
        $regexLibelle = '/^[a-zA-Z" *"]{3,}$/';
        
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('codemat')
            ->notEmpty('codemat')
            ->add('codemat', 'validFormat', ['rule' => ['custom', $regexCodeMat], 'message' => 'Code Matière non-valide (trigramme en majuscule)'])
            ->add('codemat', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('libelle')
            ->notEmpty('libelle')            
            ->add('libelle', 'validFormat', ['rule' => ['custom', $regexLibelle], 'message' => 'Libellé non-valide (min 3 lettres, pas de chiffres)'])
            ->add('libelle', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->numeric('coeff')
            ->requirePresence('coeff')
            ->notEmpty('coeff');

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
        $rules->add($rules->isUnique(['codemat'], 'Ce code sexiste déjà'));
        $rules->add($rules->isUnique(['libelle'], 'Ce libellé existe déjà'));
        return $rules;
    }
}
