<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
$meta_position = AttireThemeEngine::NextGetOption('attire_single_post_meta_position', 'after-title');
$author_box = AttireThemeEngine::NextGetOption('attire_single_post_author_box', 'show');
$page_header_active = AttireThemeEngine::NextGetOption('ph_active', false);

$navigation_buttons = AttireThemeEngine::NextGetOption('attire_single_post_post_navigation', 'show');
$navigation_buttons = $navigation_buttons === 'show' ? 'canshow' : 'noshow';
?>
    <div class="row">
        <?php AttireFramework::DynamicSidebars('left');
        do_action(ATTIRE_THEME_PREFIX . "before_main_content_area");
        ?>
        <div class="<?php AttireFramework::ContentAreaWidth(); ?> attire-post-and-comments">
            <div id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

                <?php

                while (have_posts()): the_post(); ?>
                    <div class="single-post-content mb-4">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="mb-3">
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                        <?php } ?>
                        <?php if (!$page_header_active) { ?>
                            <h1 class="single-post-title">
                                <?php
                                do_action(ATTIRE_THEME_PREFIX . 'before_post_title');
                                the_title();
                                do_action(ATTIRE_THEME_PREFIX . 'after_post_title');
                                ?>
                            </h1>
                            <?php
                            if ($meta_position === 'after-title') {
                                get_template_part('single', 'post-meta');
                            } ?>
                        <?php } ?>
                        <div <?php post_class('post'); ?>>

                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                            <div class="clear"></div>

                            <?php wp_link_pages(); ?>
                            <div class="clear"></div>


                        </div>
                    </div>
                    <?php
                    if ($meta_position === 'after-content') {
                        get_template_part('single', 'post-meta');
                    } ?>
                    <?php if (has_tag()) { ?>
                        <div class="single-post-tags card">
                            <!-- div class="card-header tag-title"><?php echo esc_html__('Post Tags', 'attire'); ?></div -->
                            <div class="card-body">
                                <?php the_tags('<div class="post-tags">', ' ', '</div>'); ?>
                            </div>
                        </div>

                    <?php } ?>

                    <?php if ($author_box === 'show') { ?>
                        <div class="card single-post-author">
                            <div class="card-body">
                                <div class="post-author-info">

                                    <div class="media">
                                        <img class="mr-3 mb-3 circle author-image"
                                             src="<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'), array('size' => 128))); ?>"
                                             alt="<?php esc_attr_e('Author Avatar', 'attire') ?>">
                                        <div class="media-body">
                                            <h3 class="author-name mt-0"><?php echo esc_html(get_the_author_meta('display_name')); ?></h3>
                                            <?php echo wp_kses_post(get_the_author_meta('description')); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (get_previous_post_link() || get_next_post_link()) { ?>
                        <div class="card post-navs <?php echo esc_attr($navigation_buttons); ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo esc_attr(get_previous_post()->post_title); ?>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <?php echo esc_attr(get_next_post()->post_title); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php previous_post_link('%link', '&#9664; ' . __('Read Previous Article', 'attire')); ?>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <?php next_post_link('%link', __('Read Next Article', 'attire') . ' &#9654;'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (comments_open()) { ?>
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
        do_action(ATTIRE_THEME_PREFIX . "after_main_content_area");
        AttireFramework::DynamicSidebars('right'); ?>
    </div>


<?php get_footer();
