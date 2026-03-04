<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'facebook_url',
                'label' => 'Facebook Profile URL',
                'value' => 'https://facebook.com/yourprofile',
                'type' => 'url',
                'group' => 'social',
            ],
            [
                'key' => 'twitter_url',
                'label' => 'Twitter/X Profile URL',
                'value' => 'https://twitter.com/yourprofile',
                'type' => 'url',
                'group' => 'social',
            ],
            [
                'key' => 'instagram_url',
                'label' => 'Instagram Profile URL',
                'value' => 'https://instagram.com/yourprofile',
                'type' => 'url',
                'group' => 'social',
            ],
            [
                'key' => 'linkedin_url',
                'label' => 'LinkedIn Profile URL',
                'value' => 'https://linkedin.com/in/yourprofile',
                'type' => 'url',
                'group' => 'social',
            ],
            [
                'key' => 'whatsapp_number',
                'label' => 'WhatsApp Number',
                'value' => '1234567890',
                'type' => 'text',
                'group' => 'social',
            ],
            [
                'key' => 'dribbble_url',
                'label' => 'Dribbble Profile URL',
                'value' => 'https://dribbble.com/yourprofile',
                'type' => 'url',
                'group' => 'social',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
