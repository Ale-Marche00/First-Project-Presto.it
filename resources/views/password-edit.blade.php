<x-layouts.layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 text-center">{{ __('ui.change_password_title') }}</h4>
                    </div>

                    <div class="card-body">
                        {{-- Success --}}
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        {{-- Error --}}
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            @method('PUT')

                            {{-- Current password --}}
                            <div class="mb-3">
                                <label for="current_password" class="form-label">{{ __('ui.current_password') }}</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="form-control" required>
                                @error('current_password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- New password --}}
                            <div class="mb-3">
                                <label for="new_password" class="form-label">{{ __('ui.new_password') }}</label>
                                <input type="password" name="new_password" id="new_password" class="form-control"
                                    required oninput="checkPasswordStrength()">
                                <div id="password-strength" class="mt-2 small fw-bold"></div>
                                @error('new_password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Confirm new password --}}
                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">{{ __('ui.confirm_new_password') }}</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                    class="form-control" required>
                                @error('new_password_confirmation')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Remaining attempts --}}
                            <div class="mb-4">
                                <p class="mb-0 text-muted">
                                    {{ __('ui.remaining_attempts') }}: 
                                    <strong class="text-danger">{{ session('remaining_attempts', 3) }}</strong>
                                </p>
                            </div>

                            {{-- Submit button --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="bi bi-shield-lock-fill me-1"></i> {{ __('ui.update_password_button') }}
                                </button>
                            </div>
                        </form>

                        {{-- Forgot password link --}}
                        <div class="mt-3 text-center">
                            <a href="{{ route('forget.password') }}" class="btn btn-link">
                                {{ __('ui.forgot_password') }}
                            </a>
                        </div>

                        {{-- Back to profile --}}
                        <div class="mt-3 text-center">
                            <a href="{{ route('profile') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left-circle me-1"></i> {{ __('ui.back_to_profile') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Password strength script --}}
        <script>
            function checkPasswordStrength() {
                const password = document.getElementById('new_password').value;
                const strengthEl = document.getElementById('password-strength');
                let score = 0;

                if (password.length >= 8) score++;
                if (/[A-Z]/.test(password)) score++;
                if (/[a-z]/.test(password)) score++;
                if (/\d/.test(password)) score++;
                if (/[^A-Za-z0-9]/.test(password)) score++;

                const messages = [
                    { text: '{{ __("ui.strength_0") }}', color: 'danger' },
                    { text: '{{ __("ui.strength_1") }}', color: 'warning' },
                    { text: '{{ __("ui.strength_2") }}', color: 'info' },
                    { text: '{{ __("ui.strength_3") }}', color: 'primary' },
                    { text: '{{ __("ui.strength_4") }}', color: 'success' }
                ];

                const msg = messages[Math.min(score, messages.length - 1)];
                strengthEl.innerHTML = `<span class="badge bg-${msg.color}">${msg.text}</span>`;
            }
        </script>
    </div>
</x-layouts.layout>
