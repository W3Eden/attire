<?php
if (!defined('ABSPATH')) {
    exit;
}
$theme_mod = WPATTIRE()->theme_options;
$content_layout = $theme_mod['header_content_layout_type'];
$nav_width = isset($theme_mod['main_layout_type']) ? $theme_mod['main_layout_type'] : 'container-fluid'; // For sticky menu to match site width

$stickable = '';
if (isset($theme_mod['attire_nav_behavior']) && $theme_mod['attire_nav_behavior'] === 'sticky') {
    $stickable = ' stickable';
}

$site_logo_url = $theme_mod['site_logo_url'] && $theme_mod['site_logo_url'] != '#' ? esc_url($theme_mod['site_logo_url']) : esc_url(home_url('/'));
$dropdown_position = $theme_mod['dropdown_menu_position'] ?: 'right';
?>

    <script>
        jQuery(function ($) {
            $(window).on('scroll', function () {
                if ($(window).scrollTop() > 10)
                    $('#header-6').addClass('header-with-bg');
                else
                    $('#header-6').removeClass('header-with-bg');
            });
        });
    </script>
    <div id="header-style-6" class="d-none d-lg-block">
        <header id="header-6" class="header navigation3">
            <nav class="navbar navbar-expand-lg navbar-light navbar-dark default-menu justify-content-between <?php echo esc_attr($stickable . ' ' . $nav_width); ?>">
                <div class="<?php echo esc_attr($content_layout); ?> header-contents">
                    <!-- Icon+Text & Image Logo Default Image Logo -->
                    <div class="logo-div">
                        <a class="navbar-brand default-logo site-logo"
                           href="<?php echo $site_logo_url; ?>"><?php echo AttireThemeEngine::SiteLogo(); ?></a>
                    </div>

                    <button class="col-lg-1 navbar-toggler float-right" type="button" data-toggle="collapse"
                            data-target="#header6_menu"
                            aria-controls="header6_menu" aria-expanded="false"
                            aria-label="<?php _e('Toggle navigation', 'attire'); ?>">
                        <span class="mobile-menu-toggle"><i class="fas fa-bars " aria-hidden="true"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="header6_menu">

                        <?php

                        if ($dropdown_position === 'right') {
                            if (!class_exists('wp_bootstrap_navwalker')) {
                                require get_template_directory() . '/libs/wp_bootstrap_navwalker.php';
                            }
                            wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'depth' => 0,
                                    'container' => false,
                                    'menu_class' => 'nav navbar-nav mainmenu ml-auto ',
                                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                    'walker' => new wp_bootstrap_navwalker()
                                )
                            );
                        } else {
                            if (!class_exists('wp_bootstrap_navwalker_left')) {
                                require get_template_directory() . '/libs/wp_bootstrap_navwalker_left.php';
                            }
                            wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'depth' => 0,
                                    'container' => false,
                                    'menu_class' => 'nav navbar-nav mainmenu ml-auto ',
                                    'fallback_cb' => 'wp_bootstrap_navwalker_left::fallback',
                                    'walker' => new wp_bootstrap_navwalker_left()
                                )
                            );
                        }
                        get_search_form(true);
                        ?>

                    </div>
                </div>
            </nav><!-- end default nav -->
        </header>

    </div>
<?php

load_template(locate_template("templates/headers/mobile.php"));
