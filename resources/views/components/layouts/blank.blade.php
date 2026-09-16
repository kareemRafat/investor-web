<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, nofollow">
    <title>{{ $title ?? __('landing.brand') }} - Investment Collaboration Platform</title>
    <meta name="description" content="{{ __('landing.hero.subtitle') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <!-- Google Fonts: Plus Jakarta Sans, Inter, Cairo -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <!-- Material Symbols Outlined -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <!-- Landing styles (Tailwind v4) -->
    @vite(['resources/css/landing.css'])
    @livewireStyles
</head>
<body class="bg-background text-on-surface antialiased overflow-x-hidden selection:bg-secondary-container selection:text-on-secondary-fixed">
    {{ $slot }}
    @livewireScripts
</body>
</html>
