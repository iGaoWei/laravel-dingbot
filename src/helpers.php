<?php

use DreamCoders\DingBot;

if (!function_exists('dingNotice')) {
    function dingNotice($robot = '')
    {


        dd(23456789345675566464564);
        if ($robot) {
            return (new DingBot(config('dingbot') ?? []))->useRobot();

            return (new DingBot($app['config']['dingbot'] ?? []))->useRobot($robot)->getInstance();
//            return app('dingtalk-notice')->useRobot($robot)->getInstance();
        }
        return app('dingtalk-notice')->useRobot()->getInstance();
    }
}





if (!function_exists('ding_notice')) {
    function ding_notice($robot = '')
    {
        if ($robot) {
            return app('dingtalk-notice')->useRobot($robot)->getInstance();
        }
        return app('dingtalk-notice')->useRobot()->getInstance();
    }
}
