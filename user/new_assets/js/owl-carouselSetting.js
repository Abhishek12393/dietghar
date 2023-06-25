if ((window.screen.width >= '992') && (window.screen.width <= '1199')) {
    $('.owl-carousel').owlCarousel({
        loop: true,
        items: 3,
        autoplay: true,
        autoplayTimeout: 2000
    });
} else if (window.screen.width >= '1200') {
    $('.owl-carousel').owlCarousel({
        loop: true,
        items: 5,
        autoplay: true,
        autoplayTimeout: 2000
    });
} else if ((window.screen.width >= '768') && (window.screen.width <= '991')) {
    $('.owl-carousel').owlCarousel({
        loop: true,
        items: 4,
        autoplay: true,
        autoplayTimeout: 2000
    });
} else if ((window.screen.width >= '576') && (window.screen.width <= '767')) {
    $('.owl-carousel').owlCarousel({
        loop: true,
        items: 3,
        autoplay: true,
        autoplayTimeout: 2000
    });
} else if ((window.screen.width >= '425') && (window.screen.width <= '575')) {
    $('.owl-carousel').owlCarousel({
        loop: true,
        items: 2,
        autoplay: true,
        autoplayTimeout: 2000
    });
} else if ((window.screen.width >= '375') && (window.screen.width <= '424')) {
    $('.owl-carousel').owlCarousel({
        loop: true,
        items: 2,
        autoplay: true,
        autoplayTimeout: 2000
    });
} else if ((window.screen.width >= '320') && (window.screen.width <= '374')) {
    $('.owl-carousel').owlCarousel({
        loop: true,
        items: 2,
        autoplay: true,
        autoplayTimeout: 2000
    });
}