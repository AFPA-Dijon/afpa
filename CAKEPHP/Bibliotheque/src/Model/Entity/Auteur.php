<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Auteur Entity.
 *
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $pseudo
 * @property \Cake\I18n\Time $naissance
 * @property \Cake\I18n\Time $deces
 * @property string $nationalite
 * @property string $biographie
 * @property string $photo
 * @property \App\Model\Entity\Oeuvre[] $oeuvres
 */
class Auteur extends Entity
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
    
    /*definition d'un champ virtuel nom+prenom*/
    public function _getFullName(){
        return $this->_properties['nom'] . ' '. $this->_properties['prenom']; 
    }
}
