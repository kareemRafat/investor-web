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

        /* ===== ROW ITEM ===== */
        .requirement-row {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 0.75rem;
        }

        /* ===== QUESTION LABEL ===== */
        .question-label {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            padding: 12px 16px;
            color: white;
            font-weight: 700;
            font-size: 15px;
            text-align: center;
            flex: 1;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
        }

        /* ===== YES/NO BUTTONS ===== */
        .yn-buttons-wrapper {
            display: flex;
            gap: 8px;
            flex-shrink: 0;
        }

        .yn-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border: 2px solid #c7d2fe;
            border-radius: 12px;
            background: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 15px;
            font-weight: 600;
            color: #1e293b;
            min-width: 70px;
        }

        .btn-check:checked+.yn-button {
            border-color: #667eea;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        @media (hover: hover) {
            .yn-button:hover {
                border-color: #667eea;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(102, 126, 234, 0.15);
            }
        }

        /* ===== OPTIONS SECTION ===== */
        .options-section {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
        }

        .option-label-text {
            color: #1e293b;
            font-weight: 700;
            font-size: 15px;
            white-space: nowrap;
        }

        .option-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            background: white;
            border: 2px solid #e0e7eb;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
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
            color: #1e293b;
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

        .number-input-label {
            color: #1e293b;
            font-weight: 700;
            font-size: 15px;
            white-space: nowrap;
        }

        .number-input {
            flex: 1;
            padding: 12px 16px;
            border: 2px solid #c7d2fe;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 500;
            color: #1e293b;
            transition: all 0.3s ease;
            background: white;
        }

        .number-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .number-input::placeholder {
            color: #94a3b8;
            font-weight: 400;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 991px) {
            .requirement-row {
                padding: 0.5rem;
            }

            .question-section {
                gap: 6px;
            }

            .question-label {
                font-size: 13px;
                padding: 8px 10px;
            }

            .yn-button {
                padding: 8px 12px;
                font-size: 13px;
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

            .number-input-label {
                font-size: 13px;
            }
        }

        @media (max-width: 576px) {
            .requirement-row {
                padding: 0.4rem;
                margin-bottom: 0.5rem;
            }

            .question-label {
                font-size: 12px;
                padding: 7px 8px;
            }

            .yn-button {
                padding: 7px 10px;
                font-size: 12px;
                min-width: 50px;
            }

            .option-label-text {
                font-size: 12px;
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

            .number-input-label {
                font-size: 12px;
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
