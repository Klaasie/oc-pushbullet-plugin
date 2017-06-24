<?php

namespace Klaasie\Pushbullet\ServiceProvider;

use Klaasie\Pushbullet\Models\Settings;
use October\Rain\Support\ServiceProvider;
use Pushbullet\Pushbullet as PushbulletBase;

/**
 * Class PushBullet
 *
 * @package Klaasie\Pushbullet\ServiceProvider
 */
class Pushbullet extends ServiceProvider
{
    /**
     * Register the provider
     */
    public function register()
    {
        $this->app->bind('Pushbullet', function() {
            return new PushbulletBase(Settings::get('access_token', ''));
        });
    }
}