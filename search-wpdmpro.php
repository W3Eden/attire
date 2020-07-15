<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

$current_post_type = isset( $_GET['post_type'] ) && post_type_exists( $_GET['post_type'] ) ? $_GET['post_type'] : 'post';
//AttireFramework::DynamicSidebars('left');


?>
    <div class="row">
		<?php do_action( ATTIRE_THEME_PREFIX . "before_main_content_area" );
		AttireFramework::DynamicSidebars( 'left' );
		?>
        <div class="<?php AttireFramework::ContentAreaWidth(); ?> attire-post-and-comments">
            <h2 class="search-result-title"> <?php echo __( 'Search result for: ', 'attire' ) . esc_html( get_search_query() ) ?></h2>

			<?php
			if ( have_posts() ) {
				?>


                <div class="archive-div post">
                    <div class="row">
					<?php
					while ( have_posts() ): the_post();
						?>
                        <div class="col-md-12">
							<?php get_template_part( "search-result-wpdmpro"); ?>
                            <div class="clear"></div>
                        </div>
					<?php
					endwhile; ?>
                    </div>
                </div>
				<?php
				global $wp_query;
				if ( $wp_query->max_num_pages > 1 ) :
					?>
                    <div class="clear"></div>
                    <div id="nav-below" class="navigation post box arc">
						<?php get_template_part( 'pagination' ); ?>
                    </div>
				<?php endif;

			} else {
				?>

                <div class="card">
                    <div class="card-body">
                        <h2><?php echo esc_attr__( 'Nothing Found!', 'attire' ); ?></h2>
                        <p><?php echo esc_attr__( 'Try Different Search Term', 'attire' ); ?></p>
                    </div>
                </div>

				<?php
			}
			?>

        </div>
		<?php
		AttireFramework::DynamicSidebars( 'right' );
		do_action( ATTIRE_THEME_PREFIX . "after_main_content_area" ); ?>
    </div>
<?php
get_footer();
