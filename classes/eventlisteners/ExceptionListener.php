<?php

namespace Klaasie\Pushbullet\Classes\EventListeners;

use Exception;
use Illuminate\Http\Request;
use Klaasie\Pushbullet\Models\Settings;
use October\Rain\Events\Dispatcher;
use Pushbullet\Pushbullet;

/**
 * Class LogListener
 *
 * @package Klaasie\Pushbullet\Classes\EventListeners
 */
class ExceptionListener
{
    /**
     * Handle Exception event
     *
     * @param Exception $exception
     * @param $httpCode
     * @param Request $request
     */
    public function handle(Exception $exception, $httpCode, Request $request)
    {
        $settings = Settings::instance();
        if (!$settings->get('exception_notification', false)) {
            return;
        }

        try {
            $pushbullet = new Pushbullet($settings->get('access_token', ''));
            $pushbullet->device($settings->get('default_device', ''))->pushNote(
                'Exception on: ' . $request->url(),
                $exception->getMessage()
            );
        } catch (Exception $e) {
            // Avoid this method from looping infinitely
        }
    }

    /**
     * Subscribe to events
     *
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(
            'exception.beforeRender',
            'Klaasie\Pushbullet\Classes\EventListeners\ExceptionListener@handle'
        );
    }
}