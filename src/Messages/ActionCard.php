<?php

namespace DreamCoders\DingBot\Messages;

class ActionCard extends Message
{

    public function __construct($title, $markdown, $btnOrientation = 0)
    {
        $this->message = [
            'msgtype' => 'actionCard',
            'actionCard' => [
                'title' => $title,
                'text' => $markdown,
                'btnOrientation' => $btnOrientation,
            ]
        ];
    }


}
