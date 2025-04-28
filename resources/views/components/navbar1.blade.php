<nav class="navbar navbar-expand-lg pb-1">
    <div class="container-fluid">
        <a href="{{ route('homepage') }}">
            <img src="{{ Storage::url('/image/icons.svg') }}" alt="Presto">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-3 me-auto mb-2 mb-lg-0">
                <!-- Link Tutti Articoli -->
                <li class="nav-item custom_hover_nav me-2">
                    <a class="nav-link" href="{{ route('articles.index') }}">{{ __('ui.allannounces') }}</a>
                </li>

                <!-- Link Categorie -->
                <li class="nav-item dropdown custom_hover_nav">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.nav_category') }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            @php
                                // Recupera la traduzione del nome della categoria
                                $categoryTranslation = __("ui.{$category->name}");
                            @endphp
                            <li><a class="dropdown-item custom_hover_nav"
                                    href="{{ route('byCategory', ['category' => $category]) }}">{{ $categoryTranslation ?: $category->name }}</a>
                            </li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider category-divider">
                            @endif
                        @endforeach
                    </ul>
                
                <li class="nav-item custom_hover_nav ms-2">
                    <a class="nav-link" href="{{ route('revisor.info') }}">{{ __('ui.want_become_revisor') }}</a>
                </li>
            </ul>

            <!-- Form di ricerca -->
            <ul class="mb-0 ms-auto me-3">

                <form action="{{ route('article.search') }}" role="search" method="GET">
                    @if (session()->has('error_search'))
                        <input type="search" name="query" class="form-control is-invalid" placeholder="Non può essere vuoto"
                            aria-label="Search">
                    @else
                        <input type="search" name="query" class="form-control" placeholder="{{ __('ui.nav_search') }}"
                            aria-label="Search">
                    @endif
                </form>

            </ul>

            @auth
                <ul class="navbar-nav mb-2 me-2 mb-lg-0">
                    <li class="nav-item dropdown submenu-wrapper custom_hover_nav">
                        <a class="nav-link dropdown-toggle" href="{{ route('profile') }}" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item custom_hover_nav" href="{{ route('profile') }}">{{ __('ui.profile') }}</a></li>
                            <li><a class="dropdown-item custom_hover_nav"
                                    href="{{ route('create.article') }}">{{ __('ui.create_announce') }}</a></li>
                            @if (Auth::user()->is_revisor)
                                <li>
                                    <a class="dropdown-item custom_hover_nav" href="{{ route('revisor.index') }}">{{ __('ui.revisor_zone') }}
                                        <span>{{ \App\Models\Article::toBeRevisedCount() }}</span>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item pointer_logout custom_hover_nav"
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{ __('ui.logout') }}</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-none" id="form-logout">@csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav mb-2 me-2 mb-lg-0">
                    <li class="nav-item custom_hover_nav">
                        <a class="nav-link" href="{{ route('login') }}">Account</a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>