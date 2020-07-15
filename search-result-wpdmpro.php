<?php
/**
 * Base: wpdmpro
 * Developer: shahjada
 * Team: W3 Eden
 * Date: 2/1/20 19:40
 */
if(!defined("ABSPATH")) die();
?>
<div class="media">
    <div class="mr-3">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="media-body">
        <h3 class="search-result-title"><?php the_title(); ?></h3>
        <?php _e('Last updated on ', 'attire'); ?> <?php echo get_the_modified_date(); ?>
    </div>
</div>
