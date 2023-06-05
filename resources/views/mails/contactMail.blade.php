<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Nouveau message de contact</title>
    <style>
        /* Email body styles */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .mail-container {
            width: 50%;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        .mail-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .mail-header h2 {
            font-size: 24px;
        }

        .mail-content {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        .mail-content .from {
            margin-bottom: 20px;
        }

        .mail-content .subject {
            margin-bottom: 20px;
        }

        .mail-content .message {
            margin-bottom: 20px;
        }

        .mail-content .message p {
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="mail-container">
        <div class="mail-header">
            <h2>
                Nouveau message de contact {{ $mailData['name'] }}
            </h2>
        </div>
        <div class="mail-content">
            <div class="from">
                <h3>De: {{ $mailData['email'] }}</h3>
            </div>
            <div class="subject">
                <h3>sujet: {{ $mailData['subject'] }}</h3>

            </div>
            <div class="message">
                <h3>Message:</h3>
                <p>{{ $mailData['message'] }}</p>
            </div>

        </div>

    </div>
</body>

</html>
