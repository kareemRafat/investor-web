<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('pages.error_419.title') }}</title>

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

    <div class="error-code">419</div>

    <div class="error-container">
        <div class="svg-container">
            <img src="{{ asset('images/errors/Fingerprint-cuate.svg') }}" alt="419 Error">
        </div>

        <h1>{{ __('pages.error_419.heading') }}</h1>
        <p>{{ __('pages.error_419.message') }}</p>

        <a href="javascript:location.reload();" class="btn-invest">
            <i class="bi bi-arrow-clockwise"></i>
            <span>{{ __('pages.error_419.button') }}</span>
        </a>
    </div>
</body>
</html>
