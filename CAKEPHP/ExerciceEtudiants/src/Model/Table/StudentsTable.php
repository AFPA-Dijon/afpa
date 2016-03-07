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
        $this->displayField('id');
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
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->requirePresence('prenom', 'create')
            ->notEmpty('prenom');

        $validator
            ->date('datenaiss')
            ->requirePresence('datenaiss', 'create')
            ->notEmpty('datenaiss');

        $validator
            ->allowEmpty('rue');

        $validator
            ->integer('cp')
            ->allowEmpty('cp');

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
