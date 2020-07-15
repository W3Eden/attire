jQuery(function ($) {

    $(window).scroll();
    // Sticky menu
    var top = 0;
    var height = 0;
    if ($('.default-menu').length) {
        top = $('.default-menu').offset().top;
        height = $('.default-menu').height();
    }
    if (height >= 80) {
        height = 80;
    }
    var abheight = $('#wpadminbar').outerHeight();

    if ($('.stickable').length) {
        var topspace = 0;
        if($('.admin-bar').length)
            topspace = 30;
        $(".stickable").sticky({topSpacing: topspace });
    }


    // END: Sticky menu

    // Footer Dropdown to Dropup converter
    //
    // $(document).ready(function () {
    //     $('footer .dropdown:not(.dropdown-submenu)').each(function () {
    //         var _this = this;
    //         //  convert footer nav to dropup
    //         if ($(this).closest('footer').length) {
    //             var $ul = $(this).children("ul.dropdown-menu");
    //             $ul.css('top', '-' + $ul.css('height'));
    //         }
    //     });
    // });

    // Responsive Dropdown menu JS

    function toggleDropdownMobile(_this) {

        if ($(_this).next('ul').css('display') === 'none') {
            $(_this).next('ul').css('display', 'grid');
            $(_this).children('i').removeClass('fa-caret-down');
            $(_this).children('i').addClass('fa-caret-up');

        } else {
            $(_this).next('ul').css('display', 'none');
            $(_this).children('i').removeClass('fa-caret-up');
            $(_this).children('i').addClass('fa-caret-down');
        }
    }

    $('.dropdown span.dropdown-toggler').click(function () {
        if ($(window).width() < 1000) {
            toggleDropdownMobile(this);
        }
    });

    $('.navbar-toggler').on('click', function () {
        $('.dropdown-menu').css('display', 'none');
        $('.dropdown-toggler').children('i').removeClass('fa-caret-up');
        $('.dropdown-toggler').children('i').addClass('fa-caret-down');
    });

    // END : Responsive JS

    // Navbar search form

    var showField = false;


    $('.nav-search-form span').mouseenter(function () {
        showField = true;
        searchFieldShow()
    });

    $('.nav-search-form input[type="search"]').mouseenter(function () {
        showField = true;
        searchFieldShow()
    });

    $('.nav-search-form input[type="search"]').mouseleave(function () {
        showField = false;
        searchFieldHide();
    });

    $('.nav-search-form span').mouseleave(function () {
        showField = false;
        searchFieldHide();
    });

    function searchFieldShow() {
        $('.nav-search-form input[type="search"]').css('padding', '10px 20px');
        $('.nav-search-form input[type="search"]').show().stop(true, true).animate({width: 200}, 300);
    }

    function searchFieldHide() {
        setTimeout(function () {
            if (!showField) {
                $('.nav-search-form input[type="search"]').animate({width: 0}, 300);
                $('.nav-search-form input[type="search"]').css('padding', '0');
                setTimeout(function () {
                    $('.nav-search-form input[type="search"]').hide();
                }, 300);
            }
        }, 500);
    }

    // END: Navbar search form


    // Back to top button

    $(document).ready(function () {

        var offset = 250;
        var duration = 300;

        $(window).scroll(function () {
            if ($('.back-to-top.canshow').length) {
                if ($(this).scrollTop() > offset) {
                    $('.back-to-top').fadeIn(duration);
                } else {
                    $('.back-to-top').fadeOut(duration);
                }
            }
        });

        $('.back-to-top').click(function (event) {
            event.preventDefault();
            $('html, body').animate({scrollTop: 0}, duration);
            return false;
        })
    });

    // END: Back to top

    $('.attire-tip').tooltip();


// START: Full-Screen search form

    var wHeight = window.innerHeight;
    //search bar middle alignment
    $('.mk-fullscreen-searchform').css('top', wHeight / 2);
    //reform search bar
    jQuery(window).resize(function () {
        wHeight = window.innerHeight;
        $('.mk-fullscreen-searchform').css('top', wHeight / 2);
    });
    // Search
    $('#search-button').click(function (e) {
        e.preventDefault();
        $("div.mk-fullscreen-search-overlay").addClass("mk-fullscreen-search-overlay-show");
    });
    $("a.mk-fullscreen-close").click(function (e) {
        e.preventDefault();
        $("div.mk-fullscreen-search-overlay").removeClass("mk-fullscreen-search-overlay-show");
    });
//END : Full-Screen search form

});
