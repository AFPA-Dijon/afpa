<?php
namespace App\Model\Table;

use App\Model\Entity\StudentsTest;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudentsTests Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Students
 * @property \Cake\ORM\Association\BelongsTo $Tests
 */
class StudentsTestsTable extends Table
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

        $this->table('students_tests');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tests', [
            'foreignKey' => 'test_id',
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

        $validator
            ->numeric('note')
            ->requirePresence('note', 'create')
            ->notEmpty('note')
            ->add('note', 'validValue', [
                'rule' => ['range', 0, 20],
                'message' => 'Veuillez saisir une note entre 0 et 20'
            ]);

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
        $rules->add($rules->existsIn(['student_id'], 'Students'));
        $rules->add($rules->existsIn(['test_id'], 'Tests'));
        $rules->add($rules->isUnique(['student_id', 'test_id'], 'Cet étudiant a déja participé à cet examen'));
        return $rules;
    }
    
    /** 
     * Finders
    */
    
    public function findParticipations(Query $query, array $options){
        return $query
            ->contain(
                    [
                        'Students'  => function ($q) {
                           return $q->select(['nom', 'prenom']);
                        },
                        'Tests.Subjects' => function ($q) {
                           return $q->select(['Tests.datepreuve', 'Tests.lieu', 'Subjects.codemat']);
                        }
                    ]
            )
            ->hydrate(false);
    }
    
    public function findParticipationsForStudent(Query $query, array $options){
         return $query
            ->contain(
                    [
                        'Tests' => function ($q) {
                           return $q->select(['Tests.datepreuve']);
                        },
                        'Tests.Subjects' => function ($q) {
                           return $q->select([ 'Subjects.libelle', 'Subjects.coeff']);
                        }
                    ]
            )
            ->where($options)->hydrate(false);
    }
    
    
     
}
