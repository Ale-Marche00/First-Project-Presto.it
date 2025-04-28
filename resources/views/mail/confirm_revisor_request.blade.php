<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conferma richiesta revisore</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            background-color: #ffffff;
            margin: 40px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
        }

        p {
            line-height: 1.6;
            font-size: 16px;
        }

        .footer {
            margin-top: 40px;
            font-size: 14px;
            color: #888;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ciao {{ $user->name }},</h1>
        <p>Abbiamo ricevuto la tua richiesta per diventare revisore su <strong>Presto.it</strong>.</p>
        <p>Il nostro team esaminerà la tua candidatura e ti risponderà al più presto.</p>
        <p>Grazie per il tuo interesse!</p>
        <div class="footer">
            <p>Lo staff di Presto.it</p>
        </div>
    </div>
</body>
</html>