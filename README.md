# Klaasie.Pushbullet

- [Introduction](#introduction)
- [Installation](#installation)
- [Configuration](#configuration)
    - [Pushbullet setup](#pushbullet-setup)
    - [Event listeners](#event-listeners)
- [Pushbullet Class](#pushbullet-class)

<a name="introduction"></a>
## Introduction

An October CMS plugin that offers Pushbullet integration and basic error reporting. This plugin uses the [https://github.com/ivkos/Pushbullet-for-PHP](https://github.com/ivkos/Pushbullet-for-PHP) library to connect to Pushbullet.

<a name="Installation"></a>
## Installation
**CLI:**

`php artisan plugin:install Klaasie.Pushbullet`

**October CMS:**

Go to Settings > Updates & Plugins > Install plugins and search for 'Pushbullet'. 

<a name="configuration"></a>
## Configuration

<a name="pushbullet-setup"></a>
### Pushbullet setup

To be able to send push notifications through pushbullet you first have to create an access token.
Head on over to the pushbullet website and visit the [my account](https://www.pushbullet.com/#settings/account) page.
Click on **Create access token** button. Copy the code and paste it into the Pushbullet settings field in your webpage.

Select the device you'd like to receive the pushbullet messages on.
<a name="event-listeners"></a>
### Event listeners

In the notifications tab 2 settings are available to you.

***Log notifications***

The log notifications listener listens to any of the logs being written through the `monolog\logger` class.
If this settings is enabled an additional field will come available where you can specify which type of logs you wish to  be sent as push notification.
The message will contain the log type as well as the message sent in the log.

***Exception notification***

This listener listens to the `exception.beforeRender` event. Which means that any uncaught exception will be sent to your default device.
The message will contain the url on which the exception occurred as well as the exception message.

<a name="pushbullet-class"></a>
## Pushbullet class
This plugin offers various methods to instantiate the Pushbullet class and sending out notifications.

For example through app binding:

```
$pushbullet = App::make('Pushbullet');
$pushbullet->allDevices()->pushNote('Note title', 'Note body');
```

Or through facade:

```
Pushbullet::allDevices()->pushNote('Note title', 'Note body');
```

Please refer to [https://github.com/ivkos/Pushbullet-for-PHP](https://github.com/ivkos/Pushbullet-or-PHP) for documentation about the methods available in the Pushbullet class. 

