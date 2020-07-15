<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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
                <?php
                while ( have_posts() ): the_post();
                if($post->post_type === 'post'):
                    ?>
                    <div class="archive-item">
                        <?php get_template_part( "content", get_post_format() ); ?>
                        <div class="clear"></div>
                    </div>
                <?php
                endif;
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
