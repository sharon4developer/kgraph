<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <div style="background-color: #f4f4f4; padding: 20px;">
        <div style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <!-- Header Image -->
            <div style="text-align: center; margin-bottom: 20px;">
                <img src="{{asset('assets/KgraphLogo.png')}}" alt="New Contact Message" style="max-width: 100%; border-radius: 8px 8px 0 0;">
            </div>
            <!-- Content -->
            <h1 style="text-align: center; color: #333333;">New Contact Message</h1>
            <p style="color: #555555;">
                A new contact message has been received with the following details:
            </p>
            <p style="color: #555555;"><strong>Name:</strong> {{ $contactData['name'] }}</p>
            <p style="color: #555555;"><strong>Email:</strong> {{ $contactData['email'] }}</p>
            <p style="color: #555555;"><strong>Mobile:</strong> {{ $contactData['mobile'] }}</p>
            <p style="color: #555555;"><strong>Message:</strong></p>
            <p style="color: #555555;">{{ $contactData['message'] }}</p>
            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ url('/') }}" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Visit Our Website</a>
            </div>
            <p style="margin-top: 20px; color: #888888; text-align: center;">
                If you have any questions, feel free to contact us at <a href="mailto:support@k-graph.com" style="color: #4CAF50; text-decoration: none;">support@k-graph.com</a>.
            </p>
        </div>
    </div>
</body>
</html>
