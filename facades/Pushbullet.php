<?php

namespace Klaasie\Pushbullet\Facades;

use October\Rain\Support\Facade;

/**
 * Class Pushbullet
 *
 * @package Klaasie\Pushbullet\Facades
 */
class Pushbullet extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor() {
        return 'Pushbullet';
    }
}