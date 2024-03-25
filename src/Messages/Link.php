<?php
/**
 * Created by PhpStorm.
 * User: DreamCoders
 * Date: 2023-08-31
 * Time: 22:38
 */
namespace DreamCoders\DingBot\Messages;


class Link extends Message
{

    public function __construct($title,$text,$messageUrl,$picUrl = '')
    {
        $this->message  = [
            'msgtype' => 'link',
            'link' => [
                'text' => $text,
                'title' => $title,
                'picUrl' => $picUrl,
                'messageUrl' => $messageUrl
            ]
        ];
    }
}
