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

        /* ===== CORE CHOICE COMPONENT ===== */
        .choice-component {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            border: 2px solid #c7d2fe;
            border-radius: 12px;
            background: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 15px;
            position: relative;
            font-weight: 600;
        }

        /* ===== VARIANT MODIFIERS ===== */
        .choice-component.idea-variant {
            border-color: #dee3f7;
        }

        .choice-component.country-variant {
            border-color: #c7d2fe;
        }

        .choice-component.cost-variant {
            justify-content: center;
            text-align: center;
        }

        .choice-component.range-variant {
            border-color: #e0e7eb;
            font-size: 14px;
        }

        .choice-component.range-variant:not(.disabled) {
            border-color: #c7d2fe;
        }

        /* ===== TEXT ===== */
        .choice-text {
            line-height: 1.3;
            color: #1e293b;
            transition: color 0.3s ease;
            font-weight: 600;
        }

        /* ===== CHECK INDICATOR ===== */
        .check-indicator {
            position: absolute;
            top: 50%;
            transform: translateY(-50%) scale(0);
            font-size: 1.2rem;
            color: white;
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        html[dir="ltr"] .check-indicator {
            right: 12px;
        }

        html[dir="rtl"] .check-indicator {
            left: 12px;
        }

        /* ===== SELECTED STATE ===== */
        .btn-check:checked+.choice-component {
            border-color: #667eea;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-check:checked+.choice-component .choice-text {
            color: white;
        }

        .btn-check:checked+.choice-component .check-indicator {
            opacity: 1;
            transform: translateY(-50%) scale(1);
        }

        /* ===== DISABLED STATE ===== */
        .choice-component.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .btn-check:disabled+.choice-component,
        .choice-component.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .btn-check:disabled+.choice-component:hover,
        .choice-component.disabled:hover {
            transform: none;
            box-shadow: none;
            border-color: #c7d2fe;
        }

        .range-variant.disabled {
            opacity: 0.4;
            border-color: #e0e7eb !important;
        }

        /* ===== UTILITY ===== */
        .mobile-arrow {
            margin-inline-start: 0.5rem;
        }

        /* ===== RESPONSIVE ===== */
        @media (min-width: 768px) {
            .choice-component {
                padding: 16px 18px;
                font-size: 16px;
            }

            .choice-component.range-variant {
                padding: 14px 16px;
                font-size: 15px;
            }
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
