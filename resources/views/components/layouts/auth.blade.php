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
    @stack('styles')
</head>

<body>

    <div class="lang-dropdown">
        <button class="lang-btn" onclick="toggleLang()">
            <i class="bi bi-globe"></i>
            <span id="currentLang">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if($localeCode == LaravelLocalization::getCurrentLocale())
                        {{ $properties['native'] }}
                    @endif
                @endforeach
            </span>
            <i class="bi bi-chevron-down" style="font-size: 12px;"></i>
        </button>

        <div class="lang-menu" id="langMenu">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a class="lang-item {{ $localeCode == LaravelLocalization::getCurrentLocale() ? 'active' : '' }}"
                   rel="alternate"
                   hreflang="{{ $localeCode }}"
                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            @endforeach
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

        // تحديث اللغة الحالية عند التحميل
        window.addEventListener('DOMContentLoaded', function() {
            const currentLang = document.getElementById('currentLang');
            const items = document.querySelectorAll('.lang-item');

            // تحديث حالة الـ active لكل عنصر
            items.forEach(item => {
                if (item.href === window.location.href) {
                    item.classList.add('active');
                    currentLang.textContent = item.textContent;
                } else {
                    item.classList.remove('active');
                }
            });
        });
    </script>

</body>

</html>
