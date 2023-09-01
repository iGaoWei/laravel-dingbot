<?php

namespace DreamCoders\DingBot;

if (!function_exists('Ding')) {
    function Ding($robot = 'default')
    {
        return (new DingBot($robot));
    }
}

