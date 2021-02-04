const fields = document.querySelectorAll('.field__item');
const tel = document.getElementById('modal-id2');
const tel2 = document.getElementById('form-phone');

fields.forEach(function (item) {
    item.addEventListener("focus", function () {

        this.closest('.field').classList.add('field--focus');
    })

    item.addEventListener("blur", function () {
        let value = this.value;

        if (value === "") {
            this.closest('.field').classList.remove('field--focus');
        } else {
            this.closest('.field').classList.add('field--focus');
        }
    })
})

if (tel) {
    tel.onfocus = function () {
        if (!tel.value.length) {
            return tel.value = "+";
        } else {
            return tel.value
        }
    }
    tel.onkeypress = function (e) {
        if (e.key.match(/[^0-9'".]/)) {
            return false;
        }
    }
}

if (tel2) {
    tel2.onfocus = function () {
        if (!tel2.value.length) {
            return tel2.value = "+";
        } else {
            return tel2.value
        }
    }
}

// let value = $('.field__item').val();

// if (value === "") {
//     $('.field__item').parents('.field').removeClass('field--focus');
// } else {
//     $('.field__item').parents('.field').addClass('field--focus');
// }


// $('.checkbox-triger').on('click', function () {

//     if ($('#input-checkbox').is(':checked')) {
//         $("#input-checkbox").prop("checked", false);
//         $(this).parent('.field-check').removeClass("field-check--checked");
//         $('#check-true').val('Человек убрал "метку" запроса ответа');
//     }
//     else {
//         $("#input-checkbox").prop("checked", true);
//         $(this).parent('.field-check').addClass("field-check--checked");
//         $('#check-true').val('Человек запросил ответ');
//     }
// })


// var $page = $('html, body');
// $('a.anchor').click(function () {

//     $('.header-sidebar__btn').removeClass('header-sidebar__btn--open');
//     $('.sidebar-menu').removeClass('sidebar-menu--open');
//     $('body').removeClass('body-menu-open');
//     $('html').removeClass('html-menu-open');
//     $('.sidebar-backpage').fadeOut();

//     // $('.sidebar-menu').removeClass('sidebar-menu--open');

//     $page.animate({
//         scrollTop: $($.attr(this, 'href')).offset().top - 80
//     }, 500);
//     return false;

// });



