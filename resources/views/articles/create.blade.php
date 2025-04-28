<x-layouts.layout>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-4 pt-5">
                    {{__('ui.publish_announce')}}
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-item-center height-custom">
            <div class="col-12 col-md-6">
                <livewire:create-article-form />
            </div>
        </div>
    </div>
                
</x-layouts.layout>