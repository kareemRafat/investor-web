<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Get a setting value (empty strings are treated as missing).
     * Never throws: footers render on every page, so a missing
     * table (e.g. before migrations run) must resolve to default.
     */
    public static function get(string $key, ?string $default = null): ?string
    {
        try {
            $settings = Cache::rememberForever('site_settings', function () {
                return self::pluck('value', 'key')->all();
            });
        } catch (\Throwable) {
            return $default;
        }

        $value = $settings[$key] ?? null;

        return ($value === null || $value === '') ? $default : $value;
    }

    /**
     * Store a setting value and bust the cache.
     */
    public static function set(string $key, ?string $value): void
    {
        self::updateOrCreate(
            ['key' => $key],
            ['value' => ($value === '' ? null : $value)]
        );

        Cache::forget('site_settings');
    }
}
