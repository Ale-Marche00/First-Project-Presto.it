let slider = tns({
    container: ".my-slider",
    slideBy: 1,
    speed: 400,
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
        480: {
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