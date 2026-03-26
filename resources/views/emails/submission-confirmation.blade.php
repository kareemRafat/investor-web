@extends('emails.layout')

@section('title', __('notifications.submission_received_title'))

@section('content')
    <p>{{ __('notifications.submission_received_body', ['type' => $typeLabel]) }}</p>
@endsection

@section('action_url', $url)
@section('action_text', __('notifications.submission_received_action'))
