<?php
namespace App\Model\Table;

use App\Model\Entity\Editeur;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Editeurs Model
 *
 * @property \Cake\ORM\Association\HasMany $Oeuvres
 */
class EditeursTable extends Table
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

        $this->table('editeurs');
        $this->displayField('nom');
        $this->primaryKey('id');

        $this->hasMany('Oeuvres', [
            'foreignKey' => 'editeur_id'
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
            ->requirePresence('siteweb', 'create')
            ->notEmpty('siteweb');

        return $validator;
    }
}
