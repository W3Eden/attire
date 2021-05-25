jQuery(function ($) {

    $(window).scroll();

    var top = 0;
    var height = 0;
    if ($('.default-menu').length) {
        top = $('.default-menu').offset().top;
        height = $('.default-menu').height();
    }

    var abheight = $('#wpadminbar').outerHeight();

    if ($('.stickable').length) {
        var topspace = 0;
        if ($('.admin-bar').length)
            topspace = 30;

        var sticky = $('.stickable')[0].offsetTop;
        window.onscroll = function () {
            if (window.pageYOffset > sticky) {
                $('nav.stickable').addClass("fixed-top");
                $('#attire-content').css("margin-top", height + 'px');
            } else {
                $('nav.stickable').removeClass("fixed-top");
                $('#attire-content').css("margin-top", 0);
            }
        };

    }


    /* END: Sticky menu */

    /*
     Responsive Dropdown menu JS
     */
    function toggleDropdownMobile(_this) {

        if ($(_this).next('ul').css('display') === 'none') {
            $(_this).next('ul').css('display', 'grid');
            $(_this).children('i').removeClass('fa-angle-down');
            $(_this).children('i').addClass('fa-angle-up');

        } else {
            $(_this).next('ul').css('display', 'none');
            $(_this).children('i').removeClass('fa-angle-up');
            $(_this).children('i').addClass('fa-angle-down');
        }
    }

    $('.dropdown span.dropdown-toggler').click(function () {
        if ($(window).width() < 1000) {
            toggleDropdownMobile(this);
        }
    });

    $('.navbar-toggler').on('click', function () {
        $('.dropdown-menu').css('display', 'none');
        $('.dropdown-toggler').children('i').removeClass('fa-angle-up');
        $('.dropdown-toggler').children('i').addClass('fa-angle-down');
    });
    /*
         END : Responsive JS
    */
    /* Navbar search form*/

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

    /* END: Navbar search form*/


    /*Back to top button*/

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

    /* END: Back to top*/

    $('.attire-tip').tooltip();


    /* START: Full-Screen search form*/

    var wHeight = window.innerHeight;
    /*//search bar middle alignment*/
    $('.mk-fullscreen-searchform').css('top', wHeight / 2);
    /*//reform search bar*/
    jQuery(window).resize(function () {
        wHeight = window.innerHeight;
        $('.mk-fullscreen-searchform').css('top', wHeight / 2);
    });
    /*Search*/
    $('#search-button').click(function (e) {
        e.preventDefault();
        $("div.mk-fullscreen-search-overlay").addClass("mk-fullscreen-search-overlay-show");
    });
    $("a.mk-fullscreen-close").click(function (e) {
        e.preventDefault();
        $("div.mk-fullscreen-search-overlay").removeClass("mk-fullscreen-search-overlay-show");
    });
    /*END : Full-Screen search form*/

    //keyboard navigation for accessibility

    $('body')
        .on('keydown', function (e) {

            // if last item in the menu is selected
            if ($('ul.attire-mbl-menu li:last a').is(':focus')) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#dismiss').focus();
                }
            }
            // if #dismiss button in the menu is selected
            if ($('#dismiss').is(':focus')) {
                if (e.shiftKey && e.keyCode === 9) {
                    e.preventDefault();
                    $('ul.attire-mbl-menu li:last a').focus();
                }
            }

            // show mobile menu
            if ($(e.target).hasClass('attire-mbl-menu-trigger')) {
                if (e.which === 32 || e.which === 13) {
                    e.preventDefault();
                    $('#attire-mbl-menu').addClass('active');
                    $('#dismiss').focus();
                }
            }
            // hide mobile menu
            else if (e.target.id === 'dismiss') {
                if (e.which === 32 || e.which === 13) {
                    e.preventDefault();
                    $('#attire-mbl-menu').removeClass('active');
                    $('.attire-mbl-menu-trigger').focus();
                }
            }
            // toggle dropdown
            else if ($(e.target).hasClass('dropdown-toggler')) {
                let visibility = ($(e.target).siblings('ul.dropdown-menu')[0].style && $(e.target).siblings('ul.dropdown-menu')[0].style.visibility) ? $(e.target).siblings('ul.dropdown-menu')[0].style.visibility : '';
                if (e.which === 32 || e.which === 13) {
                    e.preventDefault();
                    if (visibility && visibility === 'visible') {
                        $(e.target).siblings('ul.dropdown-menu').css('visibility', 'hidden');
                        $(e.target).siblings('ul.dropdown-menu').css('display', 'none');
                        $(e.target).siblings('ul.dropdown-menu').css('opacity', 0);
                    } else {
                        $(e.target).siblings('ul.dropdown-menu').css('visibility', 'visible');
                        $(e.target).siblings('ul.dropdown-menu').css('display', 'block');
                        $(e.target).siblings('ul.dropdown-menu').css('opacity', 1);
                    }

                }
            }
        });
});
