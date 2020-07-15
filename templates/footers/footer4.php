<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_mod      = get_option( 'attire_options' );
$content_layout = $theme_mod['footer_content_layout_type'];
?>
<footer class="footer4" id="footer4">
    <div class="item dark">
        <div class="<?php echo esc_attr( $content_layout ); ?> footer-contents">
            <div class="col-lg-12">
                <div class="social row align-items-center justify-content-between">
                    <ul class="list-inline footer-content">
                        <li class="list-inline-item"><a class="footer-logo navbar-brand default-logo"
                                                        href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo AttireThemeEngine::FooterLogo(); ?></a>
                        </li>


                    </ul>
					<?php if ( isset( $theme_mod['copyright_info_visibility'] ) && $theme_mod['copyright_info_visibility'] === 'show' ) { ?>
                        <ul class="list-inline footer-content mr-auto">
                            <li class="list-inline-item">
                                <div class="copyright-outer">

                                    <p class="text-center copyright-text"><?php if ( isset( $theme_mod['copyright_info'] ) ) {
											echo esc_html( $theme_mod['copyright_info'] );
										}
										echo wp_kses_post( __( ' Built with', 'attire' ) ) ?>
                                        <a href="http://wpattire.com/" target="_blank"><strong>Attire</strong>.</a></p>
                                </div>
                            </li>
                        </ul>
					<?php } ?>
					<?php
					if ( ! class_exists( 'wp_bootstrap_navwalker' ) ) {
						require get_template_directory() . '/libs/wp_bootstrap_navwalker.php';
					}

					wp_nav_menu( array(
						'theme_location' => 'footer_menu',
						'menu_id'        => 'footer-menu',
						'container'      => false,
						'depth'          => 1,
						'menu_class'     => 'list-inline footermenu navbar',
						'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
						'walker'         => new wp_bootstrap_navwalker()
					) );
					?>
                </div>
            </div>
        </div>
    </div>
</footer>

