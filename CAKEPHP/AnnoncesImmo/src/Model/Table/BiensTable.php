<?php
namespace App\Model\Table;

use App\Model\Entity\Bien;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Biens Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Types
 * @property \Cake\ORM\Association\HasMany $Annonces
 * @property \Cake\ORM\Association\HasMany $Commentaires
 * @property \Cake\ORM\Association\HasMany $Images
 */
class BiensTable extends Table
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

        $this->table('biens');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Annonces', [
            'foreignKey' => 'bien_id'
        ]);
        $this->hasMany('Commentaires', [
            'foreignKey' => 'bien_id'
        ]);
        $this->hasMany('Images', [
            'foreignKey' => 'bien_id'
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
            ->requirePresence('adresse', 'create')
            ->notEmpty('adresse');

        $validator
            ->requirePresence('ville', 'create')
            ->notEmpty('ville');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->integer('nombredepieces')
            ->requirePresence('nombredepieces', 'create')
            ->notEmpty('nombredepieces');
            
         $validator
        ->integer('type_id')
        ->requirePresence('type_id', true)
        ->notEmpty('type_id');

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
        $rules->add($rules->existsIn(['type_id'], 'Types'));
        return $rules;
    }
}
