<?php
if (!defined('ABSPATH')) {
    exit;
}
$posts_per_row = isset($args['posts_per_row']) ? $args['posts_per_row'] : 1;

$sort_by = AttireThemeEngine::NextGetOption('attire_archive_page_post_sorting', 'modified_desc');
if (strpos($sort_by, 'date') !== false) {
    $archive_year = get_the_time('Y');
    $archive_month = get_the_time('m');
    $archive_day = get_the_time('d');
    $date_to_show = get_the_date();

} else {
    $archive_year = get_the_modified_time('Y');
    $archive_month = get_the_modified_time('m');
    $archive_day = get_the_modified_time('d');
    $date_to_show = get_the_modified_date();
}
?>
<article <?php post_class('post' . ($posts_per_row !== 1 ? ' h-95-5' : '')) ?>>
    <?php do_action(ATTIRE_THEME_PREFIX . 'before_content'); ?>
    <div class="card<?php echo $posts_per_row !== 1 ? ' h-100' : '' ?>">
        <a class="card-image"
           href="<?php the_permalink(); ?>"><?php the_post_thumbnail('attire-card-image', array('class' => 'card-img-top')); ?></a>
        <!-- /.post-thumb -->
        <div class="card-body">
            <?php do_action(ATTIRE_THEME_PREFIX . 'before_post_title'); ?>
            <h3 class="card-title post-title"><a
                        href="<?php the_permalink(); ?>"><?php echo the_title('', '', false) ? the_title('', '', false) : '(Untitled)'; ?></a>
            </h3>
            <?php do_action(ATTIRE_THEME_PREFIX . 'after_post_title'); ?>
            <div class="post-content card-text">
                <?php
                $full_or_excerpt = AttireThemeEngine::NextGetOption('attire_archive_page_post_view', 'excerpt');
                if ($full_or_excerpt === 'full') {
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
                <div class="justify-content-between row no-gutters">
                    <div class="col-md">
                        <span><?php _e('On', 'attire'); ?></span>
                        <span class="black bold"><a
                                    href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><?php echo $date_to_show; ?></a></span>
                    </div>
                    <div class="col-md text-md-right">
                        <span><?php _e('By', 'attire'); ?></span>
                        <span class="bold">
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></span>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.post-meta -->
    </div>

    <?php do_action(ATTIRE_THEME_PREFIX . 'after_content'); ?>
</article>