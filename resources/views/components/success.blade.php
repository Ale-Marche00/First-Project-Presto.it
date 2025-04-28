@if (session()->has('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('errorMessage'))
        <p class="alert alert-danger text-center shadow rounded w-50">
            {{ session('errorMessage') }}
        </p>
@endif

@if (session()->has('message'))
    <div class="alert alert-success text-center shadow rounded w-50">
        {{ session('message') }}
    </div>

@endif