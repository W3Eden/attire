<?php
if (!defined('ABSPATH')) {
    exit;
}

?>
<div class="post-meta post-meta-bottom">
    <ul class="meta-list">
        <li>
            <i class="fa fa-calendar mr-2"></i><span><?php echo __( 'On', 'attire' ); ?></span>
            <span class="black bold"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
        </li>
        <li>
            <i class="fa fa-user-circle mr-2"></i><span><?php echo __( 'By', 'attire' ); ?></span>
            <span class="bold">
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
        </li>
        <li>
            <i class="fas fa-sitemap mr-2"></i><span><?php echo __( 'In', 'attire' ); ?></span>
            <span class="bold">
				<?php the_category( ', ' ); ?></span>
        </li>
        <li>
            <i class="fa fa-comment mr-2"></i><span><a href="<?php comments_link(); ?>"><?php comments_number( __( 'No comments', 'attire' ), __( 'One comment', 'attire' ), __( '% comments', 'attire' ) ); ?></a></span>
        </li>

    </ul>
</div>
<!-- /.post-meta -->