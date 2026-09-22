<?php

use App\Models\SiteSetting;

if (! function_exists('site_setting')) {
    /**
     * Get a site setting value. Empty values resolve to the default.
     */
    function site_setting(string $key, ?string $default = null): ?string
    {
        return SiteSetting::get($key, $default);
    }
}
