<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (! function_exists('settings')) {
    /**
     * Get a setting value by key.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    function settings($key, $default = null)
    {
        $settings = once(fn () => Cache::rememberForever('global_settings', function () {
            try {
                return Setting::all()->pluck('value', 'key');
            } catch (\Exception $e) {
                return collect();
            }
        }));

        return $settings->get($key, $default);
    }
}
