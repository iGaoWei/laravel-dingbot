<?php

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
