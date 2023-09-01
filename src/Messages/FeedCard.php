<?php

/**
 * Created by PhpStorm.
 * User: DreamCoders
 * Date: 2023-08-31
 * Time: 22:38
 */

namespace DreamCoders\DingBot\Messages;

class FeedCard extends Message
{

    public function __construct( $linksArray )
    {
        $this->message = [
            'msgtype' => 'feedCard',
            'feedCard' => [
                'links' => $linksArray
            ],
        ];

    }

}

//$linksArray 参考示例
//{
//    "msgtype":"feedCard",
//    "feedCard": {
//    "links": [
//            {
//                "title": "时代的火车向前开1",
//                "messageURL": "https://www.dingtalk.com/",
//                "picURL": "https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png"
//            },
//            {
//                "title": "时代的火车向前开2",
//                "messageURL": "https://www.dingtalk.com/",
//                "picURL": "https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png"
//            }
//        ]
//    }
//}
