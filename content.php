<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<article <?php post_class( 'post' ); ?>>
	<?php do_action( ATTIRE_THEME_PREFIX . 'before_content' ); ?>
    <div class="card">
        <a class="card-image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'attire-card-image', array('class' => 'card-img-top') ); ?></a>
        <!-- /.post-thumb -->
        <div class="card-body">
            <?php do_action( ATTIRE_THEME_PREFIX . 'before_post_title' ); ?>
            <h3 class="card-title post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php do_action( ATTIRE_THEME_PREFIX . 'after_post_title' ); ?>
            <div class="post-content card-text">

                <?php
                $full_or_excerpt = AttireThemeEngine::NextGetOption( 'attire_archive_page_post_view', 'excerpt' );
                if ( $full_or_excerpt === 'full' ) {
                    the_content();
                } else {
                    the_excerpt();
                }
                ?>
            </div>
            <!-- /.post-content -->
        </div>
        <div class="card-footer text-muted post-meta post-meta-bottom">

            <div class="meta-list">
                <div class="d-flex justify-content-between">
                    <div>
                        <span><?php echo __( 'On', 'attire' ); ?></span>
                        <span class="black bold"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
                    </div>
                    <div>
                        <span><?php echo __( 'By', 'attire' ); ?></span>
                        <span class="bold">
                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.post-meta -->
    </div>

	<?php do_action( ATTIRE_THEME_PREFIX . 'after_content' ); ?>
</article>