<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_mod      = get_option( 'attire_options' );
$content_layout = $theme_mod['header_content_layout_type'];
$nav_width      = isset( $theme_mod['main_layout_type'] ) ? $theme_mod['main_layout_type'] : 'container-fluid'; // For sticky menu to match site width
$stickable      = '';
if ( isset( $theme_mod['attire_nav_behavior'] ) && $theme_mod['attire_nav_behavior'] === 'sticky' ) {
	$stickable = ' stickable';
}
?>
    <div id="header-style-2" class="d-none d-lg-block">
        <header id="header-2" class="header navigation2">
            <!-- small menu -->
            <div class="small-menu <?php echo esc_attr( $nav_width ); ?>">
                <div class="<?php echo esc_attr( $content_layout ); ?> header-contents">
                    <div class="row justify-content-between">
                        <div class="col-lg">
                            <ul class="list-inline info-link">
                                <?php $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) : ?>
                                    <?php echo wp_kses_post( $description ); /* WPCS: xss ok. */ ?>
                                <?php
                                endif; ?>
								<?php if ( isset( $theme_mod['contact_email'] ) && $theme_mod['contact_email'] !== '' ) { ?>
                                    <li class="list-inline-item" title="<?php esc_attr_e( 'Email', 'attire' ); ?>"><i
                                                class="far fa-envelope"></i><span
                                                class="hidden-xs-up"><a
                                                    href="mailto:<?php echo esc_attr( $theme_mod['contact_email'] ); ?>"><?php echo esc_html( $theme_mod['contact_email'] ); ?></a></span>
                                    </li>
								<?php }
								if ( isset( $theme_mod['contact_phone'] ) && $theme_mod['contact_phone'] !== '' ) { ?>
                                    <li class="list-inline-item" title="<?php esc_attr_e( 'Hot Line', 'attire' ); ?>"><i
                                                class="fas fa-phone-square"></i><span
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
            <!-- small menu -->
            <!-- default nav -->
            <nav class="short-nav navbar navbar-expand-lg navbar-light default-menu <?php echo esc_attr( $stickable . ' ' . $nav_width ); ?>">
                <div class="<?php echo esc_attr( $content_layout ); ?> header-contents">
                    <!-- Icon+Text & Image Logo Default Image Logo -->
                    <div class="logo-div">
                        <a class="site-logo navbar-brand default-logo"
                           href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo AttireThemeEngine::SiteLogo(); ?></a>

                    </div>
                    <button class="col-lg-1 navbar-toggler float-right" type="button" data-toggle="collapse"
                            data-target="#header2_menu"
                            aria-controls="header2_menu" aria-expanded="false"
                            aria-label="<?php esc_attr_e( 'Toggle navigation', 'attire' ); ?>">
                        <span class="mobile-menu-toggle"><i class="fas fa-bars " aria-hidden="true"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="header2_menu">
						<?php


						if ( ! class_exists( 'wp_bootstrap_navwalker' ) ) {
							require get_template_directory() . '/libs/wp_bootstrap_navwalker.php';
						}
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'container'      => false,
							'depth'          => 0,
							'menu_class'     => 'nav navbar-nav mainmenu ml-auto',
							'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
							'walker'         => new wp_bootstrap_navwalker()
						) );
						get_search_form( true );

						?>
                    </div>
                </div>
            </nav><!-- end default nav -->

            <!-- /.navbar -->
        </header>
    </div>
<?php

load_template( locate_template( "templates/headers/mobile.php" ) );
