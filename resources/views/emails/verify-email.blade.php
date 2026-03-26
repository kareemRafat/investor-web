<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('auth.verify_email.title') }}</title>
    <style type="text/css">
        /* RESET STYLES */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; background-color: #f4f7fa; font-family: Arial, sans-serif; }

        /* MOBILE STYLES */
        @media screen and (max-width: 600px) {
            .container { width: 100% !important; }
            .content { padding: 20px !important; }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f7fa;">
    <!-- Background Table -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#f4f7fa" style="background-color: #f4f7fa;">
        <tr>
            <td align="center" style="padding: 20px 0;">
                
                <!-- Main Wrapper (Fixed width 600px) -->
                <table border="0" cellpadding="0" cellspacing="0" width="600" class="container" style="width: 600px; margin: 0 auto;">
                    
                    <!-- HEADER / LOGO & NAME -->
                    <tr>
                        <td align="center" style="padding: 30px 20px;">
                            <a href="{{ config('app.url') }}" target="_blank" style="text-decoration: none;">
                                <img src="{{ config('app.url') }}/images/logo.png" alt="{{ config('app.name') }}" width="120" border="0" style="display: block; margin: 0 auto; width: 120px;" />
                                <div style="font-family: Arial, sans-serif; font-size: 24px; color: #1a202c; font-weight: bold; margin-top: 15px; text-decoration: none;">
                                    {{ config('app.name') }}
                                </div>
                            </a>
                        </td>
                    </tr>

                    <!-- MAIN CARD -->
                    <tr>
                        <td bgcolor="#ffffff" style="background-color: #ffffff; padding: 0; border: 1px solid #e2e8f0;">
                            
                            <!-- Top Accent Bar -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td height="4" bgcolor="#667eea" style="background-color: #667eea; line-height: 4px; font-size: 4px;">&nbsp;</td>
                                </tr>
                            </table>

                            <!-- CONTENT AREA -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td class="content" style="padding: 40px; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}; font-family: Arial, sans-serif;">
                                        
                                        <h1 style="margin: 0 0 24px 0; color: #1a202c; font-size: 22px; font-weight: bold; line-height: 1.3; text-align: center;">
                                            {{ __('auth.verify_email.title') }}
                                        </h1>
                                        
                                        <p style="margin: 0 0 20px 0; color: #4a5568; font-size: 16px; line-height: 1.6;">
                                            @if(app()->getLocale() === 'ar')
                                                مرحباً <strong>{{ $name }}</strong>،
                                            @else
                                                Hello <strong>{{ $name }}</strong>,
                                            @endif
                                        </p>
                                        
                                        <p style="margin: 0 0 24px 0; color: #4a5568; font-size: 16px; line-height: 1.6;">
                                            @if(app()->getLocale() === 'ar')
                                                شكراً لانضمامك إلينا! نحن متحمسون لوجودك معنا. يرجى الضغط على الزر أدناه لتفعيل حسابك والبدء في استكشاف الفرص الاستثمارية.
                                            @else
                                                Thanks for joining us! We are thrilled to have you on board. Please click the button below to verify your email address and start exploring investment opportunities.
                                            @endif
                                        </p>
                                        
                                        <!-- Call to Action Button Table -->
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="center" style="padding: 10px 0 30px 0;">
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td align="center" bgcolor="#667eea" style="background-color: #667eea;">
                                                                <a href="{{ $url }}" target="_blank" style="display: inline-block; padding: 16px 36px; color: #ffffff; text-decoration: none; font-weight: bold; font-size: 16px; border: 1px solid #667eea;">
                                                                    {{ __('auth.verify_email.title') }}
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                        <p style="margin: 0; color: #718096; font-size: 14px; line-height: 1.5; text-align: center;">
                                            @if(app()->getLocale() === 'ar')
                                                إذا لم تقم بإنشاء حساب، فلا داعي لاتخاذ أي إجراء آخر.
                                            @else
                                                If you did not create an account, no further action is required.
                                            @endif
                                        </p>

                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td style="padding: 30px 20px; text-align: center; font-family: Arial, sans-serif;">
                            <div style="margin-bottom: 15px;">
                                <a href="{{ config('app.url') }}" style="color: #667eea; text-decoration: none; margin: 0 10px; font-size: 13px; font-weight: bold;">{{ __('header.home') }}</a>
                                <span style="color: #e2e8f0;">|</span>
                                <a href="{{ route('main.contact') }}" style="color: #667eea; text-decoration: none; margin: 0 10px; font-size: 13px; font-weight: bold;">{{ __('header.footer.support') }}</a>
                                <span style="color: #e2e8f0;">|</span>
                                <a href="{{ route('main.privacypolicy') }}" style="color: #667eea; text-decoration: none; margin: 0 10px; font-size: 13px; font-weight: bold;">{{ __('header.privacy') }}</a>
                            </div>
                            
                            <p style="margin: 0 0 8px 0; color: #a0aec0; font-size: 12px;">
                                &copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved.') }}
                            </p>
                            
                            <p style="margin: 0; color: #cbd5e0; font-size: 11px;">
                                @if(app()->getLocale() === 'ar')
                                    تلقيت هذا البريد لأنك قمت بالتسجيل في منصتنا.
                                @else
                                    You are receiving this email because you registered an account on our platform.
                                @endif
                            </p>
                        </td>
                    </tr>

                    <!-- RAW LINK FOOTER -->
                    <tr>
                        <td style="padding: 0 20px 40px 20px; text-align: center; font-family: Arial, sans-serif; color: #cbd5e0; font-size: 11px;">
                             @if(app()->getLocale() === 'ar')
                                تواجه مشكلة في الزر؟ انسخ الرابط:
                            @else
                                Trouble with the button? Copy the link:
                            @endif
                            <br/>
                            <a href="{{ $url }}" style="color: #667eea; text-decoration: underline;">{{ $url }}</a>
                        </td>
                    </tr>

                </table>
                
            </td>
        </tr>
    </table>
</body>
</html>
