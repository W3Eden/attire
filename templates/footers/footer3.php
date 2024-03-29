<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_mod      = WPATTIRE()->theme_options;
$content_layout = $theme_mod['footer_content_layout_type'];
$site_logo_url = $theme_mod['site_logo_url'] && $theme_mod['site_logo_url'] != '#' ? esc_url($theme_mod['site_logo_url']) : esc_url(home_url('/'));
?>
<footer class="footer3" id="footer3">
    <div class="item dark">
        <div class="<?php echo esc_attr( $content_layout ); ?> footer-contents">

            <div class="row align-items-center">

				<?php if ( isset( $theme_mod['copyright_info_visibility'] ) && $theme_mod['copyright_info_visibility'] === 'show' ) { ?>
                    <div class="col-lg-4 col-sm-4 footer-copyright">
                        <div class="copyright-outer">
                            <p class="copyright-text"><?php if ( isset( $theme_mod['copyright_info'] ) ) {
									echo esc_html( $theme_mod['copyright_info'] );
								}
								echo wp_kses_post( __( ' Built with', 'attire' ) ) ?>
                                <a style="text-shadow: 2px 2px #2f4f4f;" href="https://wpattire.com/" target="_blank"><strong class="text-warning">ATTIRE</strong></a>
                            </p>
                        </div>
                    </div>
				<?php } ?>
                <div class="col-lg-4 col-sm-4 text-center"><a class="footer-logo navbar-brand default-logo"
                                                              href="<?php echo $site_logo_url; ?>"><?php echo AttireThemeEngine::FooterLogo(); ?></a>
                </div>
                <div class="col-lg-4 col-sm-4 social-icons-div">
                    <ul class="list-inline text-right social-icons-div">
						<?php if ( isset( $theme_mod['facebook_profile_url'] ) && $theme_mod['facebook_profile_url'] !== '' ) { ?>
                            <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                            href="<?php echo esc_url( $theme_mod['facebook_profile_url'] ); ?>"><i
                                            class="fab fa-facebook-f"></i></a></li>
						<?php }
						if ( isset( $theme_mod['instagram_profile_url'] ) && $theme_mod['instagram_profile_url'] !== '' ) { ?>
                            <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                            href="<?php echo esc_url( $theme_mod['instagram_profile_url'] ); ?>">
                                    <i class="fab fa-instagram"></i></a></li>
						<?php }
						if ( isset( $theme_mod['googleplus_profile_url'] ) && $theme_mod['googleplus_profile_url'] !== '' ) { ?>
                            <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                            href="<?php echo esc_url( $theme_mod['googleplus_profile_url'] ); ?>"><i
                                            class="fab fa-youtube"></i></a></li>
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
                                                            href="<?php echo esc_url( $theme_mod['linkedin_profile_url'] ); ?>"><i class="fab fa-linkedin-in"></i></a></li>
						<?php } ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</footer>

