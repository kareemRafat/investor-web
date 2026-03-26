@extends('emails.layout')

@section('title', __('notifications.welcome_title'))

@section('content')
    <p style="font-size: 18px; color: #2d3748; margin-bottom: 25px;">{{ __('notifications.welcome_body') }}</p>

    <div style="background-color: #f8fafc; border-radius: 12px; padding: 25px; margin-bottom: 30px; border: 1px solid #e2e8f0;">
        <h3 style="margin-top: 0; color: #1a202c; font-size: 18px; margin-bottom: 20px; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}; border-bottom: 2px solid #667eea; display: inline-block; padding-bottom: 5px;">
            {{ __('notifications.welcome_features_title') }}
        </h3>

        <!-- Feature 1 -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 20px;">
            <tr>
                <td width="40" valign="top" style="font-size: 24px;">💡</td>
                <td style="padding-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}: 15px;">
                    <strong style="display: block; color: #2d3748; font-size: 16px;">{{ __('notifications.feature_ideas_title') }}</strong>
                    <span style="color: #718096; font-size: 14px;">{{ __('notifications.feature_ideas_desc') }}</span>
                </td>
            </tr>
        </table>

        <!-- Feature 2 -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 20px;">
            <tr>
                <td width="40" valign="top" style="font-size: 24px;">🤝</td>
                <td style="padding-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}: 15px;">
                    <strong style="display: block; color: #2d3748; font-size: 16px;">{{ __('notifications.feature_offers_title') }}</strong>
                    <span style="color: #718096; font-size: 14px;">{{ __('notifications.feature_offers_desc') }}</span>
                </td>
            </tr>
        </table>

        <!-- Feature 3 -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td width="40" valign="top" style="font-size: 24px;">🚀</td>
                <td style="padding-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}: 15px;">
                    <strong style="display: block; color: #2d3748; font-size: 16px;">{{ __('notifications.feature_connect_title') }}</strong>
                    <span style="color: #718096; font-size: 14px;">{{ __('notifications.feature_connect_desc') }}</span>
                </td>
            </tr>
        </table>
    </div>
@endsection

@section('action_url', route('main.home'))
@section('action_text', __('notifications.welcome_action'))
