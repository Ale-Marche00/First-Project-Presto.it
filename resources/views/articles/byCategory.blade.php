<x-layouts.layout>
    <div class="container custom-loyaut">
        <div class="row">
            <div class="col d-flex jusify-content-center">
                <h1 class="display-3">{{__('ui.announce_category')}} <span class="fst-italic fw-bold">
                    {{ __("ui.$category->name") }}
                </span></h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>{{__('ui.no_announces_already')}}!</h3>
                    @auth
                        <a class="btn btn-dark my-5" href="{{ route('create.article') }}">{{__('ui.publish_announce')}}</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.layout>
