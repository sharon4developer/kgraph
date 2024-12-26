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
                <h2>Eligibility Check Submission</h2>
                <p>Here are the details submitted:</p>

                <div class="field"><strong>First Name:</strong> {{ $data['first_name'] }}</div>
                <div class="field"><strong>Last Name:</strong> {{ $data['last_name'] }}</div>
                <div class="field"><strong>Email:</strong> {{ $data['email'] }}</div>
                <div class="field"><strong>Address:</strong> {{ $data['street_address'] }}</div>
                <div class="field"><strong>Citizenship:</strong> {{ $data['city'] }}</div>
                <div class="field"><strong>Canadian Experience:</strong> {{ $data['state'] }}</div>
                <div class="field"><strong>Foreign Experience:</strong> {{ $data['zip'] }}</div>
                <div class="field"><strong>Mobile Number:</strong> {{ $data['mobile'] }}</div>
                <div class="field"><strong>Date of Birth:</strong> {{ $data['dob'] }}</div>
                <div class="field"><strong>Marital Status:</strong> {{ $data['marital_status'] }}</div>
                <div class="field"><strong>How Did you Hear about Us:</strong> {{ $data['hear_about_canada'] }}</div>
                <div class="field"><strong>Do you have a valid Language Skills Test Result:</strong> {{ $data['country_of_studies'] }}</div>
                <div class="field"><strong>Highest Level of Education:</strong> {{ $data['highest_education_inside_can'] }}</div>
                <div class="field"><strong>Canadian Education:</strong> {{ $data['certificate_of_qualification'] }}</div>
                <div class="field"><strong>Family Relation in Canada:</strong> {{ $data['family_relations_in_canada'] }}</div>
                <div class="field"><strong>Previous Visa Refusal:</strong> {{ $data['refused_or_cancelled_visa'] }}</div>
                <div class="field"><strong>Criminal Record:</strong> {{ $data['criminal_record'] }}</div>
                <div class="field"><strong>Additional Information:</strong> {{ $data['detained'] }}</div>

                @if ($data['country_of_studies'] == 'Yes')
                    <h3>Language Test Details</h3>
                    <div class="field"><strong>Language Test:</strong> {{ $data['language_test'] }}</div>
                    <div class="field"><strong>Speaking:</strong> {{ $data['speaking'] }}</div>
                    <div class="field"><strong>Reading:</strong> {{ $data['reading'] }}</div>
                    <div class="field"><strong>Listening:</strong> {{ $data['listening'] }}</div>
                    <div class="field"><strong>Writing:</strong> {{ $data['writing'] }}</div>
                @endif
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
