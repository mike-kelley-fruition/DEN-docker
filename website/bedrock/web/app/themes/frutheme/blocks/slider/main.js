import "./style.scss";

jQuery( document ).ready(function($) {

    $(".slider").slick({
        arrows: false,
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '25%',
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '10%',
                }
            },
            {
                breakpoint: 767,
                settings: {
                    arrows:false,
                    slidesToShow: 1,
                    centerPadding: '6%',
                }
            },
        ]
    });

});