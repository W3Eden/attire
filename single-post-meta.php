<?php
if (!defined('ABSPATH')) {
    exit;
}
$navigation_buttons = AttireThemeEngine::NextGetOption('attire_single_post_post_navigation', 'show');
$navigation_buttons = $navigation_buttons === 'show' ? 'canshow' : 'noshow';
?>
<div class="text-muted post-meta post-meta-bottom">
    <ul class="meta-list">
        <li>
            <span><?php echo __( 'On', 'attire' ); ?></span>
            <span class="black bold"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
        </li>
        <li>
            <span><?php echo __( 'By', 'attire' ); ?></span>
            <span class="bold">
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
        </li>
        <li>
            <span><?php echo __( 'In', 'attire' ); ?></span>
            <span class="bold">
				<?php the_category( ', ' ); ?></span>
        </li>
        <li>
            <span><a href="<?php comments_link(); ?>"><?php comments_number( __( 'No comments', 'attire' ), __( 'One comment', 'attire' ), __( '% comments', 'attire' ) ); ?></a></span>
        </li>
	    <?php if (get_previous_post_link() || get_next_post_link()) { ?>
            <li class="post-navs float-right <?php echo esc_attr($navigation_buttons); ?>">
                <span class="text-primary"><?php previous_post_link('%link', '<i class="far fa-arrow-alt-circle-left"></i> ' . __('Previous', 'attire')); ?></span>
                <i class="far fa-dot-circle"></i>
                <span class=""><?php next_post_link('%link', __('Next', 'attire') . ' <i class="far fa-arrow-alt-circle-right"></i>'); ?></span>
            </li>
	    <?php } ?>

    </ul>
</div>
<!-- /.post-meta -->