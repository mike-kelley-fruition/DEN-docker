import "./style.scss";

jQuery( document ).ready(function($) {
    $('.openSingle').beefup({
        openSingle: true,
        selfClose: true,
        scroll: true,
        scrollOffset: -10,
        breakpoints: [
            {
                breakpoint: 767,
                settings: {
                    scroll: false
                }
            }
        ]
    });
});