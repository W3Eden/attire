<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
get_header();
$meta_position = AttireThemeEngine::NextGetOption( 'attire_single_post_meta_position', 'after-title' );

?>
    <div class="row">
        <?php AttireFramework::DynamicSidebars( 'left' );
        do_action( ATTIRE_THEME_PREFIX . "before_main_content_area" );
        ?>
        <div class="<?php AttireFramework::ContentAreaWidth(); ?> attire-post-and-comments">
            <div id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

                <?php

                while ( have_posts() ): the_post(); ?>
                    <div <?php post_class( 'post content-wpdmpro' ); ?>>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                        <div class="clear"></div>




                    </div>

                    <?php if(comments_open()){ ?>
                        <div class=" mx_comments">
                            <div class="">

                                <?php comments_template(); ?>
                            </div>
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
