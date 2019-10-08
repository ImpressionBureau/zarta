
$(document).ready(function () {

    $(".field__item").focus(function () {
        $(this).parents('.field').addClass('field--focus');
    });

    $('.field__item').blur(function () {

        let value = $(this).val();

        if (value === "") {
            $(this).parents('.field').removeClass('field--focus');
        } else {
            $(this).parents('.field').addClass('field--focus');
        }
    });

    let value = $('.field__item').val();

    if (value === "") {
        $('.field__item').parents('.field').removeClass('field--focus');
    } else {
        $('.field__item').parents('.field').addClass('field--focus');
    }



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









    var $page = $('html, body');
    $('a.anchor').click(function () {

        $('.header-sidebar__btn').removeClass('header-sidebar__btn--open');
        $('.sidebar-menu').removeClass('sidebar-menu--open');
        $('body').removeClass('body-menu-open');
        $('html').removeClass('html-menu-open');
        $('.sidebar-backpage').fadeOut();

        // $('.sidebar-menu').removeClass('sidebar-menu--open');

        $page.animate({
            scrollTop: $($.attr(this, 'href')).offset().top - 80
        }, 500);
        return false;

    });



});

