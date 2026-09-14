<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, nofollow">
    <title>{{ $title ?? __('landing.brand') }} - Investment Collaboration Platform</title>
    <meta name="description" content="{{ __('landing.hero.subtitle') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <!-- Google Fonts: Plus Jakarta Sans, Inter, Cairo -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <!-- Material Symbols Outlined -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <!-- Tailwind CSS v3 -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              colors: {
                "on-secondary-container": "#706000",
                "on-tertiary-fixed-variant": "#13487d",
                "secondary-container": "#fedc00",
                "on-primary-fixed": "#001c39",
                "tertiary-fixed": "#d4e3ff",
                "on-tertiary": "#ffffff",
                "surface-container-highest": "#dce2f7",
                "inverse-on-surface": "#edf0ff",
                "secondary-fixed-dim": "#e4c500",
                "on-tertiary-container": "#b7d3ff",
                "on-secondary-fixed-variant": "#524600",
                "secondary": "#6d5e00",
                "outline-variant": "#c1c6d3",
                "surface-container-lowest": "#ffffff",
                "tertiary-container": "#2d5b92",
                "surface-dim": "#d3daef",
                "error-container": "#ffdad6",
                "surface": "#f9f9ff",
                "surface-tint": "#0e5faa",
                "tertiary-fixed-dim": "#a4c9ff",
                "on-primary-container": "#b8d3ff",
                "on-background": "#141b2b",
                "on-secondary-fixed": "#211b00",
                "surface-container-low": "#f1f3ff",
                "on-error": "#ffffff",
                "primary-container": "#005ba5",
                "outline": "#727782",
                "surface-bright": "#f9f9ff",
                "on-secondary": "#ffffff",
                "on-tertiary-fixed": "#001c39",
                "on-surface-variant": "#414751",
                "background": "#f9f9ff",
                "primary": "#00437d",
                "on-error-container": "#93000a",
                "on-primary": "#ffffff",
                "on-primary-fixed-variant": "#004884",
                "surface-container-high": "#e1e8fd",
                "primary-fixed-dim": "#a4c9ff",
                "primary-fixed": "#d4e3ff",
                "inverse-surface": "#293040",
                "secondary-fixed": "#ffe252",
                "surface-variant": "#dce2f7",
                "surface-container": "#e9edff",
                "error": "#ba1a1a",
                "inverse-primary": "#a4c9ff",
                "tertiary": "#0b4378",
                "on-surface": "#141b2b"
              },
              borderRadius: {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"
              },
              spacing: {
                "space-xs": "0.25rem",
                "space-sm": "0.5rem",
                "space-md": "1rem",
                "space-2xl": "3rem",
                "gutter-mobile": "1rem",
                "margin-mobile": "1rem",
                "gutter": "1.5rem",
                "space-xl": "2rem",
                "space-3xl": "4.5rem",
                "margin": "2rem",
                "space-lg": "1.5rem"
              },
              fontFamily: {
                "body-sm": ["Inter", "Cairo", "sans-serif"],
                "headline-xl": ["Plus Jakarta Sans", "Cairo", "sans-serif"],
                "title-md": ["Plus Jakarta Sans", "Cairo", "sans-serif"],
                "display-mobile": ["Plus Jakarta Sans", "Cairo", "sans-serif"],
                "body-md": ["Inter", "Cairo", "sans-serif"],
                "body-lg": ["Inter", "Cairo", "sans-serif"],
                "label-md": ["Plus Jakarta Sans", "Cairo", "sans-serif"],
                "headline-xl-mobile": ["Plus Jakarta Sans", "Cairo", "sans-serif"],
                "caption": ["Inter", "Cairo", "sans-serif"],
                "headline-sm": ["Plus Jakarta Sans", "Cairo", "sans-serif"],
                "headline-lg": ["Plus Jakarta Sans", "Cairo", "sans-serif"],
                "display": ["Plus Jakarta Sans", "Cairo", "sans-serif"],
                "headline-lg-mobile": ["Plus Jakarta Sans", "Cairo", "sans-serif"],
                "headline-md": ["Plus Jakarta Sans", "Cairo", "sans-serif"],
                "label-lg": ["Plus Jakarta Sans", "Cairo", "sans-serif"]
              },
              fontSize: {
                "body-sm": ["14px", { "lineHeight": "20px", "fontWeight": "400" }],
                "headline-xl": ["44px", { "lineHeight": "52px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                "title-md": ["18px", { "lineHeight": "26px", "fontWeight": "600" }],
                "display-mobile": ["36px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "600" }],
                "headline-xl-mobile": ["30px", { "lineHeight": "38px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
                "caption": ["12px", { "lineHeight": "16px", "fontWeight": "500" }],
                "headline-sm": ["20px", { "lineHeight": "28px", "fontWeight": "600" }],
                "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
                "display": ["56px", { "lineHeight": "64px", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                "headline-lg-mobile": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
                "headline-md": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
                "label-lg": ["14px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600" }]
              }
            }
          }
        }
    </script>
    <style>
        .material-symbols-outlined {
          font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
          display: inline-block;
          vertical-align: middle;
          line-height: 1;
        }
        [dir="rtl"] .rtl-flip {
          transform: scaleX(-1);
        }
        .custom-gradient-btn {
          background: linear-gradient(135deg, #005BA5 0%, #003E73 100%);
        }
        .hero-pattern {
          background-image: radial-gradient(rgba(0, 91, 165, 0.08) 1px, transparent 1px);
          background-size: 28px 28px;
        }
    </style>
    @livewireStyles
</head>
<body class="bg-background text-on-surface antialiased overflow-x-hidden selection:bg-secondary-container selection:text-on-secondary-fixed">
    {{ $slot }}
    @livewireScripts
</body>
</html>
