const header = document.querySelector('header');
const languageWrap = document.querySelector('.language');
const languageBtn = document.querySelector('.language__active');
const languageList = document.querySelector('.language__list');
const toggleLangMenu = () => {
    languageWrap.classList.toggle('language--active');
}

const frontPreviews = document.querySelectorAll('.front-priview');
const priceItem = document.querySelectorAll('.price');

const openModalBtn = document.querySelectorAll('.modal-btn');
const closeModalBtn = document.querySelector('.close-modal');
const modal = document.querySelector('.custom-modal');
const modalMask = document.querySelector('.modal-mask');


// language dropdown
languageBtn.addEventListener('click', e => {
    e.preventDefault();
    toggleLangMenu();
});

document.addEventListener('click', e => {
    let target = e.target;
    let itsLangMenu = target === languageWrap || languageWrap.contains(target);
    let itsLanguageBtn = target === languageBtn;
    let itsLangMenuActive = languageWrap.classList.contains('language--active');

    if (!itsLangMenu && !itsLanguageBtn && itsLangMenuActive) {
        toggleLangMenu();
    }
})


// header fix for scroll

let headerTopPos = header.offsetTop;

window.addEventListener('scroll', function () {
    if (!document.querySelector('.menu').classList.contains('menu--open')) {
        if (pageYOffset >= headerTopPos) {
            header.classList.remove('header--front');
        } else {
            header.classList.add('header--front');
        }
    }
});


if (priceItem.length > 0 && window.innerWidth > 992) {
    priceItem.forEach(function (item) {

        let priceBtn = item.querySelector('.btn--price');
        let priceButtonsWidth = priceBtn.offsetWidth;
        priceBtn.style.width = 0;

        item.onmouseenter = function () {
            priceBtn.style.width = priceButtonsWidth + 'px';
        }
        item.onmouseleave = function () {
            priceBtn.style.width = 0;
        }

    })
}


// modal & prices


openModalBtn.forEach(function (item) {

    item.addEventListener('click', function (e) {
        e.preventDefault();

        openModal();

    });

})

modalMask.addEventListener('click', function () {
    closeModal();
});

closeModalBtn.addEventListener('click', function () {
    closeModal();
});


function openModal() {
    modal.classList.add('custom-modal--open');
    modalMask.classList.add('modal-mask--open');
}

function closeModal() {
    modal.classList.remove('custom-modal--open');
    modalMask.classList.remove('modal-mask--open');

    if (modal.classList.contains('custom-modal--price')) {
        modal.classList.remove('custom-modal--price');
        modal.querySelector('.modal-price').style.display = 'none';
        modal.querySelector('#inp-price-id').remove();
    }
}


// tabs

const tabNavBtn = document.querySelectorAll('.tab-nav');
// const closeModalBtn = document.querySelector('.close-modal');


tabNavBtn.forEach(function (item, index) {

    let idTabContent = item.getAttribute('data-target');
    let tabContent = document.getElementById(idTabContent);
    let tabContentHeight = tabContent.offsetHeight;

    if (index == 0) {
        item.classList.add('tab-nav--active');
        tabContent.classList.add('tab-content--active');
        tabContent.style.height = tabContentHeight + 'px';
    } else {
        tabContent.style.height = 0;
    }

    item.addEventListener('click', function (e) {
        e.preventDefault();

        if (!this.classList.contains('tab-nav--active')) {
            document.querySelector('.tab-nav--active').classList.remove('tab-nav--active');
            this.classList.add('tab-nav--active');

            let activeTabContent = document.querySelector('.tab-content--active');
            activeTabContent.classList.remove('tab-content--active');
            activeTabContent.style.height = 0;

            tabContent.style.height = tabContentHeight + 'px';
            tabContent.classList.add('tab-content--active');
        } else {

        }


    })

})

















