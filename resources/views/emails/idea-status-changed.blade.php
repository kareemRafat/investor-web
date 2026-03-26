@extends('emails.layout')

@section('title', __('notifications.status_updated_title'))

@section('content')
    <p>{{ __('notifications.status_updated_body', ['title' => $title, 'status' => $statusLabel]) }}</p>
    
    @if($adminNote)
        <div style="margin-top: 20px; padding: 15px; background-color: #f8fafc; border-left: 4px solid #667eea;">
            <p style="margin: 0; font-weight: bold; color: #1a202c;">{{ __('notifications.admin_note') }}:</p>
            <p style="margin: 10px 0 0 0; color: #4a5568;">{{ $adminNote }}</p>
        </div>
    @endif
@endsection

@section('action_url', $url)
@section('action_text', __('notifications.status_updated_action'))
