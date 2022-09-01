<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$meta_position              = AttireThemeEngine::NextGetOption( 'attire_single_post_meta_position', 'after-title' );
$attire_disable_wpdmpro_nav = apply_filters( "attire_disable_wpdmpro_nav", false );
$author_box                 = AttireThemeEngine::NextGetOption( 'attire_single_post_author_box', 'show' );
$navigation_buttons         = AttireThemeEngine::NextGetOption( 'attire_single_post_post_navigation', 'show' );
$navigation_buttons         = $navigation_buttons === 'show' ? 'canshow' : 'noshow';
?>
    <div class="row">
		<?php AttireFramework::DynamicSidebars( 'left' );
		do_action( ATTIRE_THEME_PREFIX . "before_main_content_area" );
		?>
        <div class="<?php AttireFramework::ContentAreaWidth(); ?> attire-post-and-comments">
            <div id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>

				<?php

				while ( have_posts() ): the_post(); ?>
                    <div <?php post_class( 'post content-wpdmpro' ); ?>>

                        <div class="entry-content">
							<?php the_content(); ?>
                        </div>
                        <div class="clear"></div>


                    </div>

					<?php
					if ( ! $attire_disable_wpdmpro_nav ) {

						if ( get_previous_post_link() || get_next_post_link() ) {
							?>
                            <div class="card post-navs <?php echo esc_attr( $navigation_buttons ); ?>">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
											<?php if ( $previous_post = get_previous_post() ) {
												echo esc_attr( $previous_post->post_title );
											} ?>
                                        </div>
                                        <div class="col-6 text-right">
											<?php if ( $next_post = get_next_post() ) {
												echo esc_attr( $next_post->post_title );
											} ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-6 previous-post">
											<?php previous_post_link( '%link', __( 'Previous Item', 'attire' ) ); ?>
                                        </div>
                                        <div class="col-6 text-right next-post">
											<?php next_post_link( '%link', __( 'Next Item', 'attire' ) ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php
						}
					}
					?>

					<?php if ( comments_open() ) { ?>
                        <div class="mx_comments">
							<?php comments_template(); ?>
                        </div>
					<?php } ?>
				<?php endwhile; ?>
            </div>
        </div>
		<?php
		do_action( ATTIRE_THEME_PREFIX . "after_main_content_area" );
		AttireFramework::DynamicSidebars( 'right' ); ?>
    </div>


<?php get_footer();
