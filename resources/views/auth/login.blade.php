<x-layouts.layout>
    @section('body-class', 'pt-custom, bg-custom')

    <x-slot:head>@vite('resources/css/auth.css')</x-slot:head>
    <x-slot:script>@vite('resources/js/auth.js')</x-slot:script>


    <div class="my-auto">
        <div class="container-auth @if ($errors->has('name') || $errors->has('password_confirmation')) active @endif my-100">
        
        
            <!-- Form di Login -->
            <div class="auth-form-box auth-login">
                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf
                    <h1 id="login-h1">{{ __('ui.login') }}</h1>

                    <div class="auth-input-box">
                        <input type="email" placeholder="Email" value="{{ old('email') }}" id="loginEmail" name="email" class="@error('email') error @enderror">
                        <i class='bx bxs-envelope'></i>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Campo Password -->
                    <div class="auth-input-box">
                        <input type="password" placeholder="Password" id="loginPassword" name="password" class="@error('password') error @enderror">
                        <i id="togglePassword" class="bx bxs-show"></i> <!-- Icona per alternare visibilità -->
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-forgot-link">
                        <a href="{{ route('forget.password') }}">{{ __('ui.retrive_password') }}</a>
                    </div>

                    <button type="submit" class="auth-btn">{{ __('ui.login') }}</button>
                    <p class="pt-2">{{ __('ui.else_login') }}</p>

                    <div class="auth-social-icons">
                        <a href="{{ route('auth.google') }}"><i class='bx bxl-google'></i></a>
                        <a href="#"><i class='bx bxl-facebook'></i></a>
                        <a href="#"><i class='bx bxl-github'></i></a>
                        <a href="#"><i class='bx bxl-linkedin'></i></a>
                    </div>
                </form>
            </div>

            <!-- Form di Registrazione -->
            <div class="auth-form-box auth-register">
                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf
                    <h1>{{ __('ui.signin') }}</h1>

                    <div class="auth-input-box">
                        <input type="text" placeholder="{{ __('ui.name') }}" value="{{ old('name') }}" required id="name" name="name" class="@error('name') error @enderror">
                        <i class='bx bxs-user'></i>
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-input-box">
                        <input type="email" placeholder="Email" value="{{ old('email') }}" required id="registerEmail" name="email" class="@error('email') error @enderror">
                        <i class='bx bxs-envelope'></i>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Campo Password -->
                    <div class="auth-input-box">
                        <input type="password" placeholder="Password" value="{{ old('password') }}" required id="password" name="password" class="@error('password') error @enderror">
                        <i id="togglePasswordRegister" class="bx bxs-show"></i> <!-- Icona per alternare visibilità -->
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Conferma Password -->
                    <div class="auth-input-box">
                        <input type="password" placeholder="{{ __('ui.password_confirm') }}" value="{{ old('password_confirmation') }}" required id="password_confirmation" name="password_confirmation">
                        <i id="togglePasswordRegister" class="bx bxs-show"></i>
                    </div>

                    <button type="submit" class="auth-btn" id="registerSubmitBtn">{{ __('ui.signin') }}</button>
                    <p class="pt-2">{{ __('ui.else_signin') }}</p>
                    <div class="auth-social-icons">
                        <a href="{{ route('auth.google') }}"><i class='bx bxl-google'></i></a>
                        <a href="#"><i class='bx bxl-facebook'></i></a>
                        <a href="#"><i class='bx bxl-github'></i></a>
                        <a href="#"><i class='bx bxl-linkedin'></i></a>
                    </div>
                </form>
            </div>

            <!-- Sezione di cambio vista -->
            <div class="auth-toggle-box">
                <div class="auth-toggle-panel auth-toggle-left">
                    <h1>{{ __('ui.welcome') }}</h1>
                    <p class="pt-2">{{ __('ui.no_account') }}</p>
                    <button class="auth-btn auth-register-btn">{{ __('ui.signin') }}</button>
                </div>
                <div class="auth-toggle-panel auth-toggle-right">
                    <h1>{{ __('ui.welcome_back') }}</h1>
                    <p>{{ __('ui.already_account') }}</p>
                    <button class="auth-btn auth-login-btn">{{ __('ui.login') }}</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const container = document.querySelector('.container-auth');
        const registerBtn = document.querySelector('.auth-register-btn');
        const loginBtn = document.querySelector('.auth-login-btn');

        const loginErrors = "{{ $errors->has('email') || $errors->has('password') ? '1' : '0' }}";
        const registerErrors = "{{ $errors->has('name') || $errors->has('password_confirmation') || ( $errors->has('email') && old('name') ) ? '1' : '0' }}";

        // Gestisci visibilità della password per login
        const togglePassword = document.getElementById('togglePassword');
        const loginPassword = document.getElementById('loginPassword');
        togglePassword.addEventListener('click', () => {
            const type = loginPassword.type === 'password' ? 'text' : 'password';
            loginPassword.type = type;
            togglePassword.classList.toggle('bxs-show');
            togglePassword.classList.toggle('bxs-hide');
        });

        const togglePasswordRegister = document.getElementById('togglePasswordRegister');
        const registerPassword = document.getElementById('password');
        togglePasswordRegister.addEventListener('click', () => {
            const type = registerPassword.type === 'password' ? 'text' : 'password';
            registerPassword.type = type;
            togglePasswordRegister.classList.toggle('bxs-show');
            togglePasswordRegister.classList.toggle('bxs-hide');
        });

        // Se ci sono errori nei form
        if (registerErrors === "1") {
            container.classList.add('active');
        } else if (loginErrors === "1") {
        } else if (loginErrors === "1") {
            container.classList.remove('active');
        }

        registerBtn.addEventListener('click', () => {
            container.classList.add('active');
            clearErrors();
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove('active');
            clearErrors();
        });

        function clearErrors() {
            document.querySelectorAll('.error-message').forEach(el => el.remove());
            document.querySelectorAll('.auth-input-box input.error').forEach(el => el.classList.remove('error'));
        }
    });
    </script>
    </script>
</x-layouts.layout>

