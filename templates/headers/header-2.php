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
    <div id="header-style-2" class="d-none d-lg-block">
        <header id="header-2" class="header navigation2">
            <!-- small menu -->
            <div id="top-bar" class="small-menu <?php echo esc_attr( $nav_width ); ?>">
                <div class="<?php echo esc_attr( $content_layout ); ?> header-contents">
                    <div class="row justify-content-between">
                        <div class="col-lg">
                            <ul class="list-inline info-link">
                                <?php $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) : ?>
                                    <?php echo "<li class='list-inline-item'>".wp_kses_post( $description )."</li>"; /* WPCS: xss ok. */ ?>
                                <?php
                                endif; ?>
                                <?php if ( isset( $theme_mod['contact_email'] ) && $theme_mod['contact_email'] !== '' ) { ?>
                                    <li class="list-inline-item" title="<?php _e( 'Email', 'attire' ); ?>">
                                        <i class="far fa-paper-plane text-info"></i><span
                                                class="hidden-xs-up"><?php echo esc_html( $theme_mod['contact_email'] ); ?></span>
                                    </li>
                                <?php }
                                if ( isset( $theme_mod['contact_phone'] ) && $theme_mod['contact_phone'] !== '' ) { ?>
                                    <li class="list-inline-item" title="<?php _e( 'Hot Line', 'attire' ); ?>"><i class="fas fa-phone text-primary"></i><span
                                                class="hidden-xs-up"><?php echo esc_html( $theme_mod['contact_phone'] ); ?></span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                        <div class="col-lg-auto social-icons-div">
                            <ul class="list-inline middle-social-icon">
                                <?php if ( isset( $theme_mod['facebook_profile_url'] ) && $theme_mod['facebook_profile_url'] !== '' ) { ?>
                                    <li class="list-inline-item">
                                        <a class="social-link" rel="nofollow" target="_blank" href="<?php echo esc_url( $theme_mod['facebook_profile_url'] ); ?>">
                                            <img src="<?php echo ATTIRE_TEMPLATE_URL ?>/images/social/facebook.svg" />
                                        </a>
                                    </li>
                                <?php }
                                if ( isset( $theme_mod['instagram_profile_url'] ) && $theme_mod['instagram_profile_url'] !== '' ) { ?>
                                    <li class="list-inline-item">
                                        <a class="social-link" rel="nofollow" target="_blank" href="<?php echo esc_url( $theme_mod['instagram_profile_url'] ); ?>">
                                            <img src="<?php echo ATTIRE_TEMPLATE_URL ?>/images/social/instagram.svg" />
                                        </a>
                                    </li>
                                <?php }
                                if ( isset( $theme_mod['googleplus_profile_url'] ) && $theme_mod['googleplus_profile_url'] !== '' ) { ?>
                                    <li class="list-inline-item">
                                        <a class="social-link" rel="nofollow" target="_blank" href="<?php echo esc_url( $theme_mod['googleplus_profile_url'] ); ?>">
                                            <img src="<?php echo ATTIRE_TEMPLATE_URL ?>/images/social/youtube.svg" />
                                        </a>
                                    </li>
                                <?php }
                                if ( isset( $theme_mod['twitter_profile_url'] ) && $theme_mod['twitter_profile_url'] !== '' ) { ?>
                                    <li class="list-inline-item">
                                        <a class="social-link" rel="nofollow" target="_blank" href="<?php echo esc_url( $theme_mod['twitter_profile_url'] ); ?>">
                                            <img src="<?php echo ATTIRE_TEMPLATE_URL ?>/images/social/twitter.svg" />
                                        </a>
                                    </li>
                                <?php }
                                if ( isset( $theme_mod['pinterest_profile_url'] ) && $theme_mod['pinterest_profile_url'] !== '' ) { ?>
                                    <li class="list-inline-item">
                                        <a class="social-link" rel="nofollow" target="_blank" href="<?php echo esc_url( $theme_mod['pinterest_profile_url'] ); ?>">
                                            <img src="<?php echo ATTIRE_TEMPLATE_URL ?>/images/social/pinterest.svg" />
                                        </a>
                                    </li>
                                <?php }
                                if ( isset( $theme_mod['linkedin_profile_url'] ) && $theme_mod['linkedin_profile_url'] !== '' ) { ?>
                                    <li class="list-inline-item">
                                        <a class="social-link" rel="nofollow" target="_blank" href="<?php echo esc_url( $theme_mod['linkedin_profile_url'] ); ?>">
                                            <img src="<?php echo ATTIRE_TEMPLATE_URL ?>/images/social/linkedin.svg" />
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- small menu -->
            <!-- default nav -->
            <nav class="short-nav navbar navbar-expand-lg navbar-light default-menu <?php echo esc_attr($stickable . ' ' . $nav_width); ?>">
                <div class="<?php echo esc_attr($content_layout); ?> header-contents">
                    <!-- Icon+Text & Image Logo Default Image Logo -->
                    <div class="logo-div">
                        <a class="site-logo navbar-brand default-logo"
                           href="<?php echo $site_logo_url; ?>"><?php echo AttireThemeEngine::SiteLogo(); ?></a>

                    </div>
                    <button class="col-lg-1 navbar-toggler float-right" type="button" data-toggle="collapse"
                            data-target="#header2_menu"
                            aria-controls="header2_menu" aria-expanded="false"
                            aria-label="<?php _e('Toggle navigation', 'attire'); ?>">
                        <span class="mobile-menu-toggle"><i class="fas fa-bars " aria-hidden="true"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="header2_menu">
                        <?php

                        if ($dropdown_position === 'right') {
                            if (!class_exists('wp_bootstrap_navwalker')) {
                                require get_template_directory() . '/libs/wp_bootstrap_navwalker.php';
                            }
                            wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'depth' => 0,
                                    'container' => false,
                                    'menu_class' => 'nav navbar-nav mainmenu ml-auto',
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
                                    'menu_class' => 'nav navbar-nav mainmenu ml-auto',
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

            <!-- /.navbar -->
        </header>
    </div>
<?php

load_template(locate_template("templates/headers/mobile.php"));
