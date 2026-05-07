<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkyEagle Password Reset OTP</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f7fb; font-family: Arial, Helvetica, sans-serif; color:#1f2937;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f7fb; padding:30px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:640px; background:#ffffff; border-radius:16px; overflow:hidden; border:1px solid #e5e7eb;">
                    <!-- Header -->
                    <tr>
                        <td style="background:linear-gradient(135deg,#0b3c74,#0d5ea8); padding:28px 30px;">
                            <table width="100%" role="presentation" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="left" style="color:#ffffff; font-size:24px; font-weight:700; letter-spacing:0.5px;">
                                        SkyEagle
                                    </td>
                                    <td align="right" style="color:#cde6ff; font-size:12px;">
                                        Secure Account Communication
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
                                We received a request to reset your SkyEagle account password.
                                Please use the OTP below to continue.
                            </p>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin:0 0 18px 0;">
                                <tr>
                                    <td align="center" style="background:#eff6ff; border:1px dashed #93c5fd; border-radius:12px; padding:20px;">
                                        <p style="margin:0; font-size:13px; color:#1e40af; letter-spacing:0.5px;">YOUR VERIFICATION OTP</p>
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
                                If you did not request a password reset, you can safely ignore this email.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding:20px 30px; background:#f9fafb; border-top:1px solid #e5e7eb;">
                            <p style="margin:0 0 6px 0; font-size:13px; color:#374151;">
                                Regards,<br>
                                <strong>SkyEagle Security Team</strong>
                            </p>
                            <p style="margin:0; font-size:12px; color:#9ca3af;">
                                This is an automated email. Please do not reply directly.
                            </p>
                        </td>
                    </tr>
                </table>

                <p style="margin:14px 0 0 0; font-size:11px; color:#9ca3af;">
                    © {{ date('Y') }} SkyEagle. All rights reserved.
                </p>
            </td>
        </tr>
    </table>
</body>
</html>