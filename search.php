<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
global $wp_query;
$post_types = isset($_REQUEST['post_type'])  ? $_REQUEST['post_type'] : array('post');
if(!is_array($post_types)) $post_types = array( $post_types );

?>

	<div class="row">
		<?php do_action( ATTIRE_THEME_PREFIX . "before_main_content_area" );
		AttireFramework::DynamicSidebars( 'left' );
		?>
		<div class="<?php AttireFramework::ContentAreaWidth(); ?> attire-post-and-comments">

            <div class="card mb-3">
                <div class="card-header bg-white">
                    <div class="float-right text-success">
                        <?php echo sprintf(__("%d results found", "attire"), $wp_query->found_posts); ?>
                    </div>
                    <h2 class="search-result-title m-0 p-0"><?php echo __( 'Search result for: ', 'attire' ) . esc_html( get_search_query() ) ?></h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo esc_url(home_url('/')) ?>">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-control-inline">
                                <input <?php checked(1, in_array('post', $post_types)) ?> type="checkbox" id="spost-srp" name="post_type[]" value="post" class="custom-control-input">
                                <label class="custom-control-label" for="spost-srp"><?php _e('Post', 'attire'); ?></label>
                            </div>
                            <div class="custom-control custom-switch custom-control-inline">
                                <input <?php checked(1, in_array('page', $post_types)) ?> type="checkbox" id="spage-srp" name="post_type[]" value="page" class="custom-control-input">
                                <label class="custom-control-label" for="spage-srp"><?php _e('Page', 'attire'); ?></label>
                            </div>
                            <?php if(post_type_exists('wpdmpro')){ ?>
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input <?php checked(1, in_array('wpdmpro', $post_types)) ?> type="checkbox" id="wpdmpro-srp" name="post_type[]" value="wpdmpro" class="custom-control-input">
                                    <label class="custom-control-label" for="wpdmpro-srp"><?php _e('Downloads', 'attire'); ?></label>
                                </div>
                            <?php } ?>
                            <?php if(post_type_exists('product')){ ?>
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input <?php checked(1, in_array('product', $post_types)) ?> type="checkbox" id="product-srp" name="post_type[]" value="product" class="custom-control-input">
                                    <label class="custom-control-label" for="product-srp"><?php _e('Products', 'attire'); ?></label>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" class="form-control input-lg input-search p-4" placeholder="<?php _e('Search...', 'attire'); ?>" name="s" value="<?php echo esc_html( get_search_query() ) ?>" />
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

			<?php
			if ( have_posts() ) {
				?>
				<div class="archive-div post">
					<?php
					while ( have_posts() ): the_post();

							?>
							<div class="search-item">
								<?php //get_template_part( "content", get_post_format() ); ?>
								<div class="card mb-3 <?php echo $post->post_type ?>-card" data-posttype="<?php echo get_post_type_object($post->post_type)->label; ?>">
									<div class="card-body">
										<div class="media">
											<div class="mr-3">
												<a class="search-image-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail', array('class' => 'attire-search-image') ); ?></a>
											</div>
											<div class="media-body">
												<h3 class="post-title mt-0 <?php echo $post->post_type ?>-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<?php the_excerpt(); ?>
											</div>
										</div>
									</div>
									<div class="card-footer bg-white text-small text-muted">
										<i class="fa fa-calendar mr-2"></i><?php echo get_the_date(); ?>
										<i class="fa fa-user-circle ml-3 mr-2"></i><?php the_author(); ?>
										<?php if(has_category()) { ?><i class="fa fa-stream ml-3 mr-2"></i><?php the_category(", "); } ?>
										<?php if(has_term('', 'wpdmcategory')) { ?><i class="fa fa-stream ml-3 mr-2"></i><?php the_terms(get_the_ID(), 'wpdmcategory'); } ?>
										<i class="fa fa-comments ml-3 mr-2"></i><?php comments_number(); ?>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						<?php

					endwhile;
					?>
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
