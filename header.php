<?php
if (!defined('ABSPATH')) {
    exit;
}
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type"
          content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<!--BODY STARTS HERE-->

<body <?php body_class('attire'); ?> <?php AttireThemeEngine::AttireBodySchema(); ?> >
<a class="skip-link screen-reader-text" href="#attire-content">
    <?php _e('Skip to content', 'attire'); ?></a>
<?php
if (function_exists('wp_body_open')) wp_body_open();

/**
 * Add anything immediately after body tag
 */

global $post;

do_action(ATTIRE_THEME_PREFIX . "body_content_before");

if (is_home()) {
    $post_id = get_option('page_for_posts');
    $title = get_the_title($post_id);
} elseif ($post) {
    $post_id = $post->ID;
    $title = get_the_title($post_id);
}


$theme_default_page_width = AttireThemeEngine::NextGetOption('body_content_layout_type');
$site_width = AttireThemeEngine::NextGetOption('main_layout_type', 'container-fluid');

$meta = get_post_meta(get_the_ID(), 'attire_post_meta', true);

// theme default for page header
$page_header_active = AttireThemeEngine::NextGetOption('ph_active', true);

// check if the page has header enabled in `post meta`; this supersedes `ph_active`; for post type of `post` page header is always theme default
if (is_page() && isset($meta['page_header']) && (int)$meta['page_header'] === 1) {
    $page_header_active = true;
} elseif (is_page() && isset($meta['page_header']) && (int)$meta['page_header'] === 0) {
    $page_header_active = false;
}

$ph_show_on_fp = AttireThemeEngine::NextGetOption('ph_show_on_fp', false);
if (!is_front_page()) {
    $ph_show_on_fp = true;
}

$hide_site_header = !isset($meta['hide_site_header']) || (int)$meta['hide_site_header'] === 0 ? 0 : (int)$meta['hide_site_header'];

if ($post) {
    $meta = maybe_unserialize(get_post_meta($post_id, 'attire_post_meta', true));
}

$page_width = isset($meta['layout_page']) && $meta['layout_page'] !== 'default' && $meta['layout_page'] !== '' ? $meta['layout_page'] : $theme_default_page_width;


?>

<div id="mainframe" class="<?php echo esc_attr($site_width); ?>">
    <?php if (!$hide_site_header) { ?>
        <?php do_action(ATTIRE_THEME_PREFIX . "before_header"); ?>
        <div class="header-div site-branding">
            <?php AttireThemeEngine::HeaderStyle(); ?>
        </div>
        <?php do_action(ATTIRE_THEME_PREFIX . "after_header"); ?>
    <?php } ?>
    <!--        Page Header        -->
    <?php

    if ($page_header_active && $ph_show_on_fp && !is_404()) {
        do_action(ATTIRE_THEME_PREFIX . "before_page_header");
        ?>
        <div class="page_header_wrap">
            <?php AttireThemeEngine::PageHeaderStyle(); ?>
        </div>
        <?php
        do_action(ATTIRE_THEME_PREFIX . "after_page_header");
    } ?>
    <!--       END : Page Header        -->

    <div id="attire-content" class="attire-content <?php echo esc_attr($page_width); ?>">


