<?php
namespace App\Model\Table;

use App\Model\Entity\Oeuvre;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Oeuvres Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Editeurs
 * @property \Cake\ORM\Association\HasMany $Emprunts
 * @property \Cake\ORM\Association\BelongsToMany $Auteurs
 */
class OeuvresTable extends Table
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

        $this->table('oeuvres');
        $this->displayField('titre');
        $this->primaryKey('id');

        $this->belongsTo('Editeurs', [
            'foreignKey' => 'editeur_id'
        ]);
        $this->hasMany('Emprunts', [
            'foreignKey' => 'oeuvre_id'
        ]);
        $this->belongsToMany('Auteurs', [
            'foreignKey' => 'oeuvre_id',
            'targetForeignKey' => 'auteur_id',
            'joinTable' => 'auteurs_oeuvres'
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
            ->requirePresence('titre', 'create')
            ->notEmpty('titre');

        $validator
            ->integer('codeISBN')
            ->requirePresence('codeISBN', 'create')
            ->notEmpty('codeISBN');

        $validator
            ->date('parution')
            ->requirePresence('parution', 'create')
            ->notEmpty('parution');

        $validator
            ->requirePresence('format', 'create')
            ->notEmpty('format');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('langue', 'create')
            ->notEmpty('langue');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->requirePresence('genre', 'create')
            ->notEmpty('genre');

        $validator
            ->allowEmpty('front');

        $validator
            ->allowEmpty('back');

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
        $rules->add($rules->existsIn(['editeur_id'], 'Editeurs'));
        return $rules;
    }
}
