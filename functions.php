<?php
if (!defined('ABSPATH')) {
    exit;
}

if (version_compare(PHP_VERSION, '5.2.0', '<')) {

    add_action('after_switch_theme', 'AttireCheckPhpVersionBeforeActivation', 10, 2);
    add_action('load-customize.php', 'AttireBlockCustomizer');
    add_action('template_redirect', 'AttireBlockPreview');

    return;
}

function AttireCheckPhpVersionBeforeActivation($oldtheme_name, $oldtheme)
{


    // Info message: Theme not activated
    add_action('admin_notices', 'AttireNotActivatedAdminNotice');


    // Switch back to previous theme
    switch_theme($oldtheme->stylesheet);

    unset($_GET['activated']);


}

function AttireBlockCustomizer()
{


    wp_die(esc_html__('Attire requires PHP version 5.2 or later. Please upgrade your php version for better performance/security.', 'attire'), '', array(
        'back_link' => true,
    ));
}


function AttireBlockPreview()
{

    if (isset($_GET['preview'])) {
        wp_die(esc_html__('Attire requires PHP version 5.2 or later. Please upgrade your php version for better performance/security.', 'attire'));
    }
}

function AttireNotActivatedAdminNotice()
{
    ?>

    <div class="notice notice-error is-dismissible">
        <p>
            <strong><?php esc_html_e('Switched back to previous theme. Attire requires PHP version 5.2 or later. Please upgrade your php version for better performance/security.', 'attire'); ?></strong>
        </p>
        <button type="button" class="notice-dismiss">
            <span class="screen-reader-text"><?php esc_html_e('Dismiss this notice.', 'attire'); ?></span>
        </button>
    </div>

    <?php
}


define('ATTIRE_THEME_PREFIX', 'attire_');
define("ATTIRE_TEMPLATE_DIR", get_template_directory());
define("ATTIRE_THEME_URL", get_stylesheet_directory_uri());
define("ATTIRE_TEMPLATE_URL", get_template_directory_uri());


require_once(ATTIRE_TEMPLATE_DIR . "/admin/ThemeEngine.class.php");
require_once(ATTIRE_TEMPLATE_DIR . "/libs/Framework.class.php");
require_once(ATTIRE_TEMPLATE_DIR . "/libs/Attire.class.php");
require_once(ATTIRE_TEMPLATE_DIR . "/libs/MetaBoxes.class.php");
require_once(ATTIRE_TEMPLATE_DIR . "/libs/StructuredData.class.php");
require_once(ATTIRE_TEMPLATE_DIR . '/admin/customizer.php');


class AttireBase
{

    function __construct()
    {
        $this->actions();
        $this->filters();

    }


    function actions()
    {
        //delete_option( 'attire_options' );

    }

    function filters()
    {
        add_filter('attire_sidebar_styles', array($this, 'SidebarStyles'));
        add_filter('excerpt_more', array($this, 'attire_excerpt_more'));
        add_filter('excerpt_length', array($this, 'attire_excerpt_length'), 999999);
        add_filter('the_content', array($this, 'the_content'), 999999);
    }

    function _remove_script_version($src)
    {
        if (!strpos($src, 'googleapis')) {
            $parts = explode('?', $src);

            return $parts[0];
        }

        return $src;
    }

    function SidebarStyles($styles)
    {
        $styles['boxed-panel'] = array(
            'style_name' => __('Boxed Panel', 'attire'),
            'before_widget' => '<div class="widget-boxed-panel">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-boxed-panel-heading widget-title">',
            'after_title' => '</h3>'
        );

        return $styles;
    }

    function attire_excerpt_length($length)
    {
        return 30;
    }

    function attire_excerpt_more($more)
    {

        if (is_admin()) {
            return $more;
        }

        global $post;
        $more = AttireThemeEngine::NextGetOption('attire_read_more_text', __('read more...', 'attire'));

        return '. <a class="read-more-link" href="' . esc_url(get_permalink($post->ID)) . '">' . wp_kses_post($more) . '</a>';
    }

    function the_content($content)
    {
        $content = str_replace(["<table>"], ["<table class='table'>"], $content);
        return $content;
    }

