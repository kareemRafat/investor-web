<html lang="en" dir="ltr">

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
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet" />
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
    </style>
</head>

<body>

    <x-partials.header />

    {{ $slot }}

    @livewireScripts
</body>

</html>
