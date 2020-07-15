<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_mod      = get_option( 'attire_options' );
$content_layout = $theme_mod['header_content_layout_type'];
$nav_width      = isset( $theme_mod['main_layout_type'] ) ? $theme_mod['main_layout_type'] : 'container-fluid'; // For sticky menu to match site width

$stickable = '';
if ( isset( $theme_mod['attire_nav_behavior'] ) && $theme_mod['attire_nav_behavior'] === 'sticky' ) {
	$stickable = ' stickable';
}
?>
<div id="header-style-1" class="d-none d-lg-block">
    <header id="header-1" class="header navigation1">
        <div class="middle-header">
            <div class="<?php echo esc_attr( $content_layout . ' ' . $nav_width ); ?> header-contents">
                <div class="row justify-content-between">
                    <div class="col-lg-auto logo-div">
                        <!-- Icon+Text & Image Logo Default Image Logo -->
                        <div class="middle-logo logo-div">
                            <a class="site-logo navbar-brand"
                               href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo AttireThemeEngine::SiteLogo(); ?></a>
							<?php $description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
                                <h2 class="site-description"><?php echo wp_kses_post( $description ); /* WPCS: xss ok. */ ?></h2>
							<?php
							endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-auto social-icons-div">
                        <ul class="list-inline middle-social-icon">
                            <?php if ( isset( $theme_mod['facebook_profile_url'] ) && $theme_mod['facebook_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item">
                                    <a class="social-link" rel="nofollow" target="_blank" href="<?php echo esc_url( $theme_mod['facebook_profile_url'] ); ?>">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/social/facebook.svg" />
                                    </a>
                                </li>
                            <?php }
                            if ( isset( $theme_mod['instagram_profile_url'] ) && $theme_mod['instagram_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item">
                                    <a class="social-link" rel="nofollow" target="_blank" href="<?php echo esc_url( $theme_mod['instagram_profile_url'] ); ?>">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/social/instagram.svg" />
                                    </a>
                                </li>
                            <?php }
                            if ( isset( $theme_mod['googleplus_profile_url'] ) && $theme_mod['googleplus_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item">
                                    <a class="social-link" rel="nofollow" target="_blank" href="<?php echo esc_url( $theme_mod['googleplus_profile_url'] ); ?>">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/social/youtube.svg" />
                                    </a>
                                </li>
                            <?php }
                            if ( isset( $theme_mod['twitter_profile_url'] ) && $theme_mod['twitter_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item">
                                    <a class="social-link" rel="nofollow" target="_blank" href="<?php echo esc_url( $theme_mod['twitter_profile_url'] ); ?>">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/social/twitter.svg" />
                                    </a>
                                </li>
                            <?php }
                            if ( isset( $theme_mod['pinterest_profile_url'] ) && $theme_mod['pinterest_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item">
                                    <a class="social-link" rel="nofollow" target="_blank" href="<?php echo esc_url( $theme_mod['pinterest_profile_url'] ); ?>">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/social/pinterest.svg" />
                                    </a>
                                </li>
                            <?php }
                            if ( isset( $theme_mod['linkedin_profile_url'] ) && $theme_mod['linkedin_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item">
                                    <a class="social-link" rel="nofollow" target="_blank" href="<?php echo esc_url( $theme_mod['linkedin_profile_url'] ); ?>">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/social/linkedin.svg" />
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="long-nav navbar navbar-expand-lg navbar-light navbar-dark default-menu justify-content-between <?php echo esc_attr( $stickable . ' ' . $nav_width ); ?>">
            <div class="<?php echo esc_attr( $content_layout ); ?> header-contents">
                <button class="col-lg-1 navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#header1_menu" aria-controls="header1_menu" aria-expanded="false"
                        aria-label="<?php esc_attr_e( 'Toggle navigation', 'attire' ); ?>">
                    <span class="mobile-menu-toggle"><i class="fas fa-bars " aria-hidden="true"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="header1_menu">

					<?php
					if ( ! class_exists( 'wp_bootstrap_navwalker' ) ) {
						require get_template_directory() . '/libs/wp_bootstrap_navwalker.php';
					}
					wp_nav_menu( array(
							'theme_location' => 'primary',
							'depth'          => 0,
							'container'      => false,
							'menu_class'     => 'nav navbar-nav mainmenu mr-auto',
							'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
							'walker'         => new wp_bootstrap_navwalker()
						)
					);
					get_search_form( true );

					?>
                </div>
            </div>
        </nav>
    </header>
</div>


<?php

load_template( locate_template( "templates/headers/mobile.php" ) );
