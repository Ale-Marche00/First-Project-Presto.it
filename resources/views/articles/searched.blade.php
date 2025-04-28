<x-layouts.layout>

    <div class="custom-loyaut">
        <div class="container">
            
                <div class="row">
                    <div class="col d-flex jusify-content-center">
                        <h1 class="display-2">{{__('ui.resaults_search')}} "<span class="fst-italic">{{ $query }}</span>"</h1>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center py-5">
                    @forelse ($articles as $article)
                        <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                            <x-card :article="$article" />
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <h3>{{__('ui.no_announces_research')}}</h3>
                        </div>
                    @endforelse
                </div>
            
            <div class="d-flex justify-content-center">
                <div>
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
</x-layouts.layout>