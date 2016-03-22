<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Oeuvre Entity.
 *
 * @property int $id
 * @property string $titre
 * @property int $codeISBN
 * @property \Cake\I18n\Time $parution
 * @property string $format
 * @property string $description
 * @property string $langue
 * @property string $type
 * @property string $genre
 * @property string $front
 * @property string $back
 * @property int $editeur_id
 * @property \App\Model\Entity\Editeur $editeur
 * @property \App\Model\Entity\Emprunt[] $emprunts
 * @property \App\Model\Entity\Auteur[] $auteurs
 */
class Oeuvre extends Entity
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
