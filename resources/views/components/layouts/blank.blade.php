<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, nofollow">
    <title>{{ $title ?? __('landing.brand') }}</title>
    <meta name="description" content="{{ __('landing.hero.subtitle') }}" />

    <link rel="stylesheet" crossorigin href="{{ asset('assets/landing-new/style.css') }}">

    <style>
        @font-face {
            font-family: 'Lama Sans';
            src: url('{{ asset('fonts/ArbFONTS-LamaSans-Regular.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'Lama Sans';
            src: url('{{ asset('fonts/ArbFONTS-LamaSans-Medium.ttf') }}') format('truetype');
            font-weight: 500;
            font-style: normal;
        }
        :root {
            --font-sans: 'Lama Sans', sans-serif !important;
            --font-heading: 'Lama Sans', sans-serif !important;
        }
        body {
            font-family: 'Lama Sans', sans-serif !important;
        }
        .font-sans {
            font-family: 'Lama Sans', sans-serif !important;
        }
        .font-heading {
            font-family: 'Lama Sans', sans-serif !important;
        }
        [x-cloak] { display: none !important; }
    </style>
    @livewireStyles
</head>
<body class="min-h-screen bg-background text-foreground font-sans">
    {{ $slot }}
    @livewireScripts
</body>
</html>
