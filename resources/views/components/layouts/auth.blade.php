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
    <title>{{ $title ?? 'Page Title' }}</title>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet" />
    <!-- style -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>

    <div class="lang-dropdown">
        <button class="lang-btn" onclick="toggleLang()">
            <i class="bi bi-globe"></i>
            <span id="currentLang">العربية</span>
            <i class="bi bi-chevron-down" style="font-size: 12px;"></i>
        </button>

        <div class="lang-menu" id="langMenu">
            <a class="lang-item" href="http://127.0.0.1:8000/en/login">English</a>
            <a class="lang-item active" href="http://127.0.0.1:8000/ar/login">العربية</a>
        </div>
    </div>


    {{ $slot }}

    @livewireScripts

    <script>
        function toggleLang() {
            document.getElementById('langMenu').classList.toggle('show');
        }

        document.addEventListener('click', function(e) {
            const dropdown = document.querySelector('.lang-dropdown');
            if (!dropdown.contains(e.target)) {
                document.getElementById('langMenu').classList.remove('show');
            }
        });

        // Update current language on load
        window.addEventListener('DOMContentLoaded', function() {
            const url = window.location.pathname;
            const currentLang = document.getElementById('currentLang');
            const items = document.querySelectorAll('.lang-item');

            if (url.includes('/en/')) {
                currentLang.textContent = 'English';
                items.forEach(item => {
                    item.classList.remove('active');
                    if (item.textContent.trim() === 'English') {
                        item.classList.add('active');
                    }
                });
            }
        });
    </script>

</body>

</html>
