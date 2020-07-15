/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {


    function setCss(themeModName, selector, propertyName) {
        var unit = '';
        var px = ['font-size', 'max-width', 'min-width', 'width', 'min-height', 'max-height', 'height', 'margin-bottom', 'padding-top', 'padding-bottom'];
        if (px.indexOf(propertyName) > -1) {
            unit = 'px';
        }


        wp.customize('attire_options[' + themeModName + ']', function (value) {
            value.bind(function (newVal) {
                if ($('style#' + themeModName).length) {
                    console.log(themeModName);
                    try {
                        $('style#' + themeModName).html(selector + '{' + propertyName + ':' + newVal + unit + ' !important;}');
                    } catch (err) {
                        console.log(err);
                    }
                } else {
                    try {
                        $('head').append('<style id="' + themeModName + '">' + selector + '{' + propertyName + ':' + newVal + unit + '!important;}</style>');
                    } catch (err) {
                        console.log(err);
                    }
                }
            });

        });
    }

    function setImage(themeModName, selector, propertyName) {
        wp.customize('attire_options[' + themeModName + ']', function (value) {
            value.bind(function (newVal) {
                if (propertyName === 'background-image') {
                    $(selector).css(propertyName, 'url("' + newVal + '")');

                } else
                    $(selector).prop(propertyName, newVal);
            });
        });
    }

    function setFont(themeModName, selector, propertyName) {
        wp.customize('attire_options[' + themeModName + ']', function (value) {
            value.bind(function (newVal) {
                var font = (newVal.split(':')[0]).replace(/\+/g, ' ');
                $('head').append('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=' + newVal + '">');

                $(selector).each(function () {
                    this.style.setProperty(propertyName, font);
                });
            });
        });
    }

    function setText(themeModName, selector) {
        wp.customize('attire_options[' + themeModName + ']', function (value) {
            value.bind(function (newVal) {
                $(selector).each(function () {
                    $(this).text(newVal);
                });
            });
        });
    }

    function setVisibility(themeModName, selector) {

        wp.customize('attire_options[' + themeModName + ']', function (value) {
            value.bind(function (newVal) {
                $(selector).each(function () {
                    if (newVal === 'show' || newVal === true)
                        $(this).show();
                    else
                        $(this).hide();
                });
            });
        });
    }

    function setContainerType(themeModName, selector) {
        wp.customize('attire_options[' + themeModName + ']', function (value) {
            value.bind(function (newVal) {
                if (newVal === 'container') {
                    $(selector).removeClass('container-fluid');
                    $(selector).addClass('container');
                }
                else {
                    $(selector).removeClass('container');
                    $(selector).addClass('container-fluid');
                }
            })
        })

    }

    function setMainLayoutType(themeModName, selector) {
        wp.customize('attire_options[' + themeModName + ']', function (value) {
            value.bind(function (newVal) {
                if (newVal === 'layout-fixed-width') {
                    $(selector).removeClass('container-fluid');
                    $(selector).addClass('layout-fixed-width');
                }
                else {
                    $(selector).removeClass('layout-fixed-width');
                    $(selector).addClass('container-fluid');
                }
            })
        })

    }

    wp.customize('attire_options[heading_font_size]', function (value) {
        value.bind(function (newValue) {
            $('.site-logo,.footer-logo').each(function () {
                this.style.setProperty('font-size', newValue + 'px');
            });
            $('h1 *,.h1, h1').each(function () {
                this.style.setProperty('font-size', newValue + 'px');
            });
            $('h2:not(.site-description) *, h2:not(.site-description),.h2').each(function () {
                this.style.setProperty('font-size', Math.round(newValue * .75) + 'px');
            });
            $('h3 *, h3,.h3').each(function () {
                this.style.setProperty('font-size', Math.round(newValue * .6) + 'px');
            });
            $('h4 *, h4,.h4').each(function () {
                this.style.setProperty('font-size', Math.round(newValue * .56) + 'px');
            });
            $('h5 *,h5,.h5').each(function () {
                this.style.setProperty('font-size', Math.round(newValue * .415) + 'px');
            });
            $('h6 *,h6,h6').each(function () {
                this.style.setProperty('font-size', Math.round(newValue * .375) + 'px');
            });
        });
    });


    /**
     *
     * General Settings -> Logo
     *
     */
    setCss('site_logo_height', '.site-logo img', 'max-height');
    setCss('site_logo_footer_height', '.footer-logo img', 'max-height');

    /**
     *
     *  Colors -> Header
     */
    setCss('site_title_text_color', '.site-logo,.logo-header', 'color');
    setCss('site_description_text_color', '.site-description', 'color');
    setCss('site_header_bg_color', '.header-div', 'background-color');

    /**
     *
     *  Colors -> Footer
     */
    setCss('site_footer_title_text_color', '.footer-logo', 'color');
    setCss('site_footer_bg_color', '.footer-div', 'background-color');


    /**
     *
     * Colors -> Main Menu
     *
     */
    setCss('menu_top_font_color', 'header .mainmenu > .menu-item:not(.active) > a, header .nav i.fa.fa-search, header .dropdown-toggler, header .mobile-menu-toggle', 'color');
    setCss('main_nav_bg', '.short-nav .collapse.navbar-collapse, .long-nav', 'background-color');
    setCss('menuhbg_color', 'header .mainmenu > .menu-item:hover, header .mainmenu > .menu-item.active,header .mainmenu > .dropdown ul li *', 'background-color');
    setCss('menuht_color', 'header .mainmenu > .menu-item:hover > a,header .mainmenu > .menu-item.active > a,header .mainmenu > .menu-item:hover > .dropdown-toggler,header .mainmenu > .menu-item.active > .dropdown-toggler', 'color');
    setCss('menu_dropdown_bg_color', 'header .mainmenu .dropdown-menu', 'background');
    setCss('menu_dropdown_font_color', 'header .mainmenu > .dropdown ul li *', 'color');
    setCss('menu_dropdown_hover_bg', 'header .dropdown ul li:hover a.dropdown-item', 'background-color');
    setCss('menu_dropdown_hover_font_color', 'header .dropdown ul li:hover a.dropdown-item', 'color');


    /**
     *
     * Colors -> Footer Menu
     *
     */
    setCss('footer_nav_top_font_color', 'footer .footermenu > .menu-item:not(.active) > a, footer .dropdown-toggler', 'color');
    setCss('footer_nav_bg', 'footer .footermenu', 'background-color');
    setCss('footer_nav_hbg', 'footer .footermenu > .menu-item:hover,footer .footermenu > .menu-item.active', 'background-color');
    setCss('footer_nav_ht_color', 'footer .footermenu .menu-item:hover > *,ul#footer-menu .menu-item.active > *', 'color');
    setCss('footer_nav_dropdown_font_color', 'footer .footermenu > .dropdown li a.dropdown-item', 'color');
    setCss('footer_nav_dropdown_hover_bg', 'footer .footermenu > .dropdown li:hover', 'background-color');
    setCss('footer_nav_dropdown_hover_font_color', 'footer .footermenu > .dropdown li:hover a.dropdown-item', 'color');


    /**
     *
     * Colors -> Body Colors
     */
    setCss('body_bg_color', 'body #mainframe', 'background-color');
    setCss('body_color', '.attire-post-and-comments,.attire-post-and-comments p,.attire-post-and-comments article,.attire-post-and-comments ul,.attire-post-and-comments ol, .attire-post-and-comments table, .attire-post-and-comments blockquote, .attire-post-and-comments pre ', 'color');
    setCss('a_color', '.attire-content a,.small-menu a', 'color');
    setCss('ah_color', '.attire-content a:hover,.footer-widgets-area a:hover,.small-menu a:hover', 'color');
    setCss('header_color', 'h1,h2,h3,h4,h5,h6,h1 *,h2 *,h3 *,h4 *,h5 *,h6 *', 'color');


    /**
     *
     * Colors -> Sidebar widget colors
     *
     */

    setCss('widget_bg_color', '.sidebar-area', 'background-color');
    setCss('widget_content_font_color', '.sidebar-area .widget, *.widget li, *.widget p', 'color');
    setCss('widget_title_font_color', '.sidebar-area .widget .widget-title', 'color');

    /**
     *
     * Colors -> Footer widget colors
     *
     */
    setCss('footer_widget_bg_color', '.footer-widgets-area', 'background-color');
    setCss('footer_widget_content_font_color', '.footer-widgets-area .widget *:not(.widget-title)', 'color');
    setCss('footer_widget_title_font_color', '.footer-widgets-area .widget .widget-title', 'color');

    /**
     *
     * General Settings
     */
    setImage('site_logo', '.site-logo img', 'src');
    setImage('site_logo_footer', '.footer-logo img', 'src');

    setVisibility('attire_search_form_visibility', 'ul.ul-search');

    wp.customize('attire_options[attire_back_to_top_visibility]', function (value) {
        value.bind(function (newValue) {
            if (newValue === 'show') {
                $('.back-to-top').show();
                $('.back-to-top').addClass('canshow');
            } else {
                $('.back-to-top').hide();
                $('.back-to-top').removeClass('canshow');
            }
        });
    });
    wp.customize('attire_options[attire_nav_behavior]', function (value) {
        value.bind(function (newValue) {
            if (newValue === 'sticky') {
                $('.default-menu').addClass('stickable');
            } else {
                $('.default-menu').removeClass('stickable');
                $('.default-menu').removeClass('sticky-menu');
            }
        });
    });

    /**
     *
     * Typography -> Generic Fonts
     */
    var body_elements = '.attire-post-and-comments,.attire-post-and-comments p,.attire-post-and-comments article,.attire-post-and-comments ul,.attire-post-and-comments ol, .attire-post-and-comments table, .attire-post-and-comments blockquote, .attire-post-and-comments pre';
    setFont('heading_font', '.site-logo,.footer-logo,h1 *, h1,h2:not(.site-description) *, h2:not(.site-description),h3 *, h3,h4 *, h4,h5 *, h5,h6 *, h6', 'font-family');
    setCss('heading_font_weight', '.site-logo,.footer-logo,h1 *, h1,h2:not(.site-description) *, h2:not(.site-description),h3 *, h3,h4 *, h4,h5 *, h5,h6 *, h6', 'font-weight');
    setCss('header_color', 'h1 *, h1,h2:not(.site-description) *, h2:not(.site-description),h3 *, h3,h4 *, h4,h5 *, h5,h6 *, h6', 'color');

    setFont('body_font', body_elements, 'font-family');
    setCss('body_font_size', '.site-description,' + body_elements, 'font-size');
    setCss('body_font_weight', '.site-description,' + body_elements, 'font-weight');
    setCss('body_color', body_elements, 'color');

    /**
     *
     * Typography -> Widget Fonts
     */

    setFont('widget_title_font', '.widget .widget-title', 'font-family');
    setCss('widget_title_font_size', '.widget .widget-title', 'font-size');
    setCss('widget_title_font_weight', '.widget .widget-title', 'font-weight');

    setFont('widget_content_font', '.widget *:not(.widget-heading)', 'font-family');
    setCss('widget_content_font_size', '.widget *:not(.widget-heading)', 'font-size');
    setCss('widget_content_font_weight', '.widget *:not(.widget-heading)', 'font-weight');


    /**
     *
     * Typography -> Menu Fonts
     */

    setFont('menu_top_font', 'header .mainmenu > .menu-item a,footer .footermenu > .menu-item a', 'font-family');
    setCss('menu_top_font_size', 'header .mainmenu > .menu-item a,footer .footermenu > .menu-item a', 'font-size');
    setCss('menu_top_font_weight', 'header .mainmenu > .menu-item a,footer .footermenu > .menu-item a', 'font-weight');

    setFont('menu_dropdown_font', 'header .dropdown ul li a.dropdown-item, footer .dropdown ul li a.dropdown-item', 'font-family');
    setCss('menu_dropdown_font_size', 'header .dropdown ul li a.dropdown-item, footer .dropdown ul li a.dropdown-item', 'font-size');
    setCss('menu_dropdown_font_weight', 'header .dropdown ul li a.dropdown-item, footer .dropdown ul li a.dropdown-item', 'font-weight');


    /**
     *
     * Header Image
     */

    setVisibility('ph_active', '.page_header_wrap');
    setVisibility('ph_show_on_fp', 'home .page_header_wrap');
    setVisibility('ph_breadcrumb', '#breadcrumbs');
    setCss('ph_bg_color', '.page_header_wrap', 'background-color');
    setCss('ph_text_color', '.page_header_wrap *', 'color');
    //setCss('ph_text_align', '.page_header_wrap *', 'text-align');
    setCss('ph_text_align', '#cph_title, #breadcrumbs', 'text-align');
    setCss('ph_bg_height', '.page_header_wrap', 'min-height');
    setCss('ph_bg_padding_top', '.page_header_wrap', 'padding-top');
    setCss('ph_bg_padding_bottom', '.page_header_wrap', 'padding-bottom');
    setCss('ph_margin_bottom', '.page_header_wrap', 'margin-bottom');
    //setCss('ph_bg_height', '.page_header_wrap', 'line-height');


    /**
     *
     * Blog
     *
     */
    setText('attire_read_more_text', '.read-more-link');
    setVisibility('attire_single_post_post_navigation', '.meta-list li.post-navs');

    setCss('container_width', '.container', 'max-width');
    setCss('main_layout_width', 'body #mainframe.layout-fixed-width', 'max-width');
    setMainLayoutType('main_layout_type', '#mainframe');
    setContainerType('header_content_layout_type', 'header .header-contents');
    setContainerType('body_content_layout_type', '.attire-content');
    setContainerType('footer_widget_content_layout_type', '.footer-widgets-outer');
    setContainerType('footer_content_layout_type', 'footer .footer-contents');

})(jQuery);


