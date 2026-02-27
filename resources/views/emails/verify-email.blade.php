<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('auth.verify_email.title') }}</title>
    <style>
        /* Base styles for email clients */
        body {
            margin: 0;
            padding: 0;
            width: 100% !important;
            height: 100% !important;
            background-color: #f8f9fa;
            font-family: 'Cairo', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        table {
            border-spacing: 0;
            border-collapse: collapse;
        }
        img {
            border: 0;
            -ms-interpolation-mode: bicubic;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f8f9fa;
            padding-bottom: 40px;
        }
        .main-content {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .header {
            padding: 40px 0;
            text-align: center;
            background-color: #ffffff;
        }
        .content-body {
            padding: 0 40px 40px;
            text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};
        }
        .title {
            color: #1e293b;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 16px;
        }
        .message {
            color: #64748b;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 32px;
        }
        .btn-container {
            text-align: center;
            margin-bottom: 32px;
        }
        .button {
            display: inline-block;
            padding: 14px 32px;
            background-color: #3b82f6; /* Primary color */
            background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%); /* Inspired gradient */
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        .footer {
            padding: 24px;
            text-align: center;
            color: #94a3b8;
            font-size: 14px;
            background-color: #f8f9fa;
            border-top: 1px solid #e2e8f0;
        }
        .divider {
            height: 1px;
            background-color: #e2e8f0;
            margin: 32px 0;
        }
        .alt-text {
            font-size: 13px;
            color: #94a3b8;
            word-break: break-all;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <a href="{{ config('app.url') }}" target="_blank" style="text-decoration: none;">
                <img src="{{ config('app.url') }}/images/logo.svg" alt="{{ __('Investor Platform') }}" width="120" style="display: block; margin: 0 auto; border: 0;">
                <span style="color: #1e293b; font-size: 24px; font-weight: 800; font-family: 'Cairo', sans-serif;">{{ __('Investor Platform') }}</span>
            </a>
        </div>
        
        <div class="main-content">
            <div class="content-body">
                <div style="padding-top: 40px;"></div>
                <h1 class="title">{{ __('auth.verify_email.title') }}</h1>
                <p class="message">
                    @if(app()->getLocale() === 'ar')
                        مرحباً {{ $name }}،<br><br>
                        شكراً لانضمامك إلينا! يرجى الضغط على الزر أدناه لتفعيل حسابك والبدء في استكشاف الفرص الاستثمارية.
                    @else
                        Hello {{ $name }},<br><br>
                        Thanks for joining us! Please click the button below to verify your email address and start exploring investment opportunities.
                    @endif
                </p>
                
                <div class="btn-container">
                    <a href="{{ $url }}" class="button" target="_blank">
                        {{ __('auth.verify_email.title') }}
                    </a>
                </div>
                
                <p class="message" style="font-size: 14px; margin-bottom: 0;">
                    @if(app()->getLocale() === 'ar')
                        إذا لم تقم بإنشاء هذا الحساب، فلا داعي لاتخاذ أي إجراء آخر.
                    @else
                        If you did not create an account, no further action is required.
                    @endif
                </p>
                
                <div class="divider"></div>
                
                <p class="alt-text">
                    @if(app()->getLocale() === 'ar')
                        إذا كنت تواجه مشكلة في الضغط على زر "تحقق من بريدك الإلكتروني"، قم بنسخ الرابط التالي ولصقه في متصفحك:
                    @else
                        If you're having trouble clicking the "Verify Your Email Address" button, copy and paste the URL below into your web browser:
                    @endif
                    <br>
                    <a href="{{ $url }}" style="color: #667eea; text-decoration: underline;">{{ $url }}</a>
                </p>
            </div>
        </div>
        
        <div class="footer">
            &copy; {{ date('Y') }} {{ __('Investor Platform') }}. {{ __('All rights reserved.') }}
        </div>
    </div>
</body>
</html>
