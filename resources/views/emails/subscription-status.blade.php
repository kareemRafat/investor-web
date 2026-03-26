@extends('emails.layout')

@section('title', $title)

@section('content')
    <p>{{ $messageText }}</p>
@endsection

@section('action_url', $url)
@section('action_text', $actionText)
