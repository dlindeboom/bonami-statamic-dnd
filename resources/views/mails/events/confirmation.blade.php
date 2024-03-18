@php
    use Carbon\Translator;use Illuminate\Support\Carbon;
    /** @var \Statamic\Entries\Entry $event */
    /** @var array{name:string, logo_color: string, street: string, postal_code:string, city:string} $addressInfo */


   ;$addressInfo = $addressInfo ?? [];
    $street = $addressInfo['street'] ?? '';
    $zip = $addressInfo['postal_code'] ?? '';
    $name = $addressInfo['name'] ?? '';
    $iconUrl = $addressInfo['logo_color'] ?? '';
    $city = $addressInfo['city'] ?? '';
    /** @var Carbon $eventDate */
    $eventDate = $event->event_date;
    $eventDate->setLocalTranslator(Translator::get('nl'));
@endphp
    <!DOCTYPE html>
<html lang="nl">
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
            padding: 30px;
            background-color: #ffffff; /* White */
            color: #303030; /* Lighter gray for text */
        }

        .email-footer {
            background-color: #3d3d3d; /* Slightly lighter gray than the header */
            color: #f4f4f4; /* Very light gray, almost white */
            padding: 30px 20px;
            text-align: center;
            font-size: 14px;
        }

        .email-footer p {
            margin: 0;
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
            <h2 style="margin-top: 0">Je sessiebevestiging</h2>

            <p>Super dat je je hebt aangemeld! Hier zijn de belangrijkste details voor het aankomende evenement:</p>

            <p>
                <strong>Wanneer:</strong> {{ $eventDate->isoFormat('dddd D MMMM YYYY, [om] HH:mm') }}<br>
                <strong>Waar:</strong> {{ $name }}, {{ $street }}, {{ $zip }} {{ $city }}</p>

            <p>Voor meer info over het evenement, check de link hieronder</p>
            <div style="text-align: center">
                <a href="{{ $event->absoluteUrl() }}" class="btn-primary">Evenement details</a>
            </div>

            <p>We kijken er naar uit om samen een avontuurlijke dag te beleven. Heb je nog vragen of wil je meer weten,
                schroom dan niet om contact op te nemen.</p>

            <p style="margin-bottom: 0">Zie je in het museum voor een te gekke D&D ervaring!</p>

        </td>
    </tr>
    <tr>
        <td class="email-footer">
            <p class="text-muted">Je ontvangt deze e-mail omdat je je hebt aangemeld op onze website.</p>
            <p>© {{ date('Y') }} Bonami SpelComputer Museum. Alle rechten voorbehouden.</p>
        </td>
    </tr>
</table>
</body>
</html>
