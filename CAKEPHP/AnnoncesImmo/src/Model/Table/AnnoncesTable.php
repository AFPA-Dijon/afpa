<?php
namespace App\Model\Table;

use App\Model\Entity\Annonce;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Annonces Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Biens
 */
class AnnoncesTable extends Table
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

        $this->table('annonces');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Biens', [
            'foreignKey' => 'bien_id',
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
            ->requirePresence('categorie', 'create')
            ->notEmpty('categorie');

        $validator
            ->date('datedeparution')
            ->requirePresence('datedeparution', 'create')
            ->notEmpty('datedeparution');

        $validator
            ->numeric('prix')
            ->requirePresence('prix', 'create')
            ->notEmpty('prix');
            
         $validator
            ->integer('user_id')
            ->requirePresence('user_id', true)
            ->notEmpty('user_id');
            
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
        $rules->add($rules->existsIn(['bien_id'], 'Biens'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
