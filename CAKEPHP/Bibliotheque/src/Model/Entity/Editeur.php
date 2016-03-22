<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Editeur Entity.
 *
 * @property int $id
 * @property string $nom
 * @property string $siteweb
 * @property \App\Model\Entity\Oeuvre[] $oeuvres
 */
class Editeur extends Entity
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
}
