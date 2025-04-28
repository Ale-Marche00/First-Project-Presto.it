<x-layouts.layout>
    <x-slot:head>@vite('resources/css/auth.css')</x-slot:head>
    <x-slot:script>@vite('resources/js/auth.js')</x-slot:script>

    <div class="container">
        <!-- Header Section -->
        <div class="text-center my-4">
            <h1 class="display-4 text-primary">Recupera la tua Password</h1>
        </div>

        <!-- Error and Success Messages -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Password Reset Form -->
        <form action="{{ route('reset.password.post') }}" method="POST">
            @csrf
            <input type="text" hidden value="{{ $token }}" name="token">

            <!-- Email Input -->
            <div class="mb-3">
                <label for="email" class="form-label">Indirizzo Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Inserisci la tua email"
                    required>
                @error('email')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Password Input -->
            <div class="mb-3">
                <label for="password" class="form-label">Nuova Password</label>
                <input type="password" name="password" id="password" class="form-control"
                    placeholder="Crea una nuova password" required>
                @error('password')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password Input -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Conferma Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                    placeholder="Conferma la tua password" required>
                @error('password_confirmation')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">Invia</button>
            </div>
        </form>
    </div>

    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .display-4 {
            font-weight: 700;
            color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px;
            font-size: 18px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .alert {
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</x-layouts.layout>