<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Emprunt Entity.
 *
 * @property int $id
 * @property \Cake\I18n\Time $dateemprunt
 * @property \Cake\I18n\Time $dateretour
 * @property int $oeuvre_id
 * @property \App\Model\Entity\Oeuvre $oeuvre
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 */
class Emprunt extends Entity
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
    
    public function _getRetard(){
        $diff = $this->_properties['dateretour']->timeAgoInWords( ['format' => 'timestamp', 'accuracy' => 'day'] );
        if(strpos($diff, 'ago')){
           return true;
        }
        return false;
    }
}
