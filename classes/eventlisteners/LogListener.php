<?php

namespace Klaasie\Pushbullet\Classes\EventListeners;

use Exception;
use Illuminate\Events\Dispatcher;
use Klaasie\Pushbullet\Models\Settings;
use Pushbullet\Pushbullet;
use System\Models\EventLog;

/**
 * Class LogListener
 *
 * @package Klaasie\Pushbullet\Classes\EventListeners
 */
class LogListener
{
    /**
     * Handle Log event
     *
     * @param EventLog $log
     */
    public function handle(EventLog $log)
    {
        $settings = Settings::instance();
        if (!$settings->get('log_notification', false)) {
            return;
        }

        $notificationsTypes = explode(',', $settings->get('log_notification_type', []));

        if (count($notificationsTypes) >= 1
            && !in_array(strtolower($log->getAttribute('level')), $notificationsTypes)
        ) {
            return;
        }

        try {
            $pushbullet = new Pushbullet($settings->get('access_token', ''));
            $pushbullet->device($settings->get('default_device', ''))->pushNote(
                $log->getAttribute('level') . ' log registered',
                $log->getAttribute('message')
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
            'eloquent.created: System\Models\EventLog',
            'Klaasie\Pushbullet\Classes\EventListeners\LogListener@handle'
        );
    }
}