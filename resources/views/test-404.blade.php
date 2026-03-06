<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('pages.error_404.title') }}</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Custom Font (Same as your project) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #3b82f6;
            --dark-blue: #1e2937;
            --soft-bg: #f8fafc;
        }

        body {
            background-color: var(--soft-bg);
            font-family: 'Readex Pro', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin: 0;
        }

        .error-container {
            text-align: center;
            padding: 2rem;
            max-width: 600px;
            animation: fadeIn 0.8s ease-out;
            position: relative;
            z-index: 10;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .funny-image {
            max-width: 320px;
            height: auto;
            margin-bottom: 2rem;
            filter: drop-shadow(0 20px 30px rgba(0,0,0,0.05));
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) }
            50% { transform: translateY(-10px) }
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark-blue);
            margin-bottom: 1rem;
        }

        p {
            color: #64748b;
            font-size: 1.1rem;
            margin-bottom: 3rem;
            line-height: 1.6;
        }

        /* Sophisticated Investment-Style Button - Smaller Version */
        .btn-invest {
            background-color: var(--dark-blue);
            color: white !important;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            border: none;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn-invest:hover {
            background-color: #0f172a;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .btn-invest:active {
            transform: translateY(0);
        }

        .btn-invest i {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .btn-invest:hover i {
            transform: translateX(app()->getLocale() === 'ar' ? 5 : -5)px;
        }

        html[lang="ar"] .btn-invest:hover i {
            transform: translateX(5px);
        }

        html[lang="en"] .btn-invest:hover i {
            transform: translateX(-5px);
        }

        .error-code {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 25rem;
            font-weight: 900;
            color: rgba(30, 41, 55, 0.03);
            z-index: -1;
            user-select: none;
        }

        /* Subtle Background Elements */
        .bg-circle {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.05) 0%, rgba(255, 255, 255, 0) 70%);
            border-radius: 50%;
            z-index: -1;
        }
    </style>
</head>
<body>
    <div class="bg-circle" style="top: -100px; right: -100px;"></div>
    <div class="bg-circle" style="bottom: -100px; left: -100px;"></div>

    <div class="error-code">404</div>

    <div class="error-container">
        <!-- Local Professional Investment SVG -->
        <img src="{{ asset('images/errors/business-analysis.svg') }}" alt="Investment Analysis" class="funny-image">

        <h1>{{ __('pages.error_404.heading') }}</h1>

        <p>
            {{ __('pages.error_404.message') }}
        </p>

        @php
            $previousUrl = url()->previous();
            $currentUrl = url()->current();
            // If there's a previous URL and it's not the same as now, use it. Otherwise, go home.
            $backUrl = ($previousUrl && $previousUrl !== $currentUrl) ? $previousUrl : route('main.home');
        @endphp

        <a href="{{ $backUrl }}" class="btn-invest">
            @if(app()->getLocale() === 'ar')
                <span>{{ __('pages.error_404.button') }}</span>
                <i class="bi bi-arrow-left"></i>
            @else
                <i class="bi bi-arrow-left"></i>
                <span>{{ __('pages.error_404.button') }}</span>
            @endif
        </a>
    </div>
</body>
</html>
