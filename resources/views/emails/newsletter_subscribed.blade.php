<!DOCTYPE html>
<html>
<head>
    <title>Newsletter Subscription</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <div style="background-color: #f4f4f4; padding: 20px;">
        <div style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <!-- Header Image -->
            <div style="text-align: center; margin-bottom: 20px;">
                <img src="{{asset('assets/KgraphLogo.png')}}" alt="Newsletter Subscription" style="max-width: 100%; border-radius: 8px 8px 0 0;">
            </div>
            <!-- Content -->
            <h1 style="text-align: center; color: #333333;">Thank You for Subscribing!</h1>
            <p style="color: #555555; text-align: center;">
                Hi there,
                <br><br>
                Thank you for subscribing to our newsletter!
                <br><br>
                Stay tuned for more exciting updates!
            </p>
            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ url('/') }}" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Visit Our Website</a>
            </div>
            <div style="margin-top: 20px; padding-top: 16px; border-top: 1px solid #eeeeee; color: #888888; text-align: center; font-size: 13px; line-height: 1.6;">
                <p style="margin: 0 0 6px 0; font-weight: bold; color: #555555;">KGraph Immigration Consultancy Inc.</p>
                <p style="margin: 0 0 12px 0;">
                    <a href="{{ url('/') }}" style="color: #4CAF50; text-decoration: none;">{{ preg_replace('#^https?://#', '', rtrim(url('/'), '/')) }}</a>
                    &nbsp;|&nbsp;
                    <a href="{{ url('contact-us') }}" style="color: #4CAF50; text-decoration: none;">Contact KGraph</a>
                </p>
                <p style="margin: 0 0 8px 0; font-size: 12px;">
                    <strong>Confidentiality notice:</strong> This automated email is intended only for the named recipient and may contain confidential case information. If you received it in error, please delete it and contact KGraph.
                </p>
                <p style="margin: 0; font-size: 12px;">Please do not reply to this email.</p>
            </div>
        </div>
    </div>
</body>
</html>
