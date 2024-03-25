<?php
/**
 * Created by PhpStorm.
 * User: DreamCoders
 * Date: 2023-08-31
 * Time: 22:38
 */

namespace DreamCoders\DingBot;

use Illuminate\Support\ServiceProvider;

class DingBotServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        $this->publishes([
            __DIR__.'/../config/dingbot.php' => config_path('dingbot.php'),
        ]);
    }
}
