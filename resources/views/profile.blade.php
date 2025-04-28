<x-layouts.layout>
    <div class="container py-5">
        {{-- Success & Messaggi --}}
        <x-success />

        {{-- Intestazione profilo --}}
        <div class="card shadow-sm mb-5 border-0 profile-bg-custom">
            <div class="card-body text-center">
                @if($user->profile_image)
                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="{{ __('ui.profile_image') }}"
                         class="rounded-circle shadow mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                @endif
                <h2 class="fw-bold profile-name">{{ $user->name }}</h2>
                <p class="text-muted">{{ __('ui.profile_welcome') }}</p>

                @if($user->is_revisor)
                    <span class="badge bg-custom">{{ __('ui.revisor') }}</span>
                @else
                    <span class="badge bg-secondary">{{ __('ui.not_revisor') }}</span>
                @endif

                <div class="mt-3 d-flex justify-content-center gap-3">
                    <a href="{{ route('homepage') }}" class="btn btn-custom-other">
                        <i class="bi bi-house-door-fill me-1"></i> {{ __('ui.home') }}
                    </a>
                    <a href="{{ route('logout') }}" class="btn btn-outline-danger">
                        <i class="bi bi-box-arrow-right me-1"></i> {{ __('ui.logout') }}
                    </a>
                </div>
            </div>
        </div>

        {{-- Form Modifica Profilo --}}
        <section class="profile-section mb-5 ">
            <div class="card shadow-lg border-0 profile-bg-custom">
                <div class="card-header bg-custom text-white">
                    <h4 class="mb-0">{{ __('ui.profile') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">{{ __('ui.name') }}</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                    class="form-control" readonly>
                                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="surname" class="form-label">{{ __('ui.surname') }}</label>
                                <input type="text" name="surname" id="surname"
                                    value="{{ old('surname', $user->surname) }}" class="form-control" readonly>
                                @error('surname') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="gender" class="form-label">{{ __('ui.gender') }}</label>
                                <select name="gender" id="gender" class="form-select" disabled>
                                    <option value="" disabled selected>{{ __('ui.gender') }}</option>
                                    <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>
                                        {{ __('ui.male') }}</option>
                                    <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>{{ __('ui.female') }}</option>
                                    <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>
                                        {{ __('ui.other') }}</option>
                                </select>
                                @error('gender') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="birth_date" class="form-label">{{ __('ui.birth_date') }}</label>
                                <input type="date" name="birth_date" id="birth_date"
                                    value="{{ old('birth_date', $user->birth_date) }}" class="form-control" readonly>
                                @error('birth_date') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">{{ __('ui.email') }}</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                    class="form-control" readonly>
                                @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="profile_image" class="form-label">{{ __('ui.profile_image') }}</label>
                                <input type="file" name="profile_image" id="profile_image" class="form-control"
                                    disabled>
                                @error('profile_image') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            {{-- Nuovi campi disabilitati inizialmente --}}
                            <div class="col-md-6">
                                <label for="phone" class="form-label">{{ __('ui.phone') }}</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                                    class="form-control" readonly>
                                @error('phone') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="biography" class="form-label">{{ __('ui.biography') }}</label>
                                <textarea name="biography" id="biography" class="form-control" rows="3"
                                    readonly>{{ old('biography', $user->biography) }}</textarea>
                                @error('biography') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="linkedin" class="form-label">{{ __('ui.linkedin') }}</label>
                                <input type="url" name="linkedin" id="linkedin"
                                    value="{{ old('linkedin', $user->linkedin) }}" class="form-control" readonly>
                                @error('linkedin') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="twitter" class="form-label">{{ __('ui.twitter') }}</label>
                                <input type="url" name="twitter" id="twitter"
                                    value="{{ old('twitter', $user->twitter) }}" class="form-control" readonly>
                                @error('twitter') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="website" class="form-label">{{ __('ui.website') }}</label>
                                <input type="url" name="website" id="website"
                                    value="{{ old('website', $user->website) }}" class="form-control" readonly>
                                @error('website') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mt-4 d-flex gap-2 flex-wrap">
                            <a href="{{ route('password.edit') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-key-fill me-1"></i> {{ __('ui.change_password') }}
                            </a>
                            <button type="button" id="editProfileButton" class="btn btn-custom-other">
                                <i class="bi bi-pencil-fill me-1"></i> {{ __('ui.edit_profile') }}
                            </button>
                            <button type="button" id="cancelEditButton" class="btn btn-secondary" style="display: none;">
                                <i class="bi bi-x-circle me-1"></i> {{ __('ui.cancel') }}
                            </button>
                            <button type="submit" id="saveChangesButton" class="btn btn-success" style="display: none;">
                                <i class="bi bi-save-fill me-1"></i> {{ __('ui.save_changes') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        {{-- Conferma cancellazione account --}}
        <div class="mt-4 d-flex justify-content-center gap-2">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                <i class="bi bi-trash me-1"></i> {{ __('ui.delete_account') }}
            </button>
        </div>

        {{-- Modal di conferma cancellazione account --}}
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAccountModalLabel">{{ __('ui.confirm_delete_account') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('ui.confirm_delete_message') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('ui.cancel') }}</button>
                        <form action="{{ route('profile.delete') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">{{ __('ui.delete_account') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script per abilitare modifica e annullare le modifiche --}}
    <script>
        document.getElementById('editProfileButton').addEventListener('click', function () {
            document.getElementById('name').removeAttribute('readonly');
            document.getElementById('surname').removeAttribute('readonly');
            document.getElementById('gender').disabled = false;
            document.getElementById('birth_date').removeAttribute('readonly');
            document.getElementById('profile_image').disabled = false;
            document.getElementById('phone').removeAttribute('readonly');
            document.getElementById('biography').removeAttribute('readonly');
            document.getElementById('linkedin').removeAttribute('readonly');
            document.getElementById('twitter').removeAttribute('readonly');
            document.getElementById('website').removeAttribute('readonly');
            document.getElementById('saveChangesButton').style.display = 'inline-block';
            document.getElementById('cancelEditButton').style.display = 'inline-block';
            this.style.display = 'none';
        });

        document.getElementById('cancelEditButton').addEventListener('click', function () {
            // Reimposta i campi a readonly
            document.getElementById('name').setAttribute('readonly', true);
            document.getElementById('surname').setAttribute('readonly', true);
            document.getElementById('gender').disabled = true;
            document.getElementById('birth_date').setAttribute('readonly', true);
            document.getElementById('profile_image').disabled = true;
            document.getElementById('phone').setAttribute('readonly', true);
            document.getElementById('biography').setAttribute('readonly', true);
            document.getElementById('linkedin').setAttribute('readonly', true);
            document.getElementById('twitter').setAttribute('readonly', true);
            document.getElementById('website').setAttribute('readonly', true);

            document.getElementById('saveChangesButton').style.display = 'none';
            document.getElementById('editProfileButton').style.display = 'inline-block';
            this.style.display = 'none';
        });
    </script>
</x-layouts.layout>
