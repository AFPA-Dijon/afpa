<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HashtagsTweetsFixture
 *
 */
class HashtagsTweetsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'tweet_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'hashtag_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'tweet_id' => ['type' => 'index', 'columns' => ['tweet_id'], 'length' => []],
            'hashtag_id' => ['type' => 'index', 'columns' => ['hashtag_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'hashtags_tweets_ibfk_1' => ['type' => 'foreign', 'columns' => ['tweet_id'], 'references' => ['tweets', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'hashtags_tweets_ibfk_2' => ['type' => 'foreign', 'columns' => ['hashtag_id'], 'references' => ['hashtags', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
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
            'id' => 1,
            'tweet_id' => 1,
            'hashtag_id' => 1
        ],
    ];
}
