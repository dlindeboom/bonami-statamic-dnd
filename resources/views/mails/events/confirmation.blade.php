@php
    use Statamic\Facades\GlobalSet;use Statamic\Facades\Site;

    $site = Site::get('default');
    $set = GlobalSet::findByHandle('address_info');
    $addressInfo = $set->inDefaultSite();
    $iconUrl = 'storage/' .  $addressInfo->get('logo_color');
@endphp


    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style type="text/css">
        body, html {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        .email-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
        }

        .email-header {
            background-color: #003366; /* Dark gray */
            text-align: center;
            padding: 5px;
            color: white;
        }

        .email-body {
            padding: 0 20px;
            background-color: #ffffff; /* White */
            color: #303030; /* Lighter gray for text */
        }

        .email-footer {
            background-color: #3d3d3d; /* Slightly lighter gray than the header */
            color: #f4f4f4; /* Very light gray, almost white */
            padding: 20px;
            text-align: center;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #e10600; /* Bonami red */
            color: #ffffff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }

        .text-muted {
            color: #d1d1d1; /* Medium gray */
        }

        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100%;
            }
        }
    </style>

</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" class="email-container">
    <tr>
        <td class="email-header">
            <!-- Header Content -->
            <img src="{{ asset($iconUrl) ?? "" }}" alt="Bonami Games & Computers Museum Logo" width="125">
        </td>
    </tr>
    <tr>
        <td class="email-body">
            <h2>Your session confirmation</h2>

            <p>Thank you for reserving your spot! Here are the essential details for the upcoming event:</p>

            <p><strong>When:</strong> Sunday, March 24, 2024, at 13:30 <br>
                <strong>Where:</strong> Bonami SpelComputer Museum, Ossenkamp 4, 8024AE Zwolle</p>

            <p>For more information about the event, please visit the link below</p>
            <div style="text-align: center">
                <a href="https://bonami-dnd.orillion.nl" class="btn-primary">Event details</a>
            </div>


            <p>We're excited to have you join for an adventure-filled day. If you have any questions or need further
                information, please don't hesitate to reach out.</p>

            <p>See you at the museum for a thrilling D&D experience!</p>
        </td>
    </tr>
    <tr>
        <td class="email-footer">
            <!-- Footer Content -->
            <p class="text-muted">You're receiving this email because you signed up at our website.</p>
            <p>© {{ date('Y') }} Bonami Games & Computers Museum. All rights reserved.</p>
        </td>
    </tr>
</table>
</body>
</html>
