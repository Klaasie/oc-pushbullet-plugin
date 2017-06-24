<?php

namespace Klaasie\Pushbullet;

use App;
use Backend;
use Event;
use Illuminate\Foundation\AliasLoader;
use Klaasie\Pushbullet\Classes\EventListeners\ExceptionListener;
use Klaasie\Pushbullet\Classes\EventListeners\LogListener;
use Klaasie\Pushbullet\Facades\Pushbullet as PushbulletFacade;
use Klaasie\Pushbullet\ServiceProvider\Pushbullet as PushbulletServiceProvider;
use System\Classes\PluginBase;

/**
 * Class Plugin
 *
 * @package Klaasie\Pushbullet
 */
class Plugin extends PluginBase
{
    /**
     * {@inheritdoc}
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'klaasie.pushbullet::lang.plugin.name',
            'description' => 'klaasie.pushbullet::lang.plugin.description',
            'author'      => 'Klaas Poortinga',
            'icon'        => 'icon-commenting-o',
            'homepage'    => 'https://github.com/Klaasie/oc-pushbullet-plugin',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        App::register(PushbulletServiceProvider::class);

        $alias = AliasLoader::getInstance();
        $alias->alias('Pushbullet', PushbulletFacade::class);

        $this->registerEventListeners();
    }

    /**
     * {@inheritdoc}
     */
    public function registerPermissions()
    {
        return [
            'klaasie.pushbullet.access_settings' => [
                'tab' => 'klaasie.pushbullet::lang.permissions.tab',
                'label' => 'klaasie.pushbullet::lang.permissions.label'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function registerSettings()
    {
        return [
            'pushbullet' => [
                'label'       => 'klaasie.pushbullet::lang.settings.label',
                'description' => 'klaasie.pushbullet::lang.settings.description',
                'category'    => 'Notifications',
                'icon'        => 'icon-commenting-o',
                'url'         => Backend::url('klaasie/pushbullet/settings'),
                'order'       => 500,
                'permissions' => ['klaasie.pushbullet.access_settings']
            ]
        ];
    }

    /**
     * Register event listeners
     */
    private function registerEventListeners()
    {
        Event::subscribe(new LogListener());
        Event::subscribe(new ExceptionListener());
    }
}
