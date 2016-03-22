<?php
namespace App\Model\Table;

use App\Model\Entity\Auteur;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Auteurs Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Oeuvres
 */
class AuteursTable extends Table
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

        $this->table('auteurs');
        $this->displayField('full_name');
        $this->primaryKey('id');

        $this->belongsToMany('Oeuvres', [
            'foreignKey' => 'auteur_id',
            'targetForeignKey' => 'oeuvre_id',
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
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->requirePresence('prenom', 'create')
            ->notEmpty('prenom');

        $validator
            ->allowEmpty('pseudo');

        $validator
            ->date('naissance')
            ->requirePresence('naissance', 'create')
            ->notEmpty('naissance');

        $validator
            ->date('deces')
            ->allowEmpty('deces');

        $validator
            ->requirePresence('nationalite', 'create')
            ->notEmpty('nationalite');

        $validator
            ->requirePresence('biographie', 'create')
            ->notEmpty('biographie');

        $validator
            ->allowEmpty('photo');

        return $validator;
    }
}
