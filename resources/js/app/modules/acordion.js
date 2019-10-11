
const acordion = document.querySelectorAll('.acordion');

if (acordion.length > 0) {
    acordion.forEach(function (item, index) {

        let acordionBtn = item.querySelector('.acordion__btn');
        let acordionContent = item.querySelector('.acordion__content');
        let acordionContentHeight = acordionContent.offsetHeight;
        acordionContent.style.height = 0;

        acordionBtn.addEventListener('click', function () {
            if (item.classList.contains('acordion--open')) {
                item.classList.remove('acordion--open');
                acordionContent.style.height = 0;
            } else {
                item.classList.add('acordion--open');
                acordionContent.style.height = acordionContentHeight + 'px';
            }
        })

    })
}