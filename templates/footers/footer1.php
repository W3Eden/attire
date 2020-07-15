<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_mod      = get_option( 'attire_options' );
$content_layout = $theme_mod['footer_content_layout_type'];
?>
<footer class="footer1" id="footer1">
    <div class="item dark">
        <div class="<?php echo esc_attr( $content_layout ); ?> footer-contents">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12 text-center social">
                    <a class="footer-logo navbar-brand default-logo"
                       href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo AttireThemeEngine::FooterLogo(); ?></a>
                    <div class="copyright-outer">
						<?php if ( isset( $theme_mod['copyright_info_visibility'] ) && $theme_mod['copyright_info_visibility'] === 'show' ) { ?>
                            <p class="copyright-text"><?php if ( isset( $theme_mod['copyright_info'] ) ) {
									echo esc_html( $theme_mod['copyright_info'] );
								}
								echo wp_kses_post( esc_attr( ' Built with', 'attire' ) ) ?>
                                <a href="http://wpattire.com/" target="_blank"><strong>Attire</strong>.</a>
                            </p>
						<?php } ?>
                    </div>
                    <div class="social-icons-div">

                        <ul class="list-inline">
							<?php if ( isset( $theme_mod['facebook_profile_url'] ) && $theme_mod['facebook_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                                href="<?php echo esc_url( $theme_mod['facebook_profile_url'] ); ?>"><i
                                                class="fab fa-facebook-f"></i></a></li>
							<?php }
							if ( isset( $theme_mod['instagram_profile_url'] ) && $theme_mod['instagram_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                                href="<?php echo esc_url( $theme_mod['instagram_profile_url'] ); ?>"><i
                                                class="fab fa-instagram"></i></a></li>
							<?php }
							if ( isset( $theme_mod['googleplus_profile_url'] ) && $theme_mod['googleplus_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                                href="<?php echo esc_url( $theme_mod['googleplus_profile_url'] ); ?>"><i
                                                class="fab fa-google-plus-g"></i></a></li>
							<?php }
							if ( isset( $theme_mod['twitter_profile_url'] ) && $theme_mod['twitter_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                                href="<?php echo esc_url( $theme_mod['twitter_profile_url'] ); ?>"><i
                                                class="fab fa-twitter"></i></a></li>
							<?php }
							if ( isset( $theme_mod['pinterest_profile_url'] ) && $theme_mod['pinterest_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                                href="<?php echo esc_url( $theme_mod['pinterest_profile_url'] ); ?>"><i
                                                class="fab fa-pinterest-p"></i></a></li>
							<?php }
							if ( isset( $theme_mod['linkedin_profile_url'] ) && $theme_mod['linkedin_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                                href="<?php echo esc_url( $theme_mod['linkedin_profile_url'] ); ?>"><i
                                                class="fab fa-linkedin-in"></i></a></li>
							<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