    static function breadcrumb()
    {

        // Settings
        $separator = '<i class="fas fa-angle-right"></i>';
        $breadcrums_id = 'breadcrumbs';
        $breadcrums_class = 'breadcrumbs';
        $home_title = 'Home';

        // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
        $custom_taxonomy = 'product_cat';

        // Get the query & post information
        global $post, $wp_query;

        // Do not display on the homepage
        if (!is_front_page()) {

            // Build the breadcrums
            echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

            // Home page
            echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
            echo '<li class="separator separator-home"> ' . $separator . ' </li>';

            if (is_archive() && !is_tax() && !is_category() && !is_tag()) {
                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title('', false) . '</strong></li>';

            } else if (is_archive() && is_tax() && !is_category() && !is_tag()) {

                // If post is a custom post type
                $post_type = get_post_type();

                // If it is a custom post type display name and link
                if ($post_type != 'post') {

                    $post_type_object = get_post_type_object($post_type);
                    $post_type_archive = get_post_type_archive_link($post_type);
                    if ($post_type_object) {
                        echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                        echo '<li class="separator"> ' . $separator . ' </li>';
                    }

                }

                $custom_tax_name = get_queried_object()->name;
                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

            } else if (is_single()) {

                // If post is a custom post type
                $post_type = get_post_type();

                // If it is a custom post type display name and link
                if ($post_type != 'post') {

                    $post_type_object = get_post_type_object($post_type);
                    $post_type_archive = get_post_type_archive_link($post_type);

                    echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                    echo '<li class="separator"> ' . $separator . ' </li>';

                }

                // Get post category info
                $category = get_the_category();

                if (!empty($category)) {

                    // Get last category post is in
                    $_category = array_values($category);
                    $last_category = end($_category);

                    // Get parent any categories and create array
                    $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','), ',');
                    $cat_parents = explode(',', $get_cat_parents);

                    // Loop through parent categories and store in variable $cat_display
                    $cat_display = '';
                    foreach ($cat_parents as $parents) {
                        $cat_display .= '<li class="item-cat">' . $parents . '</li>';
                        $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                    }

                }

                // If it's a custom post type within a custom taxonomy
                $taxonomy_exists = taxonomy_exists($custom_taxonomy);
                if (empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                    $taxonomy_terms = get_the_terms($post->ID, $custom_taxonomy);
                    $cat_id = $taxonomy_terms[0]->term_id;
                    $cat_nicename = $taxonomy_terms[0]->slug;
                    $cat_link = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                    $cat_name = $taxonomy_terms[0]->name;

                }

                // Check if the post is in a category
                if (!empty($last_category)) {
                    echo $cat_display;
                    echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

                    // Else if post is in a custom taxonomy
                } else if (!empty($cat_id)) {

                    echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                    echo '<li class="separator"> ' . $separator . ' </li>';
                    echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

                } else {

                    echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

                }

            } else if (is_category()) {

                // Category page
                echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';

            } else if (is_page()) {

                // Standard page
                if ($post->post_parent) {

                    // If child page, get parents
                    $anc = get_post_ancestors($post->ID);

                    // Get parents in the right order
                    $anc = array_reverse($anc);

                    // Parent page loop
                    if (!isset($parents)) $parents = null;
                    foreach ($anc as $ancestor) {
                        $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                        $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                    }

                    // Display parent pages
                    echo $parents;

                    // Current page
                    echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

                } else {

                    // Just display current page if not parents
                    echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

                }

            } else if (is_tag()) {

                // Tag page

                // Get tag information
                $term_id = get_query_var('tag_id');
                $taxonomy = 'post_tag';
                $args = 'include=' . $term_id;
                $terms = get_terms($taxonomy, $args);
                $get_term_id = $terms[0]->term_id;
                $get_term_slug = $terms[0]->slug;
                $get_term_name = $terms[0]->name;

                // Display the tag name
                echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

            } elseif (is_day()) {

                // Day archive

                // Year link
                echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
                echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

                // Month link
                echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
                echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

                // Day display
                echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

            } else if (is_month()) {

                // Month Archive

                // Year link
                echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
                echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

                // Month display
                echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

            } else if (is_year()) {

                // Display year archive
                echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

            } else if (is_author()) {

                // Auhor archive

                // Get the author information
                global $author;
                $userdata = get_userdata($author);

                // Display author name
                echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

            } else if (get_query_var('paged')) {

                // Paginated archives
                echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">' . __('Page', 'attire') . ' ' . get_query_var('paged') . '</strong></li>';

            } else if (is_search()) {

                // Search results page
                echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

            } elseif (is_404()) {

                // 404 page
                echo '<li>' . 'Error 404' . '</li>';
            }

            echo '</ul>';

        }
    }
}

new AttireBase();



