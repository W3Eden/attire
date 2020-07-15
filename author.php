<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header(); ?>

    <div class="author-page">
        <div class="row">
            <div class="col-lg-9 col-sm-8">
                <div class="row">
					<?php
					global $wp_query;

					while ( have_posts() ): the_post();
						?>
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="post-block">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
                                <div class="post-info">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                </div>
                            </div>
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
				?>
            </div>
            <div class="col-lg-3 col-sm-4">
                <div class="author-avatar">
                    <div class="card">
                        <img class="card-img-top"
                             src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'user_email' ), array( 'size' => 300 ) ) ); ?>"
                             alt="<?php esc_attr_e( 'Author avatar', 'attire' ); ?>">

                        <div class="card-footer text-muted">
							<?php echo esc_html( get_the_author_meta( 'first_name' ) . " " . get_the_author_meta( 'last_name' ) ); ?>
                        </div>
                    </div>
                </div>
                <br>
				<?php dynamic_sidebar( 'author_page' ); ?>
				<?php if ( get_the_author_meta( 'description' ) ) : ?>


                    <div class="card">
                        <div class="card-header"><?php echo __( 'About', 'attire' ); ?></div>
                        <div class="card-body">
							<?php echo esc_html( get_the_author_meta( 'description' ) ); ?>
                        </div>
                    </div>
				<?php endif; ?>

            </div>
        </div>
    </div>

<?php get_footer();
