<?php

namespace Klaasie\Pushbullet\Models;

use ApplicationException;
use Eloquent;
use Lang;
use Monolog\Logger;
use October\Rain\Database\Model;
use Pushbullet\Device;
use Pushbullet\Exceptions\InvalidTokenException;
use Pushbullet\Pushbullet;
use System\Behaviors\SettingsModel;

/**
 * Class Settings
 *
 * @package Klaasie\Pushbullet\Models
 * @mixin Eloquent
 * @mixin SettingsModel
 */
class Settings extends Model
{
    /**
     * @var array
     */
    public $implement = ['System.Behaviors.SettingsModel'];

    /**
     * A unique code
     *
     * @var string
     */
    public $settingsCode = 'klaasie_pushbullet_settings';

    /**
     * Reference to field configuration
     *
     * @var string
     */
    public $settingsFields = 'fields.yaml';

    /**
     * Return list of devices
     *
     * @return array
     * @throws ApplicationException
     */
    public function getDefaultDeviceOptions()
    {
        if (!$this->getAttribute('access_token')) {
            return [];
        }

        try {
            $pb = new Pushbullet($this->getAttribute('access_token'));
            $devices = $pb->getDevices();
        } catch (InvalidTokenException $e) {
            throw new ApplicationException(Lang::get('klaasie.pushbullet::lang.errors.invalid_api_token'));
        }

        $options = [];
        /** @var Device $device */
        foreach ($devices as $device) {
            $options[$device->iden] = $device->nickname;
        }

        return $options;
    }

    /**
     * List all possible event log types
     *
     * @return array
     */
    public function getLogNotificationTypeOptions()
    {
        return array_map('strtolower', array_flip(Logger::getLevels()));
    }
}
