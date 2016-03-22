<?php
namespace App\Model\Table;

use App\Model\Entity\Emprunt;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Emprunts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Oeuvres
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class EmpruntsTable extends Table
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

        $this->table('emprunts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Oeuvres', [
            'foreignKey' => 'oeuvre_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->date('dateemprunt')
            ->requirePresence('dateemprunt', 'create')
            ->notEmpty('dateemprunt');

        $validator
            ->date('dateretour')
            ->allowEmpty('dateretour');

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
        $rules->add($rules->existsIn(['oeuvre_id'], 'Oeuvres'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
    
    /*Finders*/
    public function findAllWithOeuvresAndUsers(Query $query){
        return $query->contain(['Oeuvres', 'Users']);
    }
}
