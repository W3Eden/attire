<?php
if (!defined('ABSPATH')) {
    exit;
}
$archive_year  = get_the_time('Y');
$archive_month = get_the_time('m');
$archive_day   = get_the_time('d');
?>
<div class="post-meta post-meta-bottom">
    <ul class="meta-list">
        <li>
            <i class="fa fa-calendar mr-2"></i><span><?php echo __('On', 'attire'); ?></span>
            <span class="black bold"><a
                        href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_modified_date(); ?></a></span>
        </li>
        <li>
            <i class="fa fa-user-circle mr-2"></i><span><?php echo __('By', 'attire'); ?></span>
            <span class="bold">
                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></span>
        </li>
        <li>
            <i class="fas fa-sitemap mr-2"></i><span><?php echo __('In', 'attire'); ?></span>
            <span class="bold">
				<?php the_category(', '); ?></span>
        </li>
        <li>
            <i class="fa fa-comment mr-2"></i><span><a
                        href="<?php comments_link(); ?>"><?php comments_number(__('No comments', 'attire'), __('One comment', 'attire'), __('% comments', 'attire')); ?></a></span>
        </li>

    </ul>
</div>
<!-- /.post-meta -->