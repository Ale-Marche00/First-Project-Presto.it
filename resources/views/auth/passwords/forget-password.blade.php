<x-layouts.layout>

    <x-slot:head>@vite('resources/css/auth.css')</x-slot:head>
    <x-slot:script>@vite('resources/js/auth.js')</x-slot:script>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow-lg" style="max-width: 500px; width: 100%;">
            <h1 class="text-center mb-4">Recupera Password</h1>
            
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('forget.password.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Inserisci la tua email" required>
                    @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Invia</button>
                </div>
            </form>

            <div class="mt-3 text-center">
                <p>Hai dimenticato la password?</p>
                <a href="{{ route('login') }}" class="btn btn-link">Torna al login</a>
            </div>
        </div>
    </div>

</x-layouts.layout>
