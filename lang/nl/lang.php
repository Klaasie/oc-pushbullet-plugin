<?php

return [
    'plugin' => [
        'name' => 'Pushbullet',
        'description' => 'Pushbullet integratie voor OctoberCMS.'
    ],
    'settings' => [
        'category' => 'Notificaties',
        'menu_label' => 'Pushbullet instellingen',
        'label' => 'Pushbullet',
        'description' => 'Beheer Pushbullet instellingen'
    ],
    'permissions' => [
        'tab' => 'Pushbullet',
        'label' => 'Beheer instellingen',
        'access_settings' => 'Beheer Pushbullet instellingen'
    ],
    'form' => [
        'general_settings' => 'Pushbullet instellingen',
        'tab_general' => 'Algemeeen',
        'tab_notifications' => 'Notificaties',
        'access_token' => 'Toegangstoken',
        'default_device' => 'Standaard  apparaat',
        'test_notification' => 'Verstuur een test notifcatie',
        'test_notification_loader' => 'Test notificatie versturen..',
        'test_notification_title' => 'Test notificatie verstuurd via OctoberCMS',
        'test_notification_body' => 'Dit is een test notifcicatie.',
        'test_notification_sent' => 'Test notificatie verstuurd.',
        'log_notification' => 'Verstuur een notificatie wanneer een systeembericht wordt aangemaakt.',
        'log_notification_type' => 'Lijst van systeemberichten die een notificatie dienen te versturen',
        'log_notification_type_comment' => 'Door dit veld leeg te laten wordt er voor elk type systeembericht een notificatie verstuurd.',
        'exception_notification' => 'Verstuur een notificatie wanneer een exceptie voor komt.',
    ],
    'errors' => [
        'invalid_api_token' => 'De toegangstoken is niet geldig.'
    ]
];