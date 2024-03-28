<?php
/**
 * Created by PhpStorm.
 * User: DreamCoders
 * Date: 2023-08-31
 * Time: 22:38
 */
//钉钉机器人配置文件
return [
    'webhookUrl' => env('DING_ROBOT_URL', 'https://oapi.dingtalk.com/robot/send'),

    'default' => [
        // 机器人的access_token default
        'access_token' => env('DING_TOKEN','4c8ed2083bcd5cc9d38343211900ea29ef7bbef9156ad0892'),
        // 加签 （不开启加签则为空）
        'secret' => env('DING_SECRET',''),
    ],
    'bot1' => [
        // 机器人的access_token  bot1
        'access_token' => env('DING_TOKEN1',''),
        // 加签 （不开启加签则为空）
        'secret' => env('DING_SECRET1',''),
    ],
    'bot2' => [
        // 机器人的access_token  bot2
        'access_token' => env('DING_TOKEN2',''),
        // 加签 （不开启加签则为空）
        'secret' => env('DING_SECRET2',''),
    ],
];
