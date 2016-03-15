<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Country Entity.
 *
 * @property string $id
 * @property string $name
 * @property string $continent
 * @property string $region
 * @property float $surface_area
 * @property int $independence_year
 * @property int $population
 * @property float $life_expectancy
 * @property float $gnp
 * @property string $local_name
 * @property string $government_form
 * @property string $head_of_state
 * @property int $city_id
 * @property string $code
 * @property \App\Model\Entity\Capital $capital
 * @property \App\Model\Entity\City[] $cities
 * @property \App\Model\Entity\Language[] $languages
 */
class Country extends Entity
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
