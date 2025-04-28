<x-layouts.layout>
    <div class="container">
        {{-- titolo --}}
        <div class="row">
            <div class="col-12 mb-5">
                <h1 class="text-center fs-1">{{ __('ui.become_revisor_title') }}</h1>
            </div>
        </div>

        {{-- prima row con immagine --}}
        <div class="row justify-content-between align-items-center g-2">
            <div class="col-12 col-md-6 img-lavoraconnoi" data-aos="fade-right" data-aos-duration="1000">
            </div>

            <div class="col-12 col-md-5" data-aos="fade-left" data-aos-duration="1000">
                <p class="fs-4 text-muted text-start">
                    {{ __('ui.become_revisor_text') }}
                </p>

                <div class="d-flex justify-content-end mt-4">
                    @auth
                        <form action="{{ route('revisore.richiesta') }}" method="POST" class="w-50">
                            @csrf
                            <button type="submit" class="btn btn-custom-other w-100">{{ __('ui.become_revisor_button') }}</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-custom-other w-50 text-center">{{ __('ui.login_button') }}</a>
                    @endauth
                </div>

                @if (session('message'))
                    <div class="alert alert-success mt-3 text-center">{{ session('message') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger mt-3 text-center">{{ session('error') }}</div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.layout>
