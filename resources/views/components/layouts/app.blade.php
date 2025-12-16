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
