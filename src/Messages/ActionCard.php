<?php
/**
 * Created by PhpStorm.
 * User: DreamCoders
 * Date: 2023-08-31
 * Time: 22:38
 */
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
