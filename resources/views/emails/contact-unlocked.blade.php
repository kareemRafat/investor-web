@extends('emails.layout')

@section('title', __('notifications.contact_unlocked_title'))

@section('content')
    <p>{{ __('notifications.contact_unlocked_body', ['title' => $title]) }}</p>
@endsection

@section('action_url', $url)
@section('action_text', __('notifications.contact_unlocked_action'))
