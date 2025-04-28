<div class="container my-3">
    <div class="row">
        <div class="col-lg-12  d-flex justify-content-center">
            <div class="product-card">
                <div class="position-relative">
                    <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(500, 500) : 'https://picsum.photos/200' }}"
                        class="" alt="Immagine dell'articolo {{ $article->title }}">
                    <a href="{{ route('byCategory', [$article->category->id]) }}"
                        class="badge bg-custom position-absolute bottom-0 start-0 m-2 text-white text-decoration-none text-uppercase">
                        {{ __("ui.{$article->category->name}") }}
                    </a>

                </div>



                <div class="product-card-body position-relative ">
                    <h5 class="card-title {{-- text-truncate --}} custom-card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ $article->price }}€</p>
                    <p class="text-truncate">{{ $article->description }}</p>

                    <div class="text-end">
                        <a href="{{ route('articles.show', [$article->id]) }}"
                            class="btn btn_custom position-absolute  bottom-0 end-0 m-3">{{ __('ui.details') }}</a>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


