<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
    <div class="archive-div post row">
        <?php
        $count = 0;
        $posts_per_row = AttireThemeEngine::NextGetOption('attire_posts_per_row', 3);

        while (have_posts()): the_post();
            ?>
            <div class="archive-item col-md">
                <?php get_template_part("content", get_post_format()); ?>
                <div class="clear"></div>
            </div>
            <?php
            $count++;
            if ($count % $posts_per_row===0) {
                echo '<div class="w-100"></div>';
            }
        endwhile; ?>
    </div>
<?php
global $wp_query;
if ($wp_query->max_num_pages > 1) :
    ?>
    <div class="clear"></div>
    <div id="nav-below" class="navigation post box arc">
        <?php get_template_part('pagination'); ?>
    </div>
<?php endif;
