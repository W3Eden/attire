<?php

if (!defined('ABSPATH')) {
    exit;
}

global $__attire;

class Attire
{

    public $attire_defaults;
    public $theme_options;

    function __construct()
    {
        $this->RegisterNavMenus();
        $this->Filters();
        $this->Actions();
        $this->themeOptions();
        add_action('after_setup_theme', array($this, 'ThemeSetup'));
    }

    function themeOptions()
    {
        $theme_mod = get_option('attire_options');
        $defaults = $this->getAttireDefaults();
        if (!is_array($theme_mod)) $theme_mod = [];
        foreach ($defaults as $key => $value) {
            if (!isset($theme_mod[$key]))
                $theme_mod[$key] = $value;
        }
        $this->theme_options = $theme_mod;
        return $theme_mod;
    }

    /**
     * Usage: Load language file
     */
    function LoadTextDomain()
    {
        load_theme_textdomain('attire', get_template_directory() . '/languages');
    }

    function Filters()
    {

    }

    function Actions()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueueThemeStyles'), 1);
        add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'));
    }

    function enqueueThemeStyles()
    {
        wp_register_style('font-awesome', ATTIRE_TEMPLATE_URL . '/fonts/fontawesome/css/all.min.css');
        wp_enqueue_style('font-awesome');

        wp_register_style('attire-responsive', ATTIRE_TEMPLATE_URL . '/css/responsive.min.css');
        wp_enqueue_style('attire-responsive');

        wp_register_style('bootstrap', ATTIRE_TEMPLATE_URL . '/bootstrap/css/bootstrap.min.css');
        wp_enqueue_style('bootstrap');

        wp_register_style('attire-main', get_stylesheet_uri(), array('bootstrap', 'attire-responsive'));
        wp_enqueue_style('attire-main');

        wp_register_style('attire-woocommerce', ATTIRE_TEMPLATE_URL . '/css/woocommerce.min.css');
        if (class_exists('WooCommerce'))
            wp_enqueue_style('attire-woocommerce');

        wp_register_style('attire', ATTIRE_TEMPLATE_URL . '/css/attire.min.css');
        wp_enqueue_style('attire');
    }


    /**
     * @usage Load all necessary scripts & styles
     */
    function enqueueScripts()
    {
        $theme_mod = self::themeOptions();

        // Font Options ( From Customizer Typography Options )
        $family[] = sanitize_text_field($theme_mod['heading_font']);
        $family[] = sanitize_text_field($theme_mod['body_font']);
        $family[] = sanitize_text_field($theme_mod['button_font']);
        $family[] = sanitize_text_field($theme_mod['widget_title_font']);
        $family[] = sanitize_text_field($theme_mod['widget_content_font']);
        $family[] = sanitize_text_field($theme_mod['menu_top_font']);
        $family[] = sanitize_text_field($theme_mod['menu_dropdown_font']);

        $family = array_unique($family);

//		echo '<pre>'.json_encode($theme_mod,JSON_PRETTY_PRINT).'</pre>';

        $cssimport = '//fonts.googleapis.com/css?family=' . implode("|", $family);
        $cssimport = str_replace('||', '|', $cssimport);

        wp_register_style('attire-google-fonts', $cssimport, array(), null);
        wp_enqueue_style('attire-google-fonts');

        wp_enqueue_script('jquery');

        wp_register_script('bootstrap', ATTIRE_TEMPLATE_URL . '/bootstrap/js/bootstrap.bundle.js', array(
            'jquery',
        ), null, true);
        wp_enqueue_script('bootstrap');

        wp_register_script('attire-site', ATTIRE_TEMPLATE_URL . '/js/site.js', array(
            'jquery'
        ), null, true);
        wp_enqueue_script('attire-site');

        wp_register_script('comment-reply', '', array(), null, true);
        wp_enqueue_script('comment-reply');

        wp_localize_script('attire-site', 'sitejs_local_obj', array(
            'home_url' => esc_url(home_url('/'))
        ));
    }

    function sanitize_hex_color_front($color)
    {
        if ('' === $color) {
            return '';
        }

        // 3 or 6 hex digits, or the empty string.
        if (preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color)) {
            return $color;
        }
    }


    /**
     * @usage: Register nav menus
     */
    function RegisterNavMenus()
    {
        register_nav_menus(array(
            'primary' => __('Top Menu', 'attire')
        ));
        register_nav_menus(array(
            'footer_menu' => __('Footer Menu', 'attire')
        ));
    }


    /**
     * @usage Post Comments
     *
     * @param $comment
     * @param $args
     * @param $depth
     */
    public static function Comment($comment, $args, $depth)
    {

        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                ?>
                <li class="post pingback">
                <p>
                    Pingback: <?php comment_author_link(); ?><?php edit_comment_link(esc_html__('Edit', 'attire'), '<span class="edit-link">', '</span>'); ?></p>
                <?php
                break;
            default :
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
                <div class="card">

                    <div id="comment-<?php comment_ID(); ?>" class="card-body">

                        <div class="media">
                            <img class="align-self-start mr-3 circle pull-left"
                                 src="<?php echo esc_url(get_avatar_url($comment, array('size' => '64'))); ?>"
                                 alt="<?php esc_attr_e('Commenter\'s Avatar', 'attire'); ?>">
                            <!-- end .avatar-box -->
                            <div class="media-body">
                                <b><?php printf('<span class="fn">%s</span>', get_comment_author_link()) ?></b>
                                <small class="text-muted">
                                    <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php printf('&mdash; %1$s ' . esc_attr__('at', 'attire') . ' %2$s', esc_html(get_comment_date()), esc_html(get_comment_time())); ?></a>
                                </small>

                                <?php comment_text() ?> <!-- end comment-content-->

                                <div class="well">
                                    <?php if ($comment->comment_approved == '0') : ?>
                                        <em class="moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'attire') ?></em>
                                    <?php endif; ?>
                                    <div class="text-muted">
                                        <small><?php edit_comment_link('<i class="fas fa-pencil-alt"></i> ' . esc_html__('Edit', 'attire'), ' '); ?></small>
                                        <small><?php comment_reply_link(array_merge($args, array(
                                                'reply_text' => '&nbsp;<i class="fas fa-sync"></i> ' . esc_html__('Reply', 'attire'),
                                                'depth' => $depth,
                                                'max_depth' => $args['max_depth']
                                            ))) ?></small>
                                    </div>
                                </div>

                            </div> <!-- end comment-wrap-->

                        </div>
                    </div> <!-- end comment-body-->

                </div> <!-- end comment-body-->


                <?php
                break;
        endswitch;
    }


    /**
     * usage: Setup Theme
     */
    function ThemeSetup()
    {
        $this->LoadTextDomain();
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('automatic-feed-links');
        add_theme_support('custom-background');

        add_post_type_support('page', 'excerpt');

        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        $args = array(
            'default-image' => '',
            'default-text-color' => '000',
            'width' => 1000,
            'height' => 250,
            'flex-width' => true,
            'flex-height' => true,
        );
        add_theme_support('custom-header', $args);
        add_theme_support('custom-logo');

        add_image_size('attire-card-image', 600, 400, array('center', 'top'));

        if (!get_option('attire_options')) {
            add_option('attire_options', $this->getAttireDefaults());
        }
    }


    public function getAttireDefaults()
    {
        $this->attire_defaults = array(
            'footer_widget_number' => '3',
            'copyright_info' => '&copy;' . esc_attr__('Copyright ', 'attire') . date('Y') . '.',

            'layout_front_page' => 'no-sidebar',
            'front_page_ls' => 'left',
            'front_page_ls_width' => '3',
            'front_page_rs' => 'right',
            'front_page_rs_width' => '3',

            'layout_default_post' => 'right-sidebar-1',
            'default_post_ls' => 'left',
            'default_post_ls_width' => '3',
            'default_post_rs' => 'right',
            'default_post_rs_width' => '3',

            'layout_default_page' => 'no-sidebar',
            'default_page_ls' => 'left',
            'default_page_ls_width' => '3',
            'default_page_rs' => 'right',
            'default_page_rs_width' => '3',

            'layout_archive_page' => 'no-sidebar',
            'archive_page_ls' => 'left',
            'archive_page_ls_width' => '3',
            'archive_page_rs' => 'right',
            'archive_page_rs_width' => '3',

            'nav_header' => 'header-1',
            'footer_style' => 'footer4',

            'main_layout_type' => 'container-fluid',
            'main_layout_width' => '1300',
            'header_content_layout_type' => 'container',
            'body_content_layout_type' => 'container',
            'footer_widget_content_layout_type' => 'container',
            'footer_content_layout_type' => 'container',

            'heading_font' => 'Rubik:400,400i,500,700',
            'heading_font_size_desktop' => '25',
            'heading_font_size_tablet' => '25',
            'heading_font_size_mobile' => '25',
            'heading2_font_size_desktop' => '21',
            'heading2_font_size_tablet' => '21',
            'heading2_font_size_mobile' => '21',
            'heading3_font_size_desktop' => '17',
            'heading3_font_size_tablet' => '17',
            'heading3_font_size_mobile' => '17',
            'heading4_font_size_desktop' => '14',
            'heading4_font_size_tablet' => '14',
            'heading4_font_size_mobile' => '14',
            'heading_font_weight' => '700',

            'body_font' => 'Rubik:400,400i,500,700',
            'body_font_size_desktop' => '14',
            'body_font_size_tablet' => '14',
            'body_font_size_mobile' => '14',
            'body_font_weight' => '400',

            'button_font' => 'Sen:400,700,800',
            'button_font_weight' => '700',

            'widget_title_font' => 'Rubik:400,400i,500,700',
            'widget_title_font_size' => '14',
            'widget_title_font_weight' => '500',

            'widget_content_font' => 'Rubik:400,400i,500,700',
            'widget_content_font_size' => '13',
            'widget_content_font_weight' => '400',

            'menu_top_font' => 'Rubik:400,400i,500,700',
            'menu_top_font_size' => '13',
            'menu_top_font_weight' => '400',

            'menu_dropdown_font' => 'Rubik:400,400i,500,700',
            'menu_dropdown_font_size' => '13',
            'menu_dropdown_font_weight' => '400',

            'site_header_bg_color_left' => '#fafafa',
            'site_header_bg_color_right' => '#fafafa',
            'site_header_bg_grad_angle' => '45',
            'site_title_text_color' => '#444444',
            'site_description_text_color' => '#666666',

            'site_footer_bg_color' => '#435ec4',
            'site_footer_title_text_color' => '#ffffff',

            'menu_top_font_color' => '#ffffff',
            'main_nav_bg' => '#435ec4',
            'menuhbg_color' => '#ffffff',
            'menuht_color' => '#000000',
            'menu_dropdown_bg_color' => '#ffffff',
            'menu_dropdown_font_color' => '#000000',
            'menu_dropdown_hover_bg' => '#435ec4',
            'menu_dropdown_hover_font_color' => '#ffffff',

            'footer_nav_top_font_color' => '#a2b4f9',
            'footer_nav_bg' => '#435ec4',
            'footer_nav_hbg' => '#ffffff',
            'footer_nav_ht_color' => '#ffffff',
            'footer_nav_dropdown_font_color' => '#ffffff',
            'footer_nav_dropdown_hover_bg' => '#435ec4',
            'footer_nav_dropdown_hover_font_color' => '#ffffff',

            'body_bg_color' => '#fafafa',
            'a_color' => '#435ec4',
            'ah_color' => '#777777',
            'header_color' => '#333333',
            'body_color' => '#444444',

            'widget_title_font_color' => '#ffffff',
            'widget_content_font_color' => '#444444',
            'widget_bg_color' => '#ffffff',

            'footer_widget_title_font_color' => '#000000',
            'footer_widget_content_font_color' => '#000000',
            'footer_widget_bg_color' => '#D4D4D6',

            'attire_archive_page_post_view' => 'excerpt',
            'attire_read_more_text' => 'read more...',
            'attire_single_post_post_navigation' => 'show',
            'attire_single_post_meta_position' => 'after-title',

            'container_width' => '1100',

            'copyright_info_visibility' => 'show',
            'attire_search_form_visibility' => 'show',
            'attire_back_to_top_visibility' => 'show',
            'attire_nav_behavior' => 'sticky',

            'site_logo_height' => '32',
            'site_logo_footer_height' => '32'
        );

        return $this->attire_defaults;
    }

    static function comment_form($args = array(), $post_id = null)
    {
        if (null === $post_id) {
            $post_id = get_the_ID();
        }

        // Exit the function when comments for the post are closed.
        if (!comments_open($post_id)) {
            /**
             * Fires after the comment form if comments are closed.
             *
             * @since 3.0.0
             */
            do_action('comment_form_comments_closed');

            return;
        }

        $commenter = wp_get_current_commenter();
        $user = wp_get_current_user();
        $user_identity = $user->exists() ? $user->display_name : '';

        $args = wp_parse_args($args);
        if (!isset($args['format'])) {
            $args['format'] = current_theme_supports('html5', 'comment-form') ? 'html5' : 'xhtml';
        }

        $req = get_option('require_name_email');
        $html_req = ($req ? " required='required'" : '');
        $html5 = 'html5' === $args['format'];

        $fields = array(
            'author' => sprintf(
                '<p class="comment-form-author">%s %s</p>',
                sprintf(
                    '<label for="author">%s%s</label>',
                    __('Name'),
                    ($req ? ' <span class="required">*</span>' : '')
                ),
                sprintf(
                    '<input id="author" name="author" type="text" value="%s" size="30" maxlength="245"%s />',
                    esc_attr($commenter['comment_author']),
                    $html_req
                )
            ),
            'email' => sprintf(
                '<p class="comment-form-email">%s %s</p>',
                sprintf(
                    '<label for="email">%s%s</label>',
                    __('Email'),
                    ($req ? ' <span class="required">*</span>' : '')
                ),
                sprintf(
                    '<input id="email" name="email" %s value="%s" size="30" maxlength="100" aria-describedby="email-notes"%s />',
                    ($html5 ? 'type="email"' : 'type="text"'),
                    esc_attr($commenter['comment_author_email']),
                    $html_req
                )
            ),
            'url' => sprintf(
                '<p class="comment-form-url">%s %s</p>',
                sprintf(
                    '<label for="url">%s</label>',
                    __('Website')
                ),
                sprintf(
                    '<input id="url" name="url" %s value="%s" size="30" maxlength="200" />',
                    ($html5 ? 'type="url"' : 'type="text"'),
                    esc_attr($commenter['comment_author_url'])
                )
            ),
        );

        if (has_action('set_comment_cookies', 'wp_set_comment_cookies') && get_option('show_comments_cookies_opt_in')) {
            $consent = empty($commenter['comment_author_email']) ? '' : ' checked="checked"';

            $fields['cookies'] = sprintf(
                '<p class="comment-form-cookies-consent">%s %s</p>',
                sprintf(
                    '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />',
                    $consent
                ),
                sprintf(
                    '<label for="wp-comment-cookies-consent">%s</label>',
                    __('Save my name, email, and website in this browser for the next time I comment.')
                )
            );

            // Ensure that the passed fields include cookies consent.
            if (isset($args['fields']) && !isset($args['fields']['cookies'])) {
                $args['fields']['cookies'] = $fields['cookies'];
            }
        }

        $required_text = sprintf(
        /* translators: %s: Asterisk symbol (*). */
            ' ' . __('Required fields are marked %s'),
            '<span class="required">*</span>'
        );

        /**
         * Filters the default comment form fields.
         *
         * @param string[] $fields Array of the default comment fields.
         * @since 3.0.0
         *
         */
        $fields = apply_filters('comment_form_default_fields', $fields);

        $defaults = array(
            'fields' => $fields,
            'comment_field' => sprintf(
                '<p class="comment-form-comment">%s %s</p>',
                sprintf(
                    '<label for="comment">%s</label>',
                    _x('Comment', 'noun')
                ),
                '<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>'
            ),
            'must_log_in' => sprintf(
                '<p class="must-log-in">%s</p>',
                sprintf(
                /* translators: %s: Login URL. */
                    __('You must be <a href="%s">logged in</a> to post a comment.'),
                    /** This filter is documented in wp-includes/link-template.php */
                    wp_login_url(apply_filters('the_permalink', get_permalink($post_id), $post_id))
                )
            ),
            'logged_in_as' => sprintf(
                '<p class="logged-in-as">%s</p>',
                sprintf(
                /* translators: 1: Edit user link, 2: Accessibility text, 3: User name, 4: Logout URL. */
                    __('<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>'),
                    get_edit_user_link(),
                    /* translators: %s: User name. */
                    esc_attr(sprintf(__('Logged in as %s. Edit your profile.'), $user_identity)),
                    $user_identity,
                    /** This filter is documented in wp-includes/link-template.php */
                    wp_logout_url(apply_filters('the_permalink', get_permalink($post_id), $post_id))
                )
            ),
            'comment_notes_before' => sprintf(
                '<p class="comment-notes">%s%s</p>',
                sprintf(
                    '<span id="email-notes">%s</span>',
                    __('Your email address will not be published.')
                ),
                ($req ? $required_text : '')
            ),
            'comment_notes_after' => '',
            'action' => site_url('/wp-comments-post.php'),
            'id_form' => 'commentform',
            'id_submit' => 'submit',
            'class_form' => 'comment-form',
            'class_submit' => 'btn btn-primary btn-lg',
            'name_submit' => 'submit',
            'title_reply' => __('Leave a Reply'),
            /* translators: %s: Author of the comment being replied to. */
            'title_reply_to' => __('Leave a Reply to %s'),
            'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
            'title_reply_after' => '</h3>',
            'cancel_reply_before' => ' <small>',
            'cancel_reply_after' => '</small>',
            'cancel_reply_link' => __('Cancel reply'),
            'label_submit' => __('Post Comment'),
            'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
            'submit_field' => '%1$s %2$s',
            'format' => 'xhtml',
        );

        /**
         * Filters the comment form default arguments.
         *
         * Use {@see 'comment_form_default_fields'} to filter the comment fields.
         *
         * @param array $defaults The default comment form arguments.
         * @since 3.0.0
         *
         */
        $args = wp_parse_args($args, apply_filters('comment_form_defaults', $defaults));

        // Ensure that the filtered args contain all required default values.
        $args = array_merge($defaults, $args);

        // Remove `aria-describedby` from the email field if there's no associated description.
        if (isset($args['fields']['email']) && false === strpos($args['comment_notes_before'], 'id="email-notes"')) {
            $args['fields']['email'] = str_replace(
                ' aria-describedby="email-notes"',
                '',
                $args['fields']['email']
            );
        }

        /**
         * Fires before the comment form.
         *
         * @since 3.0.0
         */
        do_action('comment_form_before');
        ?>
        <div id="respond" class="comment-respond">
            <?php
            echo $args['title_reply_before'];

            comment_form_title($args['title_reply'], $args['title_reply_to']);

            echo $args['cancel_reply_before'];

            cancel_comment_reply_link($args['cancel_reply_link']);

            echo $args['cancel_reply_after'];

            echo $args['title_reply_after'];

            if (get_option('comment_registration') && !is_user_logged_in()) :

                echo $args['must_log_in'];
                /**
                 * Fires after the HTML-formatted 'must log in after' message in the comment form.
                 *
                 * @since 3.0.0
                 */
                do_action('comment_form_must_log_in_after');

            else :

                printf(
                    '<form action="%s" method="post" id="%s" class="%s"%s>',
                    esc_url($args['action']),
                    esc_attr($args['id_form']),
                    esc_attr($args['class_form']),
                    ($html5 ? ' novalidate' : '')
                );

                /**
                 * Fires at the top of the comment form, inside the form tag.
                 *
                 * @since 3.0.0
                 */
                do_action('comment_form_top');

                if (is_user_logged_in()) :

                    /**
                     * Filters the 'logged in' message for the comment form for display.
                     *
                     * @param string $args_logged_in The logged-in-as HTML-formatted message.
                     * @param array $commenter An array containing the comment author's
                     *                               username, email, and URL.
                     * @param string $user_identity If the commenter is a registered user,
                     *                               the display name, blank otherwise.
                     * @since 3.0.0
                     *
                     */
                    echo apply_filters('comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity);

                    /**
                     * Fires after the is_user_logged_in() check in the comment form.
                     *
                     * @param array $commenter An array containing the comment author's
                     *                              username, email, and URL.
                     * @param string $user_identity If the commenter is a registered user,
                     *                              the display name, blank otherwise.
                     * @since 3.0.0
                     *
                     */
                    do_action('comment_form_logged_in_after', $commenter, $user_identity);

                else :

                    echo $args['comment_notes_before'];

                endif;

                // Prepare an array of all fields, including the textarea.
                $comment_fields = array('comment' => $args['comment_field']) + (array)$args['fields'];

                /**
                 * Filters the comment form fields, including the textarea.
                 *
                 * @param array $comment_fields The comment fields.
                 * @since 4.4.0
                 *
                 */
                $comment_fields = apply_filters('comment_form_fields', $comment_fields);

                // Get an array of field names, excluding the textarea.
                $comment_field_keys = array_diff(array_keys($comment_fields), array('comment'));

                // Get the first and the last field name, excluding the textarea.
                $first_field = reset($comment_field_keys);
                $last_field = end($comment_field_keys);
                echo "<div class='card'><div class='card-body p-0'><div class='row comment-form-row no-gutters'>";
                foreach ($comment_fields as $name => $field) {


                    if ('comment' === $name) {
                        echo "<div class='col-md-12 border-bottom'>";
                        /**
                         * Filters the content of the comment textarea field for display.
                         *
                         * @param string $args_comment_field The content of the comment textarea field.
                         * @since 3.0.0
                         *
                         */
                        echo apply_filters('comment_form_field_comment', $field);

                        echo $args['comment_notes_after'];
                        echo "</div>";

                    } elseif (!is_user_logged_in()) {
                        if ($name === 'cookies')
                            echo "<div class='col-md-12 field-{$name}'>";
                        else
                            echo "<div class='col-md-4 field-{$name}'>";
                        if ($first_field === $name) {
                            /**
                             * Fires before the comment fields in the comment form, excluding the textarea.
                             *
                             * @since 3.0.0
                             */
                            do_action('comment_form_before_fields');
                        }

                        /**
                         * Filters a comment form field for display.
                         *
                         * The dynamic portion of the filter hook, `$name`, refers to the name
                         * of the comment form field. Such as 'author', 'email', or 'url'.
                         *
                         * @param string $field The HTML-formatted output of the comment form field.
                         * @since 3.0.0
                         *
                         */
                        echo apply_filters("comment_form_field_{$name}", $field) . "\n";

                        if ($last_field === $name) {
                            /**
                             * Fires after the comment fields in the comment form, excluding the textarea.
                             *
                             * @since 3.0.0
                             */
                            do_action('comment_form_after_fields');
                        }
                        echo "</div>";
                    }


                }
                echo "</div></div><div class='card-footer text-right'>";

                $submit_button = sprintf(
                    $args['submit_button'],
                    esc_attr($args['name_submit']),
                    esc_attr($args['id_submit']),
                    esc_attr($args['class_submit']),
                    esc_attr($args['label_submit'])
                );

                /**
                 * Filters the submit button for the comment form to display.
                 *
                 * @param string $submit_button HTML markup for the submit button.
                 * @param array $args Arguments passed to comment_form().
                 * @since 4.2.0
                 *
                 */
                $submit_button = apply_filters('comment_form_submit_button', $submit_button, $args);

                $submit_field = sprintf(
                    $args['submit_field'],
                    $submit_button,
                    get_comment_id_fields($post_id)
                );

                /**
                 * Filters the submit field for the comment form to display.
                 *
                 * The submit field includes the submit button, hidden fields for the
                 * comment form, and any wrapper markup.
                 *
                 * @param string $submit_field HTML markup for the submit field.
                 * @param array $args Arguments passed to comment_form().
                 * @since 4.2.0
                 *
                 */
                echo apply_filters('comment_form_submit_field', $submit_field, $args);
                echo "</div></div>";
                /**
                 * Fires at the bottom of the comment form, inside the closing form tag.
                 *
                 * @param int $post_id The post ID.
                 * @since 1.5.0
                 *
                 */
                do_action('comment_form', $post_id);

                echo '</form>';

            endif;
            ?>
        </div><!-- #respond -->
        <?php

        /**
         * Fires after the comment form.
         *
         * @since 3.0.0
         */
        do_action('comment_form_after');
    }


    /**
     * @param $var
     * @param $index
     * @param array $params
     * @return array|bool|float|int|mixed|string|string[]|null
     */

    function valueOf($var, $index, $params = [])
    {
        $index = explode("/", $index);
        $default = is_string($params) ? $params : '';
        $default = is_array($params) && isset($params['default']) ? $params['default'] : $default;
        if (count($index) > 1) {
            $val = $var;
            foreach ($index as $key) {
                $val = is_array($val) && isset($val[$key]) ? $val[$key] : '__not__set__';
                if ($val === '__not__set__') return $default;
            }
        } else
            $val = isset($var[$index[0]]) ? $var[$index[0]] : $default;

        if (is_array($params) && isset($params['validate'])) {
            if (!is_array($val))
                $val = $this->sanitizeVar($val, $params['validate']);
            else
                $val = $this->sanitizeArray($val, $params['validate']);
        }

        return $val;
    }

    /**
     * @usage Validate and sanitize input data
     * @param $var
     * @param array $params
     * @return int|null|string
     */
    function queryVar($var, $params = array())
    {
        $_var = explode("/", $var);
        if (count($_var) > 1) {
            $val = $_REQUEST;
            foreach ($_var as $key) {
                $val = is_array($val) && isset($val[$key]) ? $val[$key] : false;
            }
        } else
            $val = isset($_REQUEST[$var]) ? $_REQUEST[$var] : (isset($params['default']) ? $params['default'] : null);
        $validate = is_string($params) ? $params : '';
        $validate = is_array($params) && isset($params['validate']) ? $params['validate'] : $validate;

        if (!is_array($val))
            $val = $this->sanitizeVar($val, $validate);
        else
            $val = $this->sanitizeArray($val, $validate);

        return $val;
    }

    /**
     * Sanitize an array or any single value
     * @param $array
     * @return mixed
     */
    function sanitizeArray($array, $sanitize = 'kses')
    {
        if (!is_array($array)) return esc_attr($array);
        foreach ($array as $key => &$value) {
            $validate = is_array($sanitize) && isset($sanitize[$key]) ? $sanitize[$key] : $sanitize;
            if (is_array($value))
                $this->sanitizeArray($value, $validate);
            else {
                $value = $this->sanitizeVar($value, $validate);
            }
            $array[$key] = &$value;
        }
        return $array;
    }

    /**
     * Sanitize any single value
     * @param $value
     * @return string
     */
    function sanitizeVar($value, $sanitize = 'kses')
    {
        if (is_array($value))
            return $this->sanitizeArray($value, $sanitize);
        else {
            switch ($sanitize) {
                case 'int':
                case 'num':
                    return (int)$value;
                    break;
                case 'double':
                case 'float':
                    return (double)($value);
                    break;
                case 'txt':
                case 'str':
                    $value = esc_attr($value);
                    break;
                case 'kses':
                    $allowedtags = wp_kses_allowed_html();
                    $allowedtags['div'] = array('class' => true);
                    $allowedtags['strong'] = array('class' => true);
                    $allowedtags['b'] = array('class' => true);
                    $allowedtags['i'] = array('class' => true);
                    $allowedtags['a'] = array('class' => true, 'href' => true);
                    $value = wp_kses($value, $allowedtags);
                    break;
                case 'serverpath':
                    $value = realpath($value);
                    $value = str_replace("\\", "/", $value);
                    break;
                case 'txts':
                    $value = sanitize_textarea_field($value);
                    break;
                case 'url':
                    $value = esc_url($value);
                    break;
                case 'filename':
                    $value = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '_', $value);
                    $value = mb_ereg_replace("([\.]+)", '_', $value);
                    break;
                case 'html':

                    break;
                default:
                    $value = esc_sql(esc_attr($value));
                    break;
            }
        }
        return $value;
    }


}

$__attire = new Attire();

function WPATTIRE()
{
    global $__attire;
    return $__attire;
}
