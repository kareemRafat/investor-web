<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('pages.error_403.title') }}</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Custom Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">

    <!-- Shared Error CSS -->
    <link rel="stylesheet" href="{{ asset('css/error-pages.css') }}">
</head>
<body>
    <div class="bg-circle" style="top: -100px; right: -100px;"></div>
    <div class="bg-circle" style="bottom: -100px; left: -100px;"></div>

    <div class="error-code">403</div>

    <div class="error-container">
        <div class="svg-container">
            <img src="{{ asset('images/errors/403 Error Forbidden-bro.svg') }}" alt="403 Error">
        </div>

        <h1>{{ __('pages.error_403.heading') }}</h1>
        <p>{{ __('pages.error_403.message') }}</p>

        @php
            $backUrl = (url()->previous() && url()->previous() !== url()->current()) ? url()->previous() : route('main.home');
        @endphp

        <a href="{{ $backUrl }}" class="btn-invest">
            @if(app()->getLocale() === 'ar')
                <span>{{ __('pages.error_403.button') }}</span>
                <i class="bi bi-arrow-left"></i>
            @else
                <i class="bi bi-arrow-left"></i>
                <span>{{ __('pages.error_403.button') }}</span>
            @endif
        </a>
    </div>
</body>
</html>
