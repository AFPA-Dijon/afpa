<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HashtagsTweet Entity.
 *
 * @property int $id
 * @property int $tweet_id
 * @property \App\Model\Entity\Tweet $tweet
 * @property int $hashtag_id
 * @property \App\Model\Entity\Hashtag $hashtag
 */
class HashtagsTweet extends Entity
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
