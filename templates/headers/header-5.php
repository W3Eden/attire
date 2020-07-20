<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_mod      = WPATTIRE()->theme_options;
$content_layout = $theme_mod['header_content_layout_type'];
$search_form_visibility = isset( $theme_mod['attire_search_form_visibility'] ) ? $theme_mod['attire_search_form_visibility'] : 'show';
$nav_width      = isset( $theme_mod['main_layout_type'] ) ? $theme_mod['main_layout_type'] : 'container-fluid'; // For sticky menu to match site width

$stickable = '';
if ( isset( $theme_mod['attire_nav_behavior'] ) && $theme_mod['attire_nav_behavior'] === 'sticky' ) {
	$stickable = ' stickable';
}
?>
<div id="header-style-5" class="d-none d-lg-block">
    <header id="header-5" class="header navigation1">
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
                                <li class="list-inline-item" title="<?php esc_attr_e( 'Email', 'attire' ); ?>">
                                    <i class="far fa-paper-plane text-info"></i><span
                                            class="hidden-xs-up"><?php echo esc_html( $theme_mod['contact_email'] ); ?></span>
                                </li>
                            <?php }
                            if ( isset( $theme_mod['contact_phone'] ) && $theme_mod['contact_phone'] !== '' ) { ?>
                                <li class="list-inline-item" title="<?php esc_attr_e( 'Hot Line', 'attire' ); ?>"><i class="fas fa-phone text-primary"></i><span
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
        <div class="middle-header">
            <div class="<?php echo esc_attr( $content_layout . ' ' . $nav_width ); ?> header-contents">
                <div class="media">
                    <div class="logo-div">
                        <!-- Icon+Text & Image Logo Default Image Logo -->
                        <div class="middle-logo logo-div">
                            <a class="site-logo navbar-brand"
                               href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo AttireThemeEngine::SiteLogo(); ?></a>
                        </div>
                    </div>
                    <div class="media-body">
                        <div class="media">
                            <div class="media-body">
                                <div id="header-search-field">
                                    <?php if($search_form_visibility === 'hide'){ ?>
                                    <form class="p-0 m-0" method="get" action="<?php echo esc_url(home_url('/')) ?>">
                                        <?php if(function_exists('WC')){ ?>
                                            <input type="hidden" name="post_type" value="product" />
                                        <?php } else if(function_exists('WPDM')) { ?>
                                            <input type="hidden" name="post_type" value="wpdmpro" />
                                        <?php } ?>
                                        <input type="search" value="<?php echo wpdm_query_var('s', 'txt'); ?>" name="s" placeholder="Search<?php if(function_exists('WC')) echo ' Product' ?>..." class="form-control input-lg" />
                                    </form>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="ml-3">
                                <?php if(function_exists('WC')){ ?>
                                    <a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-outline-gray attire-tip <?php echo WC()->cart->cart_contents_count > 0 ? 'text-success':''; ?>" title="<?php echo WC()->cart->cart_contents_count; ?> <?php echo WC()->cart->cart_contents_count > 1? __('items', 'attire'):__('item', 'attire'); ?>" ><i class="fas fa-shopping-bag"></i></a>
                                <?php if ( is_user_logged_in() ) { ?>
                                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="btn btn-outline-gray attire-tip" title="<?php _e('Account','attire'); ?>"><i class="fas fa-user-circle"></i></a>
                                <?php }
                                else { ?>
                                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="btn btn-outline-gray attire-tip" title="<?php _e('Login / Register','attire'); ?>"><i class="fas fa-user-circle"></i></a>
                                <?php } ?>
                                <?php } else if(function_exists('WPDM') && function_exists('wpdmpp_cart_page')){ ?>
                                    <a href="<?php echo wpdmpp_cart_page(); ?>" class="btn btn-outline-gray attire-tip"><i class="fas fa-shopping-bag"></i></a>
                                    <?php if ( is_user_logged_in() ) { ?>
                                        <a href="<?php echo wpdm_user_dashboard_url(); ?>" class="btn btn-outline-gray attire-tip" title="<?php _e('Account','attire'); ?>"><i class="fas fa-user-circle"></i></a>
                                    <?php }
                                    else { ?>
                                        <a href="<?php echo wpdm_user_dashboard_url(); ?>" class="btn btn-outline-gray attire-tip" title="<?php _e('Login / Register','attire'); ?>"><i class="fas fa-user-circle"></i></a>
                                    <?php } ?>
                                <?php } ?>

                            </div>
                        </div>

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

    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <strong class="modal-title" id="cartModalLabel"><?php _e('Cart', 'attire'); ?></strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php //echo do_shortcode('[] '); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php _e('Continue Shopping', 'attire'); ?></button>
                    <button type="button" class="btn btn-primary"><?php _e('Checkout', 'attire'); ?></button>
                </div>
            </div>
        </div>
    </div>

<?php

load_template( locate_template( "templates/headers/mobile.php" ) );
