<!DOCTYPE html>
<html>
<head>
    <title>Thank You for Your Consultation Request</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <div style="background-color: #f4f4f4; padding: 20px;">
        <div style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div style="text-align: center; margin-bottom: 20px;">
                <img src="{{ asset('assets/KgraphLogo.png') }}" alt="KGraph" style="max-width: 100%; border-radius: 8px 8px 0 0;">
            </div>
            <h1 style="text-align: center; color: #333333;">Thank You for Your Interest!</h1>
            <p style="color: #555555;">
                Dear {{ $contactData['name'] }},
            </p>
            <p style="color: #555555;">
                Thank you for booking your free consultation with KGraph. We have received your request and our team will get back to you soon.
            </p>
            @isset($contactData['service_of_interest'])
            <p style="color: #555555;">
                <strong>Service of Interest:</strong> {{ $contactData['service_of_interest'] }}
            </p>
            @endisset
            @isset($contactData['preferred_contact_method'])
            <p style="color: #555555;">
                <strong>Preferred Contact Method:</strong> {{ ucfirst($contactData['preferred_contact_method']) }}
            </p>
            @endisset
            <p style="color: #555555;">
                Our team typically responds within 24-48 hours. If you have any urgent questions, please feel free to contact us directly.
            </p>
            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ url('/') }}" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Visit Our Website</a>
            </div>
            <p style="margin-top: 20px; color: #888888; text-align: center;">
                Best regards,<br>
                The KGraph Team<br>
                <a href="mailto:support@k-graph.com" style="color: #4CAF50; text-decoration: none;">support@k-graph.com</a>
            </p>
        </div>
    </div>
</body>
</html>

