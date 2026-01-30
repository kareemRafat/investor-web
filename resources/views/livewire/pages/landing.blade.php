<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Investor Platform</title>
    <meta name="description" content="Connecting Ideas with Capital" />
    <meta name="author" content="Investor" />

    <meta property="og:title" content="Investor Platform" />
    <meta property="og:description" content="Connecting Ideas with Capital" />
    <meta property="og:type" content="website" />

    {{-- Localization Injection for React --}}
    <script>
        window.currentLocale = "{{ app()->getLocale() }}";
        window.rtl = {{ LaravelLocalization::getCurrentLocaleDirection() === 'rtl' ? 'true' : 'false' }};
        
        // Helper to trigger language switch from standalone frontend
        window.changeLanguage = function(locale) {
            const urls = {
                'en': "{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}",
                'ar': "{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"
            };
            if (urls[locale]) {
                window.location.href = urls[locale];
            }
        };
    </script>

    <script type="module" crossorigin src="{{ asset('assets/landing-new/app.js') }}"></script>
    <link rel="stylesheet" crossorigin href="{{ asset('assets/landing-new/style.css') }}">
  </head>

  <body>
    <div id="root"></div>
  </body>
</html>