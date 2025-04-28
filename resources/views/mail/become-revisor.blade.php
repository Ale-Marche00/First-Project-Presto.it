<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it - Richiesta Revisore</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h1 class="card-title text-center text-primary">Richiesta Revisore</h1>
                        <h2 class="text-center">Ecco i suoi dati:</h2>
                        <hr>
                        <p><strong>Nome:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <div class="text-center mt-4">
                            <!-- Bottone per accettare la richiesta -->
                            <a href="{{ route('make.revisor', ['user' => $user]) }}" class="btn btn-primary">
                                Rendi Revisore
                            </a>

                            <!-- Bottone per rifiutare la richiesta -->
                            <a href="{{ route('reject.revisor', compact('user')) }}" class="btn btn-danger ms-3">
                                Rifiuta Richiesta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (opzionale) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
