<?php

return [
    'plugin' => [
        'name' => 'Pushbullet',
        'description' => 'Add Pushbullet integration to OctoberCMS.'
    ],
    'settings' => [
        'category' => 'Notifications',
        'menu_label' => 'Pushbullet settings',
        'label' => 'Pushbullet',
        'description' => 'Manage Pushbullet Settings'
    ],
    'permissions' => [
        'tab' => 'Pushbullet',
        'label' => 'Manage settings',
        'access_settings' => 'Manage Pushbullet Settings'
    ],
    'form' => [
        'general_settings' => 'Pushbullet settings',
        'tab_general' => 'General',
        'tab_notifications' => 'Notifications',
        'access_token' => 'Access Token',
        'default_device' => 'Default device',
        'test_notification' => 'Send test push notification',
        'test_notification_loader' => 'Sending push notification..',
        'test_notification_title' => 'Test notification sent by OctoberCMS',
        'test_notification_body' => 'This is a test notification.',
        'test_notification_sent' => 'Test notification sent.',
        'log_notification' => 'Send a push notification when an event log is created',
        'log_notification_type' => 'List the types of events that should send a notification',
        'log_notification_type_comment' => 'Leaving this field blank sends a notification on any type.',
        'exception_notification' => 'Send a push notification when an uncaught exception occurs',
    ],
    'errors' => [
        'invalid_api_token' => 'The access token is invalid.'
    ]
];