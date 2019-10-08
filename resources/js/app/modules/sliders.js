
import Flickity from 'Flickity';

import 'flickity/dist/flickity.css';



if (document.querySelector('.team-slider')) {

    let flktyA = new Flickity('.team-slider', {
        wrapAround: true,
        prevNextButtons: false,
        pageDots: true,
        cellAlign: 'left',
        draggable: false,
        pageDots: false,
        contain: true,
        pauseAutoPlayOnHover: true,
        initialIndex: 0
    });


    var prevArrowReviews = document.querySelector('.team-arrow--prev');

    prevArrowReviews.addEventListener('click', function () {
        flktyA.previous(true, false);
    });

    var nextArrowReviews = document.querySelector('.team-arrow--next');

    nextArrowReviews.addEventListener('click', function () {
        flktyA.next(true, false);
    });

}




if (document.querySelector('.texting-slider')) {

    let flktyA = new Flickity('.texting-slider', {
        wrapAround: true,
        prevNextButtons: false,
        pageDots: true,
        cellAlign: 'left',
        draggable: false,
        pageDots: false,
        contain: true,
        pauseAutoPlayOnHover: true,
        initialIndex: 0
    });


    var prevArrowReviews = document.querySelector('.texting-arrow--left');

    prevArrowReviews.addEventListener('click', function () {
        flktyA.previous(true, false);
    });

    var nextArrowReviews = document.querySelector('.texting-arrow--right');

    nextArrowReviews.addEventListener('click', function () {
        flktyA.next(true, false);
    });


}






if (document.querySelector('.about-slider')) {

    let flktyA = new Flickity('.about-slider', {
        wrapAround: true,
        prevNextButtons: false,
        pageDots: true,
        cellAlign: 'left',
        draggable: false,
        pageDots: false,
        contain: true,
        pauseAutoPlayOnHover: true,
        initialIndex: 0
    });


    var prevArrowReviews = document.querySelector('.about-arrow--left');

    prevArrowReviews.addEventListener('click', function () {
        flktyA.previous(true, false);
    });

    var nextArrowReviews = document.querySelector('.about-arrow--right');

    nextArrowReviews.addEventListener('click', function () {
        flktyA.next(true, false);
    });


}







if (document.querySelector('.navigation-slider')) {

    let sliderItem = document.querySelectorAll('.navigation-slider__item');

    if (sliderItem.length > 8) {

            let flktyA = new Flickity('.navigation-slider', {
                wrapAround: true,
                prevNextButtons: false,
                pageDots: true,
                cellAlign: 'left',
                draggable: false,
                pageDots: false,
                contain: true,
                // pauseAutoPlayOnHover: true,
                initialIndex: 0
            });

            let sliderWrap = document.querySelector('.navigation');

            sliderWrap.insertAdjacentHTML('beforeend', '<div class="navigation-arrow navigation-arrow--prev"><svg width="7" height="12"><use xlink:href="#arrow-left"></use></svg></div><div class="navigation-arrow navigation-arrow--next"><svg width="7" height="12"><use xlink:href="#arrow-right"></use></svg></div>');

            var prevArrowReviews = document.querySelector('.navigation-arrow--prev');
            prevArrowReviews.addEventListener('click', function () {
                flktyA.previous(true, false);
            });
        
            var nextArrowReviews = document.querySelector('.navigation-arrow--next');
            nextArrowReviews.addEventListener('click', function () {
                flktyA.next(true, false);
            });

    } else {
        document.querySelector('.navigation-slider').classList.add('navigation-slider--minlenght');
    }

}













