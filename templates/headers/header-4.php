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
    <div id="header-style-4" class="d-none d-lg-block">
        <header id="header-4" class="header navigation1">
            <div class="middle-header">
                <div class="<?php echo esc_attr($content_layout . ' ' . $nav_width); ?> header-contents">
                    <div class="row justify-content-center">
                        <div class="col-lg-auto logo-div">
                            <!-- Icon+Text & Image Logo Default Image Logo -->
                            <div class="middle-logo logo-div">
                                <a class="site-logo navbar-brand"
                                   href="<?php echo $site_logo_url; ?>"><?php echo AttireThemeEngine::SiteLogo(); ?></a>
                                <?php $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) : ?>
                                    <h2 class="pb-3 pt-0 m-0 site-description"><?php echo wp_kses_post($description); /* WPCS: xss ok. */ ?></h2>
                                <?php
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="long-nav navbar navbar-expand-lg navbar-light navbar-dark default-menu <?php echo esc_attr($stickable . ' ' . $nav_width); ?>">
                <div class="<?php echo esc_attr($content_layout); ?> header-contents">
                    <button class="col-lg-1 navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                            data-target="#header1_menu" aria-controls="header1_menu" aria-expanded="false"
                            aria-label="<?php _e('Toggle navigation', 'attire'); ?>">
                        <span class="mobile-menu-toggle"><i class="fas fa-bars " aria-hidden="true"></i></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-center" id="header1_menu">


                        <?php

                        if ($dropdown_position === 'right') {
                            if (!class_exists('wp_bootstrap_navwalker')) {
                                require get_template_directory() . '/libs/wp_bootstrap_navwalker.php';
                            }
                            wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'depth' => 0,
                                    'container' => false,
                                    'menu_class' => 'nav navbar-nav mainmenu',
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
                                    'menu_class' => 'nav navbar-nav mainmenu',
                                    'fallback_cb' => 'wp_bootstrap_navwalker_left::fallback',
                                    'walker' => new wp_bootstrap_navwalker_left()
                                )
                            );
                        }
                        get_search_form(true);
                        ?>
                    </div>
                </div>
            </nav>
        </header>
    </div>


<?php

load_template(locate_template("templates/headers/mobile.php"));
