<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('pages.error_500.title') }}</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Custom Font -->
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

        .svg-container {
            max-width: 380px;
            margin: 0 auto 2rem;
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(-1deg); }
        }

        h1 {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--dark-blue);
            margin-bottom: 1rem;
        }

        p {
            color: #64748b;
            font-size: 1.05rem;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        .btn-invest {
            background-color: var(--dark-blue);
            color: white !important;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            border: none;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-invest:hover {
            background-color: #0f172a;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
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
    </style>
</head>
<body>
    <div class="error-code">500</div>

    <div class="error-container">
        <div class="svg-container">
            <img src="{{ asset('images/errors/500-maintenance.svg') }}" alt="500 Error" style="width: 100%; height: auto;">
        </div>

        <h1>{{ __('pages.error_500.heading') }}</h1>
        <p>{{ __('pages.error_500.message') }}</p>

        @php
            $backUrl = (url()->previous() && url()->previous() !== url()->current()) ? url()->previous() : route('main.home');
        @endphp

        <a href="{{ $backUrl }}" class="btn-invest">
            @if(app()->getLocale() === 'ar')
                <span>{{ __('pages.error_500.button') }}</span>
                <i class="bi bi-arrow-left"></i>
            @else
                <i class="bi bi-arrow-left"></i>
                <span>{{ __('pages.error_500.button') }}</span>
            @endif
        </a>
    </div>
</body>
</html>
