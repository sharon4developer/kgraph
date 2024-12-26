<!DOCTYPE html>
<html>
<head>
    <title>Career Application Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #f4f4f4;
            padding: 20px;
        }
        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header-image {
            text-align: center;
            margin-bottom: 20px;
        }
        .header-image img {
            max-width: 100%;
            border-radius: 8px 8px 0 0;
        }
        .content h1 {
            text-align: center;
            color: #333333;
        }
        .content p {
            color: #555555;
            line-height: 1.6;
        }
        .cta-button {
            text-align: center;
            margin-top: 20px;
        }
        .cta-button a {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #888888;
        }
        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="email-content">
            <!-- Header Image -->
            <div class="header-image">
                <img src="{{ asset('assets/KgraphLogo.png') }}" alt="New Contact Message">
            </div>
            <!-- Content -->
            <div class="content">
                <h1>Career Application Received</h1>
                <p>A new career application has been received with the following details:</p>
                @isset($contactData['jobName']) <p><strong>Job:</strong> {{ $contactData['jobName'] }} @endisset</p>
                <p><strong>Name:</strong> {{ $contactData['name'] }}</p>
                <p><strong>Email:</strong> {{ $contactData['email'] }}</p>
                <p><strong>Mobile:</strong> {{ $contactData['mobile'] }}</p>
                @isset($contactData['branchName']) <p><strong>Branch:</strong> {{ $contactData['branchName'] }} @endisset</p>
                @isset($contactData['departmentName']) <p><strong>Department:</strong> {{ $contactData['departmentName'] }} @endisset</p>
            </div>
            <!-- Call-to-Action Button -->
            <div class="cta-button">
                <a href="{{ url('/') }}">Visit Our Website</a>
            </div>
            <!-- Footer -->
            <div class="footer">
                <p>If you have any questions, feel free to contact us at
                    <a href="mailto:support@k-graph.com">support@k-graph.com</a>.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
