<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bien Entity.
 *
 * @property int $id
 * @property string $adresse
 * @property string $ville
 * @property string $description
 * @property int $nombredepieces
 * @property int $type_id
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Annonce[] $annonces
 * @property \App\Model\Entity\Commentaire[] $commentaires
 * @property \App\Model\Entity\Image[] $images
 */
class Bien extends Entity
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
