<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_mod      = WPATTIRE()->theme_options;
$content_layout = $theme_mod['footer_content_layout_type']; // container or container-fluid
$site_logo_url = $theme_mod['site_logo_url'] && $theme_mod['site_logo_url'] != '#' ? esc_url($theme_mod['site_logo_url']) : esc_url(home_url('/'));
?>
<footer class="footer2" id="footer2">
    <div class="item dark">
        <div class="<?php echo esc_attr( $content_layout ); ?> footer-contents">
            <div class="col-lg-12">
                <div class="social row align-items-center justify-content-between">
                    <ul class="list-inline ">
                        <li class="list-inline-item">
                            <a class="footer-logo navbar-brand default-logo"
                               href="<?php echo $site_logo_url; ?>"><?php echo AttireThemeEngine::FooterLogo(); ?></a>
                        </li>
                    </ul>
					<?php if ( isset( $theme_mod['copyright_info_visibility'] ) && $theme_mod['copyright_info_visibility'] === 'show' ) { ?>
                        <ul class="list-inline mr-auto">

                            <li class="list-inline-item">
                                <div class="copyright-outer">

                                    <p class="copyright-text"><?php if ( isset( $theme_mod['copyright_info'] ) ) {
											echo esc_html( $theme_mod['copyright_info'] );
										}
	                                    echo wp_kses_post( __( ' Built with', 'attire' ) ) ?>
                                        <a style="text-shadow: 2px 2px #2f4f4f;" href="https://wpattire.com/" target="_blank"><strong class="text-warning">ATTIRE</strong></a>
                                    </p>
                                </div>

                            </li>
                        </ul>
					<?php } ?>
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
