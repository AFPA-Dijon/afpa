<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LanguagesFixture
 *
 */
class LanguagesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'country_id' => ['type' => 'string', 'fixed' => true, 'length' => 3, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null],
        'language' => ['type' => 'string', 'fixed' => true, 'length' => 30, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null],
        'is_official' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'percentage' => ['type' => 'float', 'length' => 4, 'precision' => 1, 'unsigned' => false, 'null' => false, 'default' => '0.0', 'comment' => ''],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['country_id', 'language'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'country_id' => '9c3fa311-8282-480e-9b98-4fdf7f21a39a',
            'language' => '828e6d41-1ba7-4c2d-a6cc-03e67ef6593f',
            'is_official' => 1,
            'percentage' => 1
        ],
    ];
}
