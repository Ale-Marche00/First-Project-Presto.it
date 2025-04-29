<x-layouts.layout>

        <div class="container prodotto">

        <h1 class="text-center mb-5">{{ $article->title }}</h1>

            <div class="row justify-content-center align-items-center mt-4">

                {{-- carosello per immagini--}}
                <div class="col-lg-6 mb-5">
                    @if ($article->images->count() > 0)
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousell-inner">
                                @foreach ($article->images as $key=>$image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="{{ $image->getUrl(500, 500) }}" class="d-block w-100 rounded shadow" 
                                            alt="Immagine {{$key + 1}} dell'articolo {{ $article->title }}">
                                    </div>
                                @endforeach
                            </div>
                            @if ($article->images->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>
                    @else
                        <img src="https://picsum.photos/300" alt="essuna foto iserita dall'utente" class="ms-5">
                    @endif
                </div>

                {{-- parte descrittiva --}}
                <div class="col-lg-6">
                    <div class="container text-start">
                        <!-- Nome Venditore con classe personalizzata -->
                        <p class="vendor-name"><strong>{{__('ui.author')}} : {{$article->user->name}}</strong></p>
                        <!-- Descrizione con classe personalizzata -->
                        <p>{{ $article->description }}</p>
                        <!-- Prezzo con classe personalizzata -->
                        <div>
                            <span class="price">€{{ $article->price }}</span>
                        </div>
                    </div>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-end mb-5">
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <button type="submit" class="btn btn_custom w-25">Aggiungi al carrello</button>
                        </div>
                    </form>
                    
                    <x-success/>

                </div>
                
            </div>

        </div>

        <div class="col-12 col-md-4 d-flex align-items-start m-5">
            <a href="{{ route('articles.index') }}" class="btn btn_custom text-start">{{ __('ui.btn_back') }}</a>
        </div>


</x-layouts.layout>



