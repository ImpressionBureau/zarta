
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





const aboutSliderItem = document.querySelectorAll('.about-slider__item');
if (document.querySelector('.about-slider') && aboutSliderItem.length > 1) {

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



// menu header drop

const menuOpenBtn = document.querySelector('.nav-btn');
const menu = document.querySelector('.menu');
const menuCloseBtn = document.querySelector('.close-menu');

menuOpenBtn.addEventListener('click', function () {
    menu.classList.toggle('menu--open');
    if (document.querySelector('.header').classList.contains('header--front')) {
        document.querySelector('.header').classList.remove('header--front');
    }
})

const menuDropBtn = document.querySelectorAll('.menu-drop-btn');

if (window.innerWidth > 1199) {

    menuCloseBtn.addEventListener('click', function () {
        menu.classList.toggle('menu--open');
        if (document.querySelector('.menu-drop-btn--open')) {
            document.querySelector('.menu-item--active').classList.remove('menu-item--active');
            document.querySelector('.menu-drop-btn--open').style.paddingBottom = 10 + 'px';
            document.querySelector('.menu-drop--open').classList.remove('menu-drop--open');
            document.querySelector('.menu-drop-btn--open').classList.remove('menu-drop-btn--open');
        }
    })

    let flktyM;

    window.addEventListener('scroll', function () {
        if (document.querySelector('.menu-drop-btn--open')) {
            document.querySelector('.menu-item--active').classList.remove('menu-item--active');
            document.querySelector('.menu-drop-btn--open').style.paddingBottom = 10 + 'px';
            document.querySelector('.menu-drop--open').classList.remove('menu-drop--open');
            document.querySelector('.menu-drop-btn--open').classList.remove('menu-drop-btn--open');
        }
        menu.classList.remove('menu--open');
    });

    menuDropBtn.forEach(function (item) {

        item.addEventListener('click', function (e) {
            e.preventDefault();

            let dropBtnOpen = document.querySelector('.menu-drop-btn--open');
            let menuItemActive = document.querySelector('.menu-item--active');
            let menuDropOpen = document.querySelector('.menu-drop--open');
            let menuDrop = this.nextElementSibling;
            let menuLocalSlider = menuDrop.querySelector('.drop-slider');
            let menuSliderItem = menuLocalSlider.querySelectorAll('.drop-slider__item');
            let menuLocalSliderHeight = menuDrop.offsetHeight + 50;
            let menuDropBtnTopPos = item.getBoundingClientRect().top;
            if (item.classList.contains('menu-drop-btn--open')) {
                this.closest('.menu-item').classList.remove('menu-item--active');
                this.style.paddingBottom = 10 + 'px';
                menuDrop.classList.remove('menu-drop--open');
                this.classList.remove('menu-drop-btn--open');
            } else {

                if (dropBtnOpen) {
                    dropBtnOpen.style.paddingBottom = 10 + 'px';
                    dropBtnOpen.classList.remove('menu-drop-btn--open');
                    setTimeout(function () {
                        menuDropBtnTopPos = item.getBoundingClientRect().top;
                        menuDrop.style.top = menuDropBtnTopPos + 'px';
                        menuDrop.classList.add('menu-drop--open');
                    }, 500)

                } else {
                    menuDrop.classList.add('menu-drop--open');
                    menuDrop.style.top = menuDropBtnTopPos + 'px';
                }

                if (menuItemActive) {
                    menuItemActive.classList.remove('menu-item--active');
                }
                this.closest('.menu-item').classList.add('menu-item--active');

                if (menuDropOpen) {
                    menuDropOpen.querySelector('.drop-slider').classList.add('drop-slider--minlenght');
                    menuDropOpen.classList.remove('menu-drop--open');
                    flktyM.destroy();
                }

                if (menuSliderItem.length > 8) {
                    menuLocalSlider.classList.remove('drop-slider--minlenght');
                    flktyM = new Flickity(menuLocalSlider, {
                        wrapAround: true,
                        prevNextButtons: false,
                        pageDots: true,
                        cellAlign: 'left',
                        draggable: true,
                        pageDots: false,
                        contain: true,
                        initialIndex: 0
                    });
                } else {
                    menuLocalSlider.classList.add('drop-slider--minlenght');
                }

                this.classList.add('menu-drop-btn--open');
                this.style.paddingBottom = menuLocalSliderHeight + 'px';

            }


        })

    })

} else {

    menuCloseBtn.addEventListener('click', function () {
        menu.classList.toggle('menu--open');
        if (document.querySelector('.menu-drop-btn--open')) {
            document.querySelector('.menu-item--active').classList.remove('menu-item--active');
            document.querySelector('.menu-drop--open').style.height = 0;
            document.querySelector('.menu-drop--open').classList.remove('menu-drop--open');
            document.querySelector('.menu-drop-btn--open').classList.remove('menu-drop-btn--open');
        }
    })

    menuDropBtn.forEach(function (item) {

        let menuDrop = item.nextElementSibling;
        let menuLocalSliderHeight = menuDrop.offsetHeight;

        menuDrop.style.height = 0;


        item.addEventListener('click', function (e) {
            e.preventDefault();

            if (item.classList.contains('menu-drop-btn--open')) {
                this.closest('.menu-item').classList.remove('menu-item--active');
                menuDrop.style.height = 0;
                menuDrop.classList.remove('menu-drop--open');
                this.classList.remove('menu-drop-btn--open');
            } else {

                let menuDropOpen = document.querySelector('.menu-drop--open');
                if (menuDropOpen) {
                    menuDropOpen.classList.remove('menu-drop--open');
                    menuDropOpen.style.height = 0;
                    document.querySelector('.menu-item--active').classList.remove('menu-item--active');
                    document.querySelector('.menu-drop-btn--open').classList.remove('menu-drop-btn--open');
                }

                menuDrop.style.height = menuLocalSliderHeight + 'px';
                menuDrop.classList.add('menu-drop--open');
                this.classList.add('menu-drop-btn--open');
                this.closest('.menu-item').classList.add('menu-item--active');
            }

        });

    })

}

















