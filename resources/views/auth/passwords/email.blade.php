<!-- resources/views/auth/passwords/email.blade.php -->
<x-layouts.layout>
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card text-center shadow-sm border-light" style="width: 100%; max-width: 400px;">
                <div class="card-header h5 text-white bg-primary">
                    {{ __('Password Reset') }}
                </div>
                <div class="card-body px-5">
                    <p class="card-text py-2">
                        {{ __("Enter your email address and we'll send you an email with instructions to reset your password.") }}
                    </p>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div data-mdb-input-init class="form-outline">
                            <input id="email" type="email" class="form-control my-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            <label class="form-label" for="email">{{ __('Email Address') }}</label>

                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 my-3">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </form>

                    <div class="d-flex justify-content-between mt-4">
                        <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                        <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>
