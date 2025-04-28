<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

<x-slot:head>@vite('resources/css/carousel.css')</x-slot:head>



<section id="slider bg-custom-loyaut">
    <div class="container-fluid">
        <div class="subcontainer">
            <div class="slider-wrapper">
                <div>
                    <h2>{{__('ui.featured_announces')}}</h2>
                </div>
                <br>
                <div class="my-slider">
                    @forelse ($articles as $article)
                        <div class="slide">
                            <x-card :article="$article" />
                        </div>
                    @empty
                        <div class="col-12">
                            <h3>{{__('ui.no_announces')}}</h3>
                        </div>
                    @endforelse
                </div>
                <!-- Frecce di navigazione -->
                {{-- <div class="slider-nav">
                    <button class="prev-slide">❮</button>
                    <button class="next-slide">❯</button>
                </div> --}}
            </div>
        </div>
    </div>
</section>

<script>
    // resources/js/carousel.js

let slider = tns({
    container: ".my-slider",
    slideBy: 1,
    speed: 2500,
    autoplaySpeed: 200,
    
    nav: false,
    swipeAngle: false,
    controls: false, // Disabilitiamo i controlli predefiniti
    autoplay: true,
    autoplayButtonOutput: false,
    responsive: {
        1600: {
            items: 4,
            gutter: 20
        },
        1024: {
            items: 3,
            gutter: 20
        },
        768: {
            items: 2,
            gutter: 20
        },
        280: {
            items: 1
        }
    }
});

// Aggiungiamo le frecce manuali
document.querySelector('.prev-slide').addEventListener('click', function() {
    slider.goTo('prev');
});

document.querySelector('.next-slide').addEventListener('click', function() {
    slider.goTo('next');
});

</script>
