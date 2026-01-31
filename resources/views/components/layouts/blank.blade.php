<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, nofollow">
    <title>{{ $title ?? __('landing.brand') }}</title>
    <meta name="description" content="{{ __('landing.hero.subtitle') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
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

            /* Override blue with purple gradient values */
            --primary: 252 70% 50% !important; /* Approx purple for HSL */
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            --glow: #764ba2 !important;
        }

        .text-gradient {
            -webkit-background-clip: text !important;
            background-clip: text !important;
            color: transparent !important;
            background-image: var(--gradient-primary) !important;
        }

        .bg-primary {
            background: var(--gradient-primary) !important;
        }

        .shadow-glow {
            box-shadow: 0 0 60px -15px rgba(118, 75, 162, 0.4) !important;
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
