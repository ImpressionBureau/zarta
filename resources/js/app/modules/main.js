

const header = document.querySelector('header');
const languageWrap = document.querySelector('.language');
const languageBtn = document.querySelector('.language__active');
const languageList = document.querySelector('.language__list');
const toggleLangMenu = () => {
    languageWrap.classList.toggle('language--active');
}

const frontPreviews = document.querySelectorAll('.front-priview');

const mapBg = document.querySelector('.map__bg');




// language dropdown
languageBtn.addEventListener('click', e => {
    e.preventDefault();
    toggleLangMenu();
});

document.addEventListener('click', e => {
    let target = e.target;
    let itsLangMenu = target == languageWrap || languageWrap.contains(target);
    let itsLanguageBtn = target == languageBtn;
    let itsLangMenuActive = languageWrap.classList.contains('language--active');

    if (!itsLangMenu && !itsLanguageBtn && itsLangMenuActive) {
        toggleLangMenu();
    }
})




// header fix for scroll

let headerTopPos = header.offsetTop;

window.addEventListener('scroll', function () {
    let scrollHeight = pageYOffset;
    if (scrollHeight >= headerTopPos) {
        header.classList.remove('header--front');
    } else {
        header.classList.add('header--front');
    }
});





if ($(window).width() > 992) {
    for (i = 0; i < frontPreviews.length; i++) {

        let frontPreview = frontPreviews[i];
        let frontPreviewText = frontPreview.querySelector('.slide-wrap');
        let frontPreviewTextHeight = frontPreviewText.offsetHeight;

        frontPreviewText.style.height = 0;

        frontPreview.onmouseenter = function () {
            frontPreviewText.style.height = frontPreviewTextHeight + 'px';
        }
        frontPreview.onmouseleave = function () {
            frontPreviewText.style.height = 0;
        }

    }
}


if (mapBg != null) {
    // console.log(mapBg)
    mapBg.addEventListener('click', function () {
        this.remove();
    });
}


