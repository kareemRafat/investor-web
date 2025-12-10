<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Investment Platform" />
    <meta name="keywords" content="investment, finance, portfolio" />
    <meta name="author" content="Investment Team" />
    <!-- favicon -->
    <link rel="icon" href="{{ asset('images/logo.svg') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('images/logo.svg') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('images/logo.svg') }}" />
    <!-- title -->
    <title>{{ $title ?? 'Investment | Home' }}</title>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- style -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        body {
            background-color: var(--bg-body) !important;
            position: relative;
            overflow-x: hidden;
        }

        /* make circle after */
        body::after {
            content: '';
            position: absolute;
            top: -210px;
            right: -210px;
            width: 540px;
            height: 540px;
            background-color: var(--bg-circle) !important;
            border-radius: 50%;
            z-index: -1;
            opacity: 0.9;
        }

        /* make circl before */
        body::before {
            content: '';
            position: absolute;
            bottom: 0px;
            left: 0px;
            width: 250px;
            height: 250px;
            background-color: var(--bg-circle) !important;
            border-radius: 50%;
            z-index: -1;
            opacity: 0.9;
        }

        .country-tag {
            display: inline-block;
            padding: 4px 12px;
            background: #e0f2fe;
            color: #0369a1;
            border-radius: 6px;
            font-size: 0.85rem;
            margin: 2px;
        }
    </style>
</head>

<body>

    <x-partials.header />

    {{ $slot }}

    <x-partials.footer />

    @livewireScripts

    {{-- to prevent scroll down when choose input --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Prevent scroll when clicking radio labels across all pages
            document.querySelectorAll('label[for]').forEach(label => {
                label.addEventListener('mousedown', e => {
                    e.preventDefault(); // يمنع السلوك الافتراضي اللي بيعمل سكرول
                });
            });
        });
    </script>
</body>

</html>
