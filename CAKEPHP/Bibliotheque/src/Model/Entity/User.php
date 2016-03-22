<?php
namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $password
 * @property string $email
 * @property string $role
 * @property string $nom
 * @property string $prenom
 * @property string $adresse
 * @property int $codepostal
 * @property string $ville
 * @property \App\Model\Entity\Emprunt[] $emprunts
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];


    /*hachage du mot de passe lors de la création d'un utilisateur (newEntity ou patchEntity)*/
    protected function _setPassword($password){
        return (new DefaultPasswordHasher)->hash($password);
    }
    
    /*definition d'un champ virtuel nom+prenom*/
    public function _getFullName(){
        return $this->_properties['nom'] . ' '. $this->_properties['prenom']; 
    }
    
}
