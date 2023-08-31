<?php

return [
    'webhookUrl' => env('DING_ROBOT_URL', 'https://oapi.dingtalk.com/robot/send'),
    'access_token'   => [
        'default' => env('DING_TOKEN', '4c8ed2083bcd5ce3eb8ee9dec9d38343211900ea29ef7bbef9156ad0892'),// 默认
        'bot1' => env('DING_TOKEN1', '你的钉钉群组机器人token'),//扩展更多token
        'bot2' => env('DING_TOKEN2', '你的钉钉群组机器人token'),//扩展更多token
    ],
];
