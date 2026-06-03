<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sky Eagle Trip Login OTP</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f7fb; font-family: Arial, Helvetica, sans-serif; color:#1f2937;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f7fb; padding:30px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:640px; background:#ffffff; border-radius:16px; overflow:hidden; border:1px solid #e5e7eb; box-shadow:0 8px 24px rgba(15, 23, 42, 0.08);">
                    <!-- Header -->
                    <tr>
                        <td style="background:linear-gradient(135deg,#0b3c74,#0d5ea8); padding:28px 30px;">
                            <table width="100%" role="presentation" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="left" valign="middle">
                                        <img src="{{ url('assets/img/sky_logo.png') }}" alt="Sky Eagle Trip" width="72" height="72" style="display:block; border:0; border-radius:8px; background:#ffffff; padding:6px;">
                                    </td>
                                    <td align="right" valign="middle" style="color:#ffffff; font-size:20px; font-weight:700; letter-spacing:0.3px; line-height:1.3;">
                                        Sky Eagle Trip
                                        <span style="display:block; font-size:12px; font-weight:500; color:#cde6ff; margin-top:4px;">Secure Sign In</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:30px;">
                            <p style="margin:0 0 12px 0; font-size:15px;">Hi {{ $userName }},</p>

                            <p style="margin:0 0 18px 0; line-height:1.6; font-size:15px; color:#374151;">
                                Use the one-time password below to sign in to your Sky Eagle Trip account.
                            </p>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin:0 0 18px 0;">
                                <tr>
                                    <td align="center" style="background:#eff6ff; border:1px dashed #93c5fd; border-radius:12px; padding:20px;">
                                        <p style="margin:0; font-size:13px; color:#1e40af; letter-spacing:0.5px; text-transform:uppercase;">Your Login OTP</p>
                                        <p style="margin:8px 0 0 0; font-size:34px; font-weight:700; letter-spacing:6px; color:#0b3c74;">
                                            {{ $otp }}
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:0 0 10px 0; font-size:14px; color:#111827;">
                                This OTP is valid for <strong>{{ $expiresIn }}</strong>.
                            </p>

                            <p style="margin:0; line-height:1.6; font-size:14px; color:#6b7280;">
                                For your security, do not share this OTP with anyone.
                                If you did not try to sign in, you can safely ignore this email.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding:20px 30px; background:#f9fafb; border-top:1px solid #e5e7eb;">
                            <p style="margin:0 0 6px 0; font-size:13px; color:#374151;">
                                Regards,<br>
                                <strong>Sky Eagle Trip Team</strong>
                            </p>
                            <p style="margin:0 0 8px 0; font-size:12px; color:#9ca3af;">
                                Toll Free: +91 89800 46600 &nbsp;|&nbsp; info@skyeagletrip.com
                            </p>
                            <p style="margin:0; font-size:12px; color:#9ca3af;">
                                This is an automated email. Please do not reply directly.
                            </p>
                        </td>
                    </tr>
                </table>

                <p style="margin:14px 0 0 0; font-size:11px; color:#9ca3af;">
                    © {{ date('Y') }} Sky Eagle Trip. All rights reserved.
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
