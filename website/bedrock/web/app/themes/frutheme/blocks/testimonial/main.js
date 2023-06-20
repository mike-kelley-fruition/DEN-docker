import "./style.scss";


jQuery( document ).ready(function($) {

	$(".testimonialSlider").slick({
		prevArrow: $('.prev'),
		nextArrow: $('.next'),
		dots: true,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		responsive: [
			{
				breakpoint: 767,
				settings: {
					arrows:false
				}
			},
		]
	});

});