<?php namespace CreationHandicap\ThemeVersion;

use System\Classes\PluginBase;

use \System\Behaviors\SettingsModel as SettingsModel;
use \CreationHandicap\ThemeVersion\Models\Version as VersionModel;

class Plugin extends PluginBase
{
    public function registerSettings()
    {
        return [
            'location' => [
                'label' => 'Theme Version',
                'description' => 'Intended to force cache refresh, if you e.g. replace an image asset with a new one, while keeping its name. Usually clear cache should be enough to force cache refresh assets.',
                'category' => 'CATEGORY_CMS',
                'icon' => 'icon-globe',
                'order' => 500,
                'class' => \CreationHandicap\ThemeVersion\Models\Version::class,
                'permissions' => ['creationhandicap.themeversion.themeVersion'],
            ]
        ];
    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'assetVersion' => function($asset) {
                    if (!is_string($asset)) {
                        return $asset;
                    }
                    $versionModel = new VersionModel;
                    $versionSettings = new SettingsModel($versionModel);
                    $version = $versionSettings->getSettingsRecord('creationhandicap_themeversion_version_settings', '1.0.0');
                    if (null === $version || $version === '') {
                        return $asset;
                    }
                    return $asset . '?v=' .  $version->version;
                }
            ],
            'functions' => [
                'assetVersion' => function() {
                    $versionModel = new VersionModel;
                    $versionSettings = new SettingsModel($versionModel);
                    $version = $versionSettings->getSettingsRecord('creationhandicap_themeversion_version_settings', '1.0.0');
                    if (isset($version->version)) {
                        return $version->version;
                    } else {
                        return '';
                    }
                }
            ]
        ];
    }
}
