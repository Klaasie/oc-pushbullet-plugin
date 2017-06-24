# Klaasie.Pushbullet

- [Introduction](#introduction)
- [Configuration](#configuration)
    - [Pushbullet setup](#pushbullet-setup)
    - [Event listeners](#event-listeners)
- [Wrapper Class](#wrapper-class)

<a name="introduction"></a>
## Introduction

An October CMS plugin that offers Pushbullet integration and basic error reporting.

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

#### Log notifications
The log notifications listener listens to any of the logs being written through the `monolog\logger` class.
If this settings is enabled an additional field will come available where you can specify which type of logs you wish to  be sent as push notification.
The message will contain the log type as well as the message sent in the log.

#### Exception notification
This listener listens to the `exception.beforeRender` event. Which means that any uncaught exception will be sent to your default device.
The message will contain the url on which the exception occurred as well as the exception message.

<a name="wrapper-class"></a>
## Wrapper class

@todo implement.


Usefull stuff

    block
    
**bold**

*italic*

`annotation`

> **Note:** note.

