<?php
/**
 * Base: wpdmpro
 * Developer: shahjada
 * Team: W3 Eden
 * Date: 4/6/20 16:49
 */
if (!defined("ABSPATH")) die();
global $attire_options;
$meta = get_post_meta($post->ID, 'attire_post_meta', true);
$hide_site_header = isset($meta['hide_site_header']) ? (int)$meta['hide_site_header'] : 0;
$nav_header = isset($meta['nav_header']) ? (int)$meta['nav_header'] : -1;
$page_header = isset($meta['page_header']) ? (int)$meta['page_header'] : -1;
$hide_site_footer = isset($meta['hide_site_footer']) ? (int)$meta['hide_site_footer'] : 0;
wp_nonce_field('attire_page_header_nonce', 'attire_page_header_nonce');
include dirname(__DIR__).'/customizer-config.php';
?>
<div style='padding-top: 10px'>
    <div class="form-group">

        <div class='form-group'>
            <label for="nav_header" class="d-block"><?php _e('Top Menu Style', 'attire') ?></label>
            <select id="nav_header" name="attire_post_meta[nav_header]">
                <option value="" <?php selected("", $nav_header) ?>><?php _e('Theme Default', 'attire') ?></option>
                <option value="header-1" <?php selected(1, $nav_header) ?>><?php _e('Default', 'attire') ?></option>
                <option value="header-2" <?php selected(2, $nav_header) ?>><?php _e('Compact', 'attire') ?></option>
                <option value="header-3" <?php selected(3, $nav_header) ?>><?php _e('Narrow', 'attire') ?></option>
                <option value="header-4" <?php selected(4, $nav_header) ?>><?php _e('Centered', 'attire') ?></option>
                <option value="header-5" <?php selected(5, $nav_header) ?>><?php _e('Extended', 'attire') ?></option>
                <option value="header-6" <?php selected(6, $nav_header) ?>><?php _e('Transparent', 'attire') ?></option>
            </select>
        </div>

    </div>
    <div class='form-group'>
        <label class="d-block"><?php _e('Page Header', 'attire') ?></label>
        <select id="page_header" class="d-block" name="attire_post_meta[page_header]">
            <option value="-1" <?php selected(-1, $page_header) ?>><?php _e('Theme Default', 'attire') ?></option>
            <option value="1" <?php selected(1, $page_header) ?>><?php _e('Show', 'attire') ?></option>
            <option value="0" <?php selected(0, $page_header) ?>> <?php _e('Hide', 'attire') ?></option>
        </select>
    </div>
    <div class="form-group">
        <input type='hidden' name='attire_post_meta[hide_site_header]' value='0'>
        <input style='margin: -2px 3px 0 0' type='checkbox' <?php checked(1, $hide_site_header) ?> name='attire_post_meta[hide_site_header]' value='1' id='htm'>
        <label style='font-weight: normal' for='htm'><?php echo __("Hide Top Menu", "attire"); ?></label>
    </div>
    <div class="form-group">
        <input type='hidden' name='attire_post_meta[hide_site_footer]' value='0'>
        <input style='margin: -2px 3px 0 0' type='checkbox' <?php checked(1, $hide_site_footer) ?> name='attire_post_meta[hide_site_footer]' value='1' id='htm1'>
        <label style='font-weight: normal' for='htm1'><?php echo __("Hide Site Footer", "attire"); ?></label>
    </div>
</div>
<style>
    .d-block{ display: block; float: none; margin-bottom: 5px; }
</style>


