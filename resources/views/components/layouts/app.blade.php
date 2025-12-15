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
        /* ===== CSS VARIABLES ===== */
        :root {
            --primary-border: #c7d2fe;
            --secondary-border: #e0e7eb;
            --disabled-opacity: 0.5;
            --text-dark: #1e293b;
            --text-light: #94a3b8;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --shadow-primary: 0 8px 25px rgba(102, 126, 234, 0.3);
            --border-radius-md: 12px;
            --border-radius-sm: 10px;
            --transition-default: all 0.3s ease;
        }

        /* ===== GLOBAL & BODY ===== */
        body {
            background-color: var(--bg-body) !important;
            position: relative;
            overflow-x: hidden;
        }

        body::after,
        body::before {
            content: '';
            position: absolute;
            background-color: var(--bg-circle) !important;
            border-radius: 50%;
            z-index: -1;
            opacity: 0.9;
        }

        body::after {
            top: -210px;
            right: -210px;
            width: 540px;
            height: 540px;
        }

        body::before {
            bottom: 0px;
            left: 0px;
            width: 250px;
            height: 250px;
        }

        /* ===== UTILITY CLASSES ===== */
        .country-tag {
            display: inline-block;
            padding: 4px 12px;
            background: #e0f2fe;
            color: #0369a1;
            border-radius: 6px;
            font-size: 0.85rem;
            margin: 2px;
        }

        .mobile-arrow {
            margin-inline-start: 0.5rem;
        }

        /* ===== CORE CHOICE COMPONENT ===== */
        .choice-component {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            border: 2px solid var(--primary-border);
            border-radius: var(--border-radius-md);
            background: #fff;
            cursor: pointer;
            transition: var(--transition-default);
            font-size: 15px;
            position: relative;
            font-weight: 600;
        }

        .choice-text {
            line-height: 1.3;
            color: var(--text-dark);
            transition: color 0.3s ease;
            font-weight: 600;
        }

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

        /* ===== CHOICE VARIANT MODIFIERS ===== */
        .choice-component.idea-variant {
            border-color: #dee3f7;
        }

        .choice-component.country-variant {
            border-color: var(--primary-border);
        }

        .choice-component.cost-variant {
            justify-content: center;
            text-align: center;
        }

        .choice-component.range-variant {
            border-color: var(--secondary-border);
            font-size: 14px;
        }

        .choice-component.range-variant:not(.disabled) {
            border-color: var(--primary-border);
        }

        /* ===== SELECTED STATE ===== */
        .btn-check:checked+.choice-component,
        .btn-check:checked+.yn-button {
            border-color: #667eea;
            background: var(--gradient-primary);
            color: white;
            /* box-shadow: var(--shadow-primary); */
        }

        .btn-check:checked+.choice-component .choice-text {
            color: white;
        }

        .btn-check:checked+.choice-component .check-indicator {
            opacity: 1;
            transform: translateY(-50%) scale(1);
        }

        /* ===== DISABLED STATE (مجمع في مكان واحد) ===== */
        .choice-component.disabled,
        .btn-check:disabled+.choice-component,
        .range-variant.disabled {
            opacity: var(--disabled-opacity);
            cursor: not-allowed;
            border-color: var(--secondary-border) !important;
        }

        .btn-check:disabled+.choice-component:hover,
        .choice-component.disabled:hover {
            transform: none;
            box-shadow: none;
        }

        /* ===== REQUIREMENT ROW ===== */
        .requirement-row {
            background: #f8f9fa;
            border-radius: var(--border-radius-md);
            padding: 1rem;
            margin-bottom: 0.75rem;
        }

        /* ===== QUESTION SECTION ===== */
        .question-label {
            background: var(--gradient-primary);
            border-radius: var(--border-radius-md);
            padding: 12px 16px;
            color: white;
            font-weight: 700;
            font-size: 15px;
            text-align: center;
            flex: 1;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
        }

        /* ===== BUTTONS ===== */
        .yn-buttons-wrapper {
            display: flex;
            gap: 8px;
            flex-shrink: 0;
        }

        .yn-button,
        .option-item {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border: 2px solid var(--primary-border);
            border-radius: var(--border-radius-md);
            background: #fff;
            cursor: pointer;
            transition: var(--transition-default);
            font-size: 15px;
            font-weight: 600;
            color: var(--text-dark);
            min-width: 70px;
        }

        .option-item {
            justify-content: flex-start;
            padding: 8px 14px;
            border-radius: var(--border-radius-sm);
            min-width: auto;
            gap: 8px;
            border-color: var(--secondary-border);
        }

        /* ===== OPTIONS SECTION ===== */
        .options-section {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
        }

        .option-label-text,
        .number-input-label {
            color: var(--text-dark);
            font-weight: 700;
            font-size: 15px;
            white-space: nowrap;
        }

        .option-item input[type="radio"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #667eea;
        }

        .option-item label {
            cursor: pointer;
            margin: 0;
            font-weight: 500;
            color: var(--text-dark);
            font-size: 14px;
        }

        .option-item:has(input:checked) {
            border-color: #667eea;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        }

        /* ===== NUMBER INPUT ===== */
        .number-input-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
        }

        .number-input {
            flex: 1;
            padding: 12px 16px;
            border: 2px solid var(--primary-border);
            border-radius: var(--border-radius-md);
            font-size: 15px;
            font-weight: 500;
            color: var(--text-dark);
            transition: var(--transition-default);
            background: white;
        }

        .number-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .number-input::placeholder {
            color: var(--text-light);
            font-weight: 400;
        }

        /* ===== HOVER EFFECTS ===== */
        @media (hover: hover) {

            .yn-button:hover,
            .option-item:hover {
                border-color: #667eea;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(102, 126, 234, 0.15);
            }
        }

        /* ===== RESPONSIVE STYLES ===== */
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

        @media (max-width: 991px) {
            .requirement-row {
                padding: 0.5rem;
            }

            .question-label,
            .yn-button,
            .option-label-text,
            .number-input-label {
                font-size: 13px;
            }

            .question-label {
                padding: 8px 10px;
            }

            .yn-button {
                padding: 8px 12px;
                min-width: 55px;
            }

            .options-section {
                gap: 8px;
                margin-top: 8px;
            }

            .option-item {
                padding: 6px 10px;
            }

            .option-item label {
                font-size: 12px;
            }

            .number-input-wrapper {
                margin-top: 8px;
            }

            .number-input {
                font-size: 13px;
                padding: 8px 12px;
            }
        }

        @media (max-width: 576px) {
            .requirement-row {
                padding: 0.4rem;
                margin-bottom: 0.5rem;
            }

            .question-label,
            .yn-button,
            .option-label-text,
            .number-input-label {
                font-size: 12px;
            }

            .question-label {
                padding: 7px 8px;
            }

            .yn-button {
                padding: 7px 10px;
                min-width: 50px;
            }

            .option-item {
                padding: 5px 8px;
            }

            .option-item label {
                font-size: 11px;
            }

            .number-input {
                font-size: 12px;
                padding: 7px 10px;
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
