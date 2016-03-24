<?php
namespace App\Model\Table;

use App\Model\Entity\AccountParameter;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AccountParameters Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class AccountParametersTable extends Table
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

        $this->table('account_parameters');
        $this->displayField('id');
        $this->primaryKey('id');

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
        $regexURL = '^[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?^';
        
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('biography')
            ->add('biography', [
                'length' => [
                    'rule' => ['maxLength', 144 ],
                    'message' => '144 caractères maximum',
                ]
            ]);

        $validator
            ->allowEmpty('locality');

        $validator
            ->allowEmpty('website')
            ->add(
                'website', 'validFormat', 
                [
                    'rule' => ['custom', $regexURL] , 
                    'message' => 'L\'URL n\'est pas valide'
                ]
            );

        $validator
            ->allowEmpty('avatar_file_name')
            ->allowEmpty('file')
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
