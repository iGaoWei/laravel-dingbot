<?php
/**
 * Created by PhpStorm.
 * User: DreamCoders
 * Date: 2023-08-31
 * Time: 22:38
 */
namespace DreamCoders\DingBot\Messages;

abstract class Message
{
    public $message = [];
    public $at = [];
    public $is_at_all = false;
    public $at_mobiles = [];

    public function sendAt()
    {
        $this->at = [
            'at' => [
                'atMobiles' => $this->at_mobiles,
                'isAtAll'   => $this->is_at_all,
            ],
        ];
    }

    public function getMessageBody(){

        if (empty($this->at)){
            $this->sendAt();
        }
        return $this->message + $this->at;
    }

}
