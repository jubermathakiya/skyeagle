 
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Welcome to Sky Eagle Trip</title>
</head>

<body style="margin:0;padding:0;background:#f4f6f9;font-family:Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f9;padding:40px 0;">
        <tr>
            <td align="center">

                <table width="650" cellpadding="0" cellspacing="0"
                    style="background:#ffffff;border-radius:10px;overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td align="center"
                            style="background:#0d6efd;padding:40px;color:#ffffff;font-size:32px;font-weight:bold;">
                            Sky Eagle Trip
                        </td>
                    </tr>

                    <!-- Banner -->
                    @php
                        $bannerSrc = null;

                        if (!empty($bannerImagePath) && isset($message) && is_file($bannerImagePath)) {
                            $bannerSrc = $message->embed($bannerImagePath);
                        } elseif (!empty($bannerImage)) {
                            $bannerSrc = $bannerImage;
                        }
                    @endphp
                    @if($bannerSrc)
                    <tr>
                        <td align="center">
                            <img
                                src="{{ $bannerSrc }}"
                                alt="Newsletter Banner"
                                width="650"
                                style="display:block;width:100%;max-width:650px;height:auto;border:0;"
                            >
                        </td>
                    </tr>
                    @endif

                    <!-- Content -->
                    <tr>
                        <td style="padding:40px;">

                            <h2 style="margin-top:0;color:#333;">
                                Thank You for Subscribing!
                            </h2>

                            <p style="font-size:16px;color:#555;line-height:1.8;">
                                Welcome to <strong>Sky Eagle Trip</strong>.
                            </p>

                            <p style="font-size:16px;color:#555;line-height:1.8;">
                                Thank you for joining our travel community.
                                You'll now receive exclusive travel offers,
                                flight deals, holiday packages, travel tips,
                                destination guides, and special promotions directly in your inbox.
                            </p>

                            <p style="font-size:16px;color:#555;line-height:1.8;">
                                We are excited to help you discover amazing destinations
                                and unforgettable travel experiences around the world.
                            </p>

                            <div style="text-align:center;margin:40px 0;">
                                <a href="http://72.61.171.35/"
                                    style="background:#0d6efd;color:#ffffff;
                                           padding:14px 30px;
                                           text-decoration:none;
                                           border-radius:5px;
                                           font-weight:bold;">
                                    Explore Our Website
                                </a>
                            </div>

                            <p style="font-size:14px;color:#888;">
                                Subscription Email:
                                <strong>{{ $email }}</strong>
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f8f9fa;padding:25px;text-align:center;">

                            <p style="margin:0;color:#666;font-size:14px;">
                                © {{ date('Y') }} Sky Eagle Trip.
                                All Rights Reserved.
                            </p>

                            <p style="margin-top:10px;color:#999;font-size:12px;">
                                Thank you for trusting Sky Eagle Trip for your travel journeys.
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
