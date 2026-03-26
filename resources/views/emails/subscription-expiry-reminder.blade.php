@extends('emails.layout')

@section('title', __('notifications.expiry_reminder_title'))

@section('content')
    <p>{{ __('notifications.expiry_reminder_body', ['plan' => $planLabel]) }}</p>
@endsection

@section('action_url', route('main.pricing'))
@section('action_text', __('notifications.expiry_reminder_action'))
