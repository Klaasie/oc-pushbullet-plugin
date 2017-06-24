<?php

namespace Klaasie\Pushbullet\Controllers;

use Backend;
use Backend\Behaviors\FormController;
use BackendMenu;
use Backend\Classes\Controller;
use Flash;
use Input;
use Klaasie\Pushbullet\Models\Settings as SettingsModel;
use Lang;
use Pushbullet\Pushbullet;
use System\Classes\SettingsManager;

/**
 * Class Settings
 *
 * @package Klaasie\Pushbullet\Controllers
 * @mixin FormController
 */
class Settings extends Controller
{
    /** {@inheritdoc} */
    public $implement = [
        'Backend.Behaviors.FormController',
    ];

    /** {@inheritdoc} */
    public $formConfig = 'config_form.yaml';

    /** {@inheritdoc} */
    public $requiredPermissions = ['klaasie.pushbullet.access_settings'];

    /**
     * Settings constructor.
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('October.System', 'system', 'settings');
        SettingsManager::setContext('Klaasie.Pushbullet', 'settings');
    }

    /**
     * /index
     */
    public function index()
    {
        $this->pageTitle = 'klaasie.pushbullet::lang.settings.menu_label';
        $this->asExtension('FormController')->update();
    }

    /**
     * @return mixed
     */
    public function index_onSave()
    {
        return $this->asExtension('FormController')->update_onSave();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index_onResetDefault()
    {
        $model = $this->formFindModelObject();
        $model->resetDefault();

        Flash::success(Lang::get('backend::lang.form.reset_success'));

        return Backend::redirect('klaasie/pushbullet/settings');
    }

    /**
     * @return SettingsModel
     */
    public function formFindModelObject()
    {
        return SettingsModel::instance();
    }

    /**
     * Send a test notification
     */
    public function onTestConnection()
    {
        $model = $this->formFindModelObject();

        $pb = new Pushbullet(
            Input::get('Settings.access_token', $model->getAttribute('access_token'))
        );
        $pb->device(Input::get('Settings.default_device', $model->getAttribute('default_device')))
            ->pushNote(
                Lang::get('klaasie.pushbullet::lang.form.test_notification_title'),
                Lang::get('klaasie.pushbullet::lang.form.test_notification_body')
            );

        Flash::success(Lang::get('klaasie.pushbullet::lang.form.test_notification_sent'));
    }
}
