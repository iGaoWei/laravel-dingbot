<?php
/**
 * Created by PhpStorm.
 * User: DreamCoders
 * Date: 2023-08-31
 * Time: 22:38
 */
namespace DreamCoders\DingBot;

if (!function_exists('Ding')) {
    function Ding($robot = 'default')
    {
        return (new DingBot($robot));
    }
}

