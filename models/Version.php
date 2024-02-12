<?php namespace CreationHandicap\ThemeVersion\Models;

use Model;

/**
 * Model
 */
class Version extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $implement = [
        \System\Behaviors\SettingsModel::class,
    ];

    public $settingsCode = 'creationhandicap_themeversion_settings';
    public $settingsFields = 'fields.yaml';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'version' => 'required|string',
    ];
}
