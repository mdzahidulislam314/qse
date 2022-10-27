<?php
namespace App\Services;

use App\Settings;

class SettingsService
{

    public static function get($key, $default = '') {
        $setting = Settings::where('key', $key)->first();
        if ($setting) return $setting->value;

        return $default;
    }

    public static function set($key, $value) {
        if (!$value) return;

        $setting = Settings::where('key', $key)->first();
        if ($setting === null){
            $setting = new Settings();
            $setting->key = $key;
        }
        $setting->value = $value;
        $setting->save();

    }

    // get all settings as [key => value]
    public static function getSettingsArray()
    {
        $data = Settings::all()->pluck('value', 'key');
        return $data->toArray();
    }
}
