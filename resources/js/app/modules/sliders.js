
import Flickity from 'Flickity';

import 'flickity/dist/flickity.css';

if (document.querySelector('.intro-slider')) {

    let flktyI = new Flickity('.intro-slider', {
        wrapAround: true,
        prevNextButtons: false,
        cellAlign: 'left',
        draggable: false,
        pageDots: false,
        contain: true,
        autoPlay: 3000,
        pauseAutoPlayOnHover: false
    });
    var prevArrowReviews = document.querySelector('.intro-arrow--prev');
    if(prevArrowReviews){
    prevArrowReviews.addEventListener('click', function () {
        flktyI.previous(true, false);
    });
    }

    var nextArrowReviews = document.querySelector('.intro-arrow--next');
    if(nextArrowReviews){
    nextArrowReviews.addEventListener('click', function () {
        flktyI.next(true, false);
    });
    }
}

if (document.querySelector('.team-slider')) {

    let flktyA = new Flickity('.team-slider', {
        wrapAround: true,
        prevNextButtons: false,
        cellAlign: 'left',
        draggable: true,
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



if (document.querySelector('.methods-slider') && window.innerWidth < 992) {

    let flktyM = new Flickity('.methods-slider', {
        wrapAround: true,
        prevNextButtons: false,
        cellAlign: 'left',
        draggable: true,
        pageDots: false,
        contain: true,
        adaptiveHeight: true,
        pauseAutoPlayOnHover: true,
        initialIndex: 0
    });


    var prevArrowReviews = document.querySelector('.methods-arrow--prev');

    prevArrowReviews.addEventListener('click', function () {
        flktyM.previous(true, false);
    });

    var nextArrowReviews = document.querySelector('.methods-arrow--next');

    nextArrowReviews.addEventListener('click', function () {
        flktyM.next(true, false);
    });

}



if (document.querySelector('.texting-slider')) {

    let flktyA = new Flickity('.texting-slider', {
        wrapAround: true,
        prevNextButtons: false,
        cellAlign: 'left',
        draggable: true,
        pageDots: false,
        contain: true,
        pauseAutoPlayOnHover: true,
        initialIndex: 0,
        adaptiveHeight: true,
        on: {
            change: function (index) {
                var counter = document.getElementById('texting-active')
                if (index <= 9) {
                    counter.innerText = `0${index + 1}`
                } else {
                    counter.innerHTML = `${index + 1}`
                }
            }
        }
    });


    var prevArrowReviews = document.querySelector('.texting-arrow--left');

    prevArrowReviews.addEventListener('click', function () {
        flktyA.previous(true, false);
    });

    var nextArrowReviews = document.querySelector('.texting-arrow--right');

    nextArrowReviews.addEventListener('click', function () {
        flktyA.next(true, false);
    });

    let allSlides = document.querySelectorAll('.texting-slider__item').length;
    let countAllSlide = document.querySelector('#texting-active-all');

    if (allSlides <= 9) {
        countAllSlide.innerText = `/0${allSlides}`
    } else {
        countAllSlide.innerHTML = `/${allSlides}`
    };

};




const aboutSliderItem = document.querySelectorAll('.about-slider__item');
if (document.querySelector('.about-slider') && aboutSliderItem.length > 1) {

    let flktyA = new Flickity('.about-slider', {
        wrapAround: true,
        prevNextButtons: false,
        cellAlign: 'left',
        draggable: true,
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

    if (window.innerWidth < 768 && sliderItem.length > 3){
        let flktyA = new Flickity('.navigation-slider', {
            wrapAround: true,
            prevNextButtons: false,
            cellAlign: 'left',
            draggable: true,
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
    } else if (window.innerWidth > 768 && window.innerWidth > 992  && sliderItem.length > 5) {

        let flktyA = new Flickity('.navigation-slider', {
            wrapAround: true,
            prevNextButtons: false,
            cellAlign: 'left',
            draggable: true,
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

    } else if (window.innerWidth > 992 && sliderItem.length > 8) {

        let flktyA = new Flickity('.navigation-slider', {
            wrapAround: true,
            prevNextButtons: false,
            cellAlign: 'left',
            draggable: true,
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
        })} else {
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
            document.querySelectorAll('.menu-arrow').forEach(function (i) {
                i.remove();
                console.log(item)
            });
        }
    })

    let flktyM;

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
            let menuDropBtnTopPos = item.offsetTop + 100;
            if (item.classList.contains('menu-drop-btn--open')) {
                this.closest('.menu-item').classList.remove('menu-item--active');
                this.style.paddingBottom = 10 + 'px';
                menuDrop.classList.remove('menu-drop--open');
                this.classList.remove('menu-drop-btn--open');
                document.querySelectorAll('.menu-arrow').forEach(function (i) {
                    i.remove();
                });
            } else {

                if (dropBtnOpen) {
                    dropBtnOpen.style.paddingBottom = 10 + 'px';
                    dropBtnOpen.classList.remove('menu-drop-btn--open');
                    menuDropBtnTopPos = item.offsetTop + 100;
                    menuDrop.style.top = menuDropBtnTopPos + 'px';
                    menuDrop.classList.add('menu-drop--open');
                    document.querySelectorAll('.menu-arrow').forEach(function (i) {
                        i.remove();
                    });

                } else {
                    menuDrop.classList.add('menu-drop--open');
                    menuDrop.style.top = menuDropBtnTopPos + 'px';
                }

                if (menuItemActive) {
                    menuItemActive.classList.remove('menu-item--active');
                    menuDropOpen.querySelector('.drop-slider').classList.add('drop-slider--minlenght');
                    menuDropOpen.classList.remove('menu-drop--open');
                    document.querySelectorAll('.menu-arrow').forEach(function (i) {
                        i.remove();
                    });
                    if (flktyM) {
                        flktyM.destroy();
                    }
                }
                this.closest('.menu-item').classList.add('menu-item--active');

                if (window.innerWidth > 1199 && menuSliderItem.length > 5) {
                    menuLocalSlider.classList.remove('drop-slider--minlenght');
                    flktyM = new Flickity(menuLocalSlider, {
                        wrapAround: true,
                        prevNextButtons: false,
                        cellAlign: 'left',
                        draggable: true,
                        pageDots: false,
                        contain: true,
                        initialIndex: 0
                    });

                    menuLocalSlider.insertAdjacentHTML('afterend', '<div class="menu-arrow menu-arrow--prev"><svg width="7" height="12"><use xlink:href="#arrow-left"></use></svg></div><div class="menu-arrow menu-arrow--next"><svg width="7" height="12"><use xlink:href="#arrow-right"></use></svg></div>');

                    var prevArrowReviews = document.querySelector('.menu-arrow--prev');
                    prevArrowReviews.addEventListener('click', function () {
                        flktyM.previous(true, false);
                    });

                    var nextArrowReviews = document.querySelector('.menu-arrow--next');
                    nextArrowReviews.addEventListener('click', function () {
                        flktyM.next(true, false);
                    });
                } else if (window.innerWidth > 1500 && menuSliderItem.length > 8) {
                    menuLocalSlider.classList.remove('drop-slider--minlenght');
                    flktyM = new Flickity(menuLocalSlider, {
                        wrapAround: true,
                        prevNextButtons: false,
                        cellAlign: 'left',
                        draggable: true,
                        pageDots: false,
                        contain: true,
                        initialIndex: 0
                    });

                    menuLocalSlider.insertAdjacentHTML('afterend', '<div class="menu-arrow menu-arrow--prev"><svg width="7" height="12"><use xlink:href="#arrow-left"></use></svg></div><div class="menu-arrow menu-arrow--next"><svg width="7" height="12"><use xlink:href="#arrow-right"></use></svg></div>');

                    var prevArrowReviews = document.querySelector('.menu-arrow--prev');
                    prevArrowReviews.addEventListener('click', function () {
                        flktyM.previous(true, false);
                    });

                    var nextArrowReviews = document.querySelector('.menu-arrow--next');
                    nextArrowReviews.addEventListener('click', function () {
                        flktyM.next(true, false);
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

















