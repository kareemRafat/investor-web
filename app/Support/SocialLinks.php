<?php

namespace App\Support;

/**
 * Central definition of the social networks shown in the site footers.
 * URLs are managed from the admin panel (Manage Social Links page).
 * Networks with an empty URL are hidden everywhere automatically.
 */
class SocialLinks
{
    /**
     * @return array<string, array{label: string}>
     */
    public static function networks(): array
    {
        return [
            'x' => ['label' => 'X (Twitter)'],
            'facebook' => ['label' => 'Facebook'],
            'instagram' => ['label' => 'Instagram'],
            'linkedin' => ['label' => 'LinkedIn'],
            'youtube' => ['label' => 'YouTube'],
        ];
    }

    public static function settingKey(string $network): string
    {
        return "social.{$network}";
    }

    /**
     * @return array<int, array{key: string, label: string, url: string}>
     */
    public static function links(): array
    {
        $links = [];

        foreach (self::networks() as $key => $network) {
            $url = site_setting(self::settingKey($key));

            if (filled($url)) {
                $links[] = [
                    'key' => $key,
                    'label' => $network['label'],
                    'url' => $url,
                ];
            }
        }

        return $links;
    }
}
