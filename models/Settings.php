<?php namespace GrofGraf\CookieNotice\Models;

use Model;

class Settings extends Model
{
    public $implement = [
      'System.Behaviors.SettingsModel',
      '@RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = [
      'cookie_notice_content',
      'button_text'
    ];

    // A unique code
    public $settingsCode = 'cookie_notice_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
