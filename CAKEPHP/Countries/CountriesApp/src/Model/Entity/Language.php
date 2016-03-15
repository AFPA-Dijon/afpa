<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Language Entity.
 *
 * @property string $country_id
 * @property \App\Model\Entity\Country $country
 * @property string $language
 * @property bool $is_official
 * @property float $percentage
 */
class Language extends Entity
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
        'country_id' => false,
        'language' => false,
    ];
}
