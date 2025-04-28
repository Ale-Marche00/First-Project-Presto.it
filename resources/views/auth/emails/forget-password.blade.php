<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recupero Password</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #007bff;
            padding: 30px;
            text-align: center;
            color: #ffffff;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 30px;
            text-align: center;
        }

        .content p {
            font-size: 16px;
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .footer {
            background-color: #f7f7f7;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        @media (max-width: 600px) {
            .container {
                width: 100% !important;
                padding: 15px;
            }

            .header h1 {
                font-size: 20px;
            }

            .btn {
                font-size: 16px;
                padding: 12px 25px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h1>Recupero Password</h1>
        </div>

        <!-- Content Section -->
        <div class="content">
            <p>Hai richiesto di resettare la tua password. Clicca sul pulsante qui sotto per procedere:</p>
            <a href="{{ route('reset.password', $token) }}" class="btn">Resetta la Password</a>
            <p style="margin-top: 20px; font-size: 14px; color: #777;">Se non hai fatto questa richiesta, ignora questa e-mail.</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Il Tuo Sito. Tutti i diritti riservati.</p>
            <p>Per qualsiasi domanda, visita il nostro <a href="">Centro Assistenza</a>.</p>
        </div>
    </div>

</body>
</html>
