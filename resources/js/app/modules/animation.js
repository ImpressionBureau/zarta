import ScrollReveal from 'ScrollReveal';


$(document).ready(function () {

    if ($(window).width() > 992) {


        ScrollReveal().reveal('.from_left', {
            origin: 'left',
            delay: 400,
            duration: 600,
            distance: '2000px',
            opacity: null
        });

        ScrollReveal().reveal('.from_left_interval', {
            origin: 'left',
            delay: 400,
            duration: 600,
            distance: '2000px',
            opacity: null,
            interval: 150
        });


        ScrollReveal().reveal('.from_right', {
            origin: 'right',
            delay: 400,
            duration: 600,
            distance: '2000px',
            opacity: null
        });


        ScrollReveal().reveal('.from_right_interval', {
            origin: 'right',
            delay: 400,
            duration: 600,
            distance: '2000px',
            opacity: null,
            reset: true,
            interval: 150
        });


        ScrollReveal().reveal('.from_bottom', {
            origin: 'bottom',
            delay: 400,
            duration: 600,
            distance: '1000px',
            interval: 150
        });


        ScrollReveal().reveal('.from_bottom_interval', {
            origin: 'bottom',
            delay: 400,
            duration: 600,
            distance: '1000px',
            interval: 150
        });
    }

});
