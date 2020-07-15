<?php
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Classes to create a custom controls
 */
if (class_exists('WP_Customize_Control')) {

    class Attire_Customize_Range_Control extends WP_Customize_Control
    {
        public $type = 'custom_range';

        public function render_content()
        {
            ?>
            <label>
                <?php if (!empty($this->label)) : ?>
                    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php endif; ?>
                <table class="wp_custom_range_table">
                    <tr>
                        <td style="width:80%;">
                            <input data-input-type="range" type="range" <?php $this->input_attrs(); ?>
                                   value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
                        </td>
                        <td style="width: 20%">
                            <input class="cs-range-value"
                                   value="<?php echo esc_attr($this->value()); ?>" type="number"/>
                        </td>
                    </tr>
                </table>
            </label>
            <?php
        }
    }

    class Attire_Layout_Picker_Custom_Control extends WP_Customize_Control
    {

        public $type = 'layout';

        public function render_content()
        {
            $imageDir = '/images/layouts/';
            $imguri = get_template_directory_uri() . $imageDir;
            ?>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <div class="attire-sb-layout">
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>"
                           value="no-sidebar"/>
                    <img src="<?php echo esc_url($imguri); ?>no-sidebar.png"
                         alt="<?php esc_attr_e('Full Width', 'attire'); ?>"
                         title="<?php esc_attr_e('Full Width', 'attire'); ?>"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>"
                           value="left-sidebar-1"/>
                    <img src="<?php echo esc_url($imguri); ?>left-sidebar.png"
                         alt="<?php esc_attr_e('Left Sidebar', 'attire'); ?>"
                         title="<?php esc_attr_e('Left Sidebar', 'attire'); ?>"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>"
                           value="right-sidebar-1"/>
                    <img src="<?php echo esc_url($imguri); ?>right-sidebar.png"
                         alt="<?php esc_attr_e('Right Sidebar', 'attire'); ?>"
                         title="<?php esc_attr_e('Right Sidebar', 'attire'); ?>"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>"
                           value="sidebar-2"/>
                    <img src="<?php echo esc_url($imguri); ?>sidebar-2.png"
                         alt="<?php esc_attr_e('Sidebar | Content | Sidebar', 'attire'); ?>"
                         title="<?php esc_attr_e('Sidebar | Content | Sidebar', 'attire'); ?>"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>"
                           value="left-sidebar-2"/>
                    <img src="<?php echo esc_url($imguri); ?>left-sidebar-2.png"
                         alt="<?php esc_attr_e('Two Left Sidebar', 'attire'); ?>"
                         title="<?php esc_attr_e('Two Left Sidebar', 'attire'); ?>"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>"
                           value="right-sidebar-2"/>
                    <img src="<?php echo esc_url($imguri); ?>right-sidebar-2.png"
                         alt="<?php esc_attr_e('Two Right Sidebar', 'attire'); ?>"
                         title="<?php esc_attr_e('Two Right Sidebar', 'attire'); ?>"/>
                </label>
            </div>
            <?php
        }
    }

    class Attire_Image_Picker_Custom_Control extends WP_Customize_Control
    {

        public $type = 'image-picker';

        public function render_content()
        {
            ?>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <div class="attire-image-picker">
                <?php foreach ($this->choices as $choice): ?>

                    <label>
                        <input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>"
                               value="<?php echo esc_attr($choice['value']); ?>"/>
                        <img src="<?php echo esc_url($choice['src']); ?>"
                             alt="<?php echo esc_attr($choice['title']); ?>"
                             title="<?php echo esc_attr($choice['title']); ?>"/>
                    </label>

                <?php endforeach; ?>
            </div>
            <?php
        }
    }

    class Attire_Static_Review_Text_Control extends WP_Customize_Control
    {
        public $type = 'static-text';

        protected function render_content()
        {
            ?>
            <div class="customize-control-description"><?php

                if (is_array($this->description)) {
                    echo '<p>' . implode('</p><p>', $this->description) . '</p>';
                } else {
                    echo $this->description;
                }

                ?>
                <h2><?php esc_html_e('Write a Review', 'attire') ?></h2>
                <p style="text-align:left;">
                    We highly appreciate if you kindly take a few minutes to give us your impression of the theme and any suggestions you may have.
                    It will help us to improve our ability to serve you and other users.
                </p>
                <p>
                    <a href="<?php echo esc_url('https://wordpress.org/support/theme/attire/reviews/#new-post'); ?>"
                       target="_blank"><?php esc_html_e('Write Your Review', 'attire'); ?></a>
                </p>
                <h3><?php esc_html_e('Support', 'attire') ?></h3>
                <p><?php esc_html_e('Need help? You can reach us at', 'attire') ?> </p>

                <p>
                    <a href="<?php echo esc_url('https://wordpress.org/support/theme/attire'); ?>"
                       target="_blank"><?php esc_html_e('@Wordpress', 'attire'); ?></a>
                    or
                    <a href="<?php echo esc_url('http://wpattire.com/support/free-support/'); ?>"
                       target="_blank"><?php esc_html_e('@Our website', 'attire'); ?></a>
                </p>

            </div>

            <?php

        }

    }

    class Attire_Google_Font_Picker_Control extends WP_Customize_Control
    {
        public $type = 'google_font_picker';

        public function render_content()
        {


            ?>
            <label>
                <?php if (!empty($this->label)) : ?>
                    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php endif; ?>
                <select id="<?php echo $this->id; ?>"  <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>" <?php $this->input_attrs(); ?>>
                    <?php foreach($this->choices as $key => $value){ ?>
                        <option value="<?php echo  $key; ?>" <?php selected($this->value(), $key) ?> ><?php echo $value; ?></option>
                    <?php }?>
                </select>

            </label>
            <?php /*
            <div style="display: flex">
                <div>
                    <label>
                        <span class="customize-control-title"><?php _e('Letter Spacing', 'attire'); ?></span>
                        <table class="wp_custom_range_table">
                            <tr>
                                <td style="width:65%;">
                                    <input data-input-type="range" type="range"
                                           value="<?php echo esc_attr($this->value($this->id."_letter_spacing")); ?>" <?php $this->link($this->id."_letter_spacing"); ?> />
                                </td>
                                <td style="width: 35%">
                                    <input class="cs-range-value"
                                           value="<?php echo esc_attr($this->value($this->id."_letter_spacing")); ?>" type="number"/>
                                </td>
                            </tr>
                        </table>
                    </label>
                </div>
                <div>
                    <label>
                        <span class="customize-control-title"><?php _e('Line Height', 'attire'); ?></span>
                        <table class="wp_custom_range_table">
                            <tr>
                                <td style="width:65%;">
                                    <input data-input-type="range" type="range" <?php $this->input_attrs(); ?>
                                           value="<?php echo esc_attr($this->value($this->id."_line_height")); ?>"  <?php $this->link($this->id."_line_height"); ?>  />
                                </td>
                                <td style="width: 35%">
                                    <input class="cs-range-value"
                                           value="<?php echo esc_attr($this->value($this->id."_line_height")); ?>" type="number"/>
                                </td>
                            </tr>
                        </table>
                    </label>
                </div>

            </div>
             */ ?>
            <script>
                jQuery(function ($) {
                    $('#<?php echo $this->id; ?>').chosen({width: "100%"});
                });
            </script>
            <?php
        }
    }
}

/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function attire_customize_register($wp_customize)
{

    // Temporary initialisation to not show error; In general these variables are acquired from files added bellow

    $attire_panels = array();
    $attire_sections = array();
    $attire_options = array();
    $attire_config = array();
    $choices = array();
    $input_attrs = array();
    $taxonomy = array();
    $type = '';
    $default = '';
    $transport = '';
    $label = '';
    $section = '';
    $description = '';

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('custom_logo')->transport = 'postMessage';

    $wp_customize->get_setting('header_image')->transport = 'postMessage';
    $wp_customize->get_section('header_image')->title = 'Page Header';

    $wp_customize->get_control('custom_logo')->section = 'attire_logo_options';

    if (isset($wp_customize->selective_refresh)) {

        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '.site-description',
            'render_callback' => 'attire_blogdescription_rcb'
        ));

        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => 'a.site-logo',
            'render_callback' => 'attire_blogname_rcb'
        ));

        $wp_customize->selective_refresh->add_partial('custom_logo', array(
            'selector' => '.site-logo',
            'render_callback' => 'attire_site_logo_rcb'

        ));
        $wp_customize->selective_refresh->add_partial('header_image', array(
            'selector' => '.page_header_wrap',
            'render_callback' => 'attire_custom_header_rcb'

        ));
    }

    /* Load Panels, Sections, Settings, Controls array */
    require_once(ATTIRE_TEMPLATE_DIR . '/admin/customizer-config.php');


    /* Adding support for Child Themes */
    $attire_panels = apply_filters(ATTIRE_THEME_PREFIX . 'customizer_panels', $attire_panels);
    $attire_sections = apply_filters(ATTIRE_THEME_PREFIX . 'customizer_sections', $attire_sections);
    $attire_options = apply_filters(ATTIRE_THEME_PREFIX . 'customizer_options', $attire_options);

    /* Basic Config */
    $theme_option = $attire_config['option_name'];
    $capability = $attire_config['capability'];
    $option_type = $attire_config['option_type'];


    /* Add Panels */
    foreach ($attire_panels as $id => $args) {
        $wp_customize->add_panel($id, $args);
    }

    /* Add Sections */
    foreach ($attire_sections as $id => $args) {
        $wp_customize->add_section($id, $args);
    }

    /* Add Settings and Controls */
    foreach ($attire_options as $id => $args) {
        extract($args);

        switch ($type) {
            case 'text':
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'sanitize_text_field',
                ));

                $wp_customize->add_control($id, array(
                    'label' => $label,
                    'section' => $section,
                    'settings' => $theme_option . '[' . $id . ']',
                ));
                break;
            case 'attire_review':
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => '',
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => '__return_false'
                ));

                $wp_customize->add_control(new Attire_Static_Review_Text_Control($wp_customize, $id, array(
                    'label' => $label,
                    'section' => $section,
                    'settings' => $theme_option . '[' . $id . ']',
                )));
                break;
                break;
            case 'textarea':
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'sanitize_textarea_field',
                ));

                $wp_customize->add_control($id, array(
                    'label' => $label,
                    'type' => 'textarea',
                    'section' => $section,
                    'settings' => $theme_option . '[' . $id . ']',
                ));
                break;

            case 'email':
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'attire_sanitize_email',
                ));

                $wp_customize->add_control($id, array(
                    'label' => $label,
                    'section' => $section,
                    'settings' => $theme_option . '[' . $id . ']',
                ));
                break;

            case 'url':
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'esc_url_raw',
                ));

                $wp_customize->add_control($id, array(
                    'label' => $label,
                    'section' => $section,
                    'settings' => $theme_option . '[' . $id . ']',
                ));
                break;

            case 'number':
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'attire_sanitize_integer',
                ));

                $wp_customize->add_control($id, array(
                    'label' => $label,
                    'type' => 'number',
                    'section' => $section,
                    'settings' => $theme_option . '[' . $id . ']',
                    'input_attrs' => array(
                        'min' => isset($min) ? $min : 0,
                        'max' => isset($max) ? $max : 5,
                    )
                ));
                break;

            case 'image':
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'esc_url_raw',
                ));

                $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $id, array(
                    'label' => $label,
                    'section' => $section,
                    'settings' => $theme_option . '[' . $id . ']',
                )));
                break;

            case 'select':
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'attire_sanitize_select',
                ));

                $wp_customize->add_control($id, array(
                    'label' => $label,
                    'type' => 'select',
                    'section' => $section,
                    'settings' => $theme_option . '[' . $id . ']',
                    'choices' => $choices,
                ));
                break;

            case 'checkbox':
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'attire_sanitize_checkbox',
                ));

                $wp_customize->add_control($id, array(
                    'label' => $label,
                    'type' => 'checkbox',
                    'section' => $section,
                    'settings' => $theme_option . '[' . $id . ']',
                ));
                break;

            case 'color':
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'sanitize_hex_color',
                ));

                $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $id, array(
                    'label' => $label,
                    'section' => $section,
                    'settings' => $theme_option . '[' . $id . ']',
                )));
                break;

            case 'layout':
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'sanitize_text_field',
                    // this has to be sanitized with sanitize_text_field and cant be sanitized with  attire_sanitize_custom_select/attire_sanitize_select
                    // because no choices passed from customizer-control.php for this type (layout), instead it's render manually byt the function Layout_Picker_Custom_Control->render_content
                ));
                $wp_customize->add_control(new Attire_Layout_Picker_Custom_Control($wp_customize, $id, array(
                    'label' => $label,
                    'description' => '',
                    'type' => 'layout',
                    'section' => $section,
                    'settings' => $theme_option . '[' . $id . ']',
                )));
                break;

            case 'image-picker':
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'attire_sanitize_custom_select',
                ));
                $wp_customize->add_control(new Attire_Image_Picker_Custom_Control($wp_customize, $id, array(
                    'label' => $label,
                    'description' => '',
                    'type' => 'image-picker',
                    'section' => $section,
                    'settings' => $theme_option . '[' . $id . ']',
                    'choices' => $choices,
                )));
                break;

            case 'dropdown-pages':
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'capability' => $capability,
                    'default' => $default,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'attire_sanitize_integer',
                ));

                $wp_customize->add_control($id, array(
                    'label' => $label,
                    'section' => $section,
                    'type' => 'dropdown-pages',
                    'settings' => $theme_option . '[' . $id . ']',
                ));
                break;

            case 'dropdown-taxonomy':
                $choices = array();
                $taxonomies = get_terms($taxonomy, 'hide_empty=0');

                if (count($taxonomies) > 0) {
                    foreach ($taxonomies as $taxo) {
                        $tid = isset($taxo->term_id) ? $taxo->term_id : null;
                        $name = isset($taxo->name) ? $taxo->name : null;
                        $choices[$tid] = $name;
                    }
                }

                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'sanitize_text_field',
                ));

                $wp_customize->add_control($id, array(
                    'label' => $label,
                    'type' => 'select',
                    'section' => $section,
                    'settings' => $theme_option . '[' . $id . ']',
                    'choices' => $choices,
                ));
                break;

            case 'typography':
                $fontsdata = AttireOptionFields::GetFonts();
                //wpdmdd($fontsdata);
                $fonts = array();
                $fonts[''] = 'Default';
                foreach ($fontsdata as $font) {
                    $fonts[$font->family.":".implode(",", $font->variants)] = $font->family;
                }
                asort($fonts);
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'sanitize_text_field',
                ));
                $wp_customize->add_setting($theme_option . '[' . $id . '_letter_spacing]', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'sanitize_text_field',
                ));
                $wp_customize->add_setting($theme_option . '[' . $id . '_line_height]', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'sanitize_text_field',
                ));
                /*$wp_customize->add_control($id, array(
                    'settings' => $theme_option . '[' . $id . ']',
                    'label' => $label,
                    'section' => $section,
                    'type' => 'select',
                    'input_attrs' => array('class' => 'chosen-select'),
                    'choices' => $fonts,
                ));*/
                $wp_customize->add_control(new Attire_Google_Font_Picker_Control(
                    $wp_customize,
                    $id,
                    array(
                        'label' => $label,
                        'section' => $section,
                        'settings' => $theme_option . '[' . $id . ']',
                        'description' => '',
                        'choices' => $fonts

                    )
                ));
                break;

            case 'range':
                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => $default,
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'attire_sanitize_integer',
                ));

                $wp_customize->add_control(
                    new Attire_Customize_Range_Control(
                        $wp_customize,
                        $id,
                        array(
                            'label' => $label,
                            'section' => $section,
                            'settings' => $theme_option . '[' . $id . ']',
                            'description' => __('Measurement is in pixel.', 'attire'),
                            'input_attrs' => $input_attrs,

                        )
                    )
                );

                break;

            case 'dropdown-sidebar':
                global $wp_registered_sidebars;
                $sidebars = array();
                $sidebars['no_sidebar'] = 'Do not apply';
                foreach ($wp_registered_sidebars as $sidebar) {
                    $sid = $sidebar['id'];
                    $sidebars[$sid] = $sidebar['name'];
                }

                $wp_customize->add_setting($theme_option . '[' . $id . ']', array(
                    'default' => '',
                    'capability' => $capability,
                    'type' => $option_type,
                    'transport' => $transport,
                    'sanitize_callback' => 'sanitize_text_field',
                ));

                $wp_customize->add_control($id, array(
                    'settings' => $theme_option . '[' . $id . ']',
                    'label' => $label,
                    'section' => $section,
                    'type' => 'select',
                    'choices' => $sidebars,
                ));
                break;

            default:
                break;
        }

        if (isset($wp_customize->selective_refresh)) {

            if ($id === 'site_logo_footer') {
                $wp_customize->selective_refresh->add_partial('site_logo_footer_partial', array(
                    'settings' => array('attire_options[site_logo_footer]'),
                    'selector' => '.footer-logo',
                    'render_callback' => 'attire_site_logo_footer_rcb',
                    'fallback_refresh' => false,
                    'container_inclusive' => false,

                ));

            } elseif ($id === 'nav_header') {
                $wp_customize->selective_refresh->add_partial('nav_header_partial', array(
                    'settings' => array('attire_options[nav_header]'),
                    'selector' => '.header-div',
                    'render_callback' => 'attire_nav_header_rcb',
                    'fallback_refresh' => false,
                    'container_inclusive' => false,

                ));

            } elseif ($id === 'footer_style') {
                $wp_customize->selective_refresh->add_partial('footer_style_partial', array(
                    'settings' => array('attire_options[footer_style]'),
                    'selector' => '.footer-div',
                    'render_callback' => 'attire_footer_style_rcb',
                    'fallback_refresh' => false,
                    'container_inclusive' => false,

                ));

            } elseif ($id === 'copyright_info') {
                $wp_customize->selective_refresh->add_partial('copyright_info_partial', array(
                    'settings' => array('attire_options[copyright_info]'),
                    'selector' => '.copyright-text',
                    'render_callback' => 'attire_copyright_info_rcb',
                    'fallback_refresh' => false,
                    'container_inclusive' => false,

                ));


            } elseif ($id === 'copyright_info_visibility') {
                $wp_customize->selective_refresh->add_partial('copyright_info_visibility_partial', array(
                    'settings' => array('attire_options[copyright_info_visibility]'),
                    'selector' => '.copyright-outer',
                    'render_callback' => 'attire_copyright_info_visibility_rcb',
                    'fallback_refresh' => false,
                    'container_inclusive' => false,

                ));

            } elseif ($id === 'attire_archive_page_post_view') {
                $wp_customize->selective_refresh->add_partial('attire_archive_page_post_view_partial', array(
                    'settings' => array('attire_options[attire_archive_page_post_view]'),
                    'selector' => '.archive-div',
                    'render_callback' => 'attire_archive_page_post_view_rcb',
                    'fallback_refresh' => false,
                    'container_inclusive' => false,
                ));


            }
        }
    }

}

add_action('customize_register', 'attire_customize_register');


/**
 *
 * Sanitize Input Data
 */
function attire_sanitize_integer($input)
{
    if (is_numeric($input)) {
        return intval($input);
    }
}

function attire_sanitize_email($input)
{
    if (is_email($input)) {
        return $input;
    }
}

function attire_sanitize_custom_select($input, $setting)
{

    // Ensure input is a slug.
    $input = sanitize_key($input);

    if (strrpos($setting->id, '[')) {
        $id = explode('[', $setting->id);
        $id = explode(']', $id[1]);
        $id = $id[0];

    } else {
        $id = $setting->id;
    }

    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control($id)->choices;

    // If the input is a valid key, return it; otherwise, return the default.

    foreach ($choices as $choice) {


        if ($choice['value'] === $input) {
            return $input;
        }
    }

    return $setting->default;

}

function attire_sanitize_select($input, $setting)
{

    // Ensure input is a slug.
    $input = sanitize_key($input);
    // Get list of choices from the control associated with the setting.

    if (strrpos($setting->id, '[')) {
        $id = explode('[', $setting->id);
        $id = explode(']', $id[1]);
        $id = $id[0];

    } else {
        $id = $setting->id;
    }

    $choices = $setting->manager->get_control($id)->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}

function attire_sanitize_checkbox($checked)
{
    // Boolean check.
    return ((isset($checked) && true == $checked) ? true : false);
}

/**
 *
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function attire_customize_preview_js()
{
    wp_enqueue_script('attire_customizer', get_template_directory_uri() . '/admin/js/customizer.js', array('customize-preview'), '20171015', true);
}

add_action('customize_preview_init', 'attire_customize_preview_js');

/**
 *
 * Customizing Customizer Controls
 */
function attire_customizer_style()
{


    wp_enqueue_style('attire-customizer-controls-css', get_template_directory_uri() . '/admin/css/attire-customizer-controls.css');
    wp_enqueue_style('attire-customizer-controls-chosen', get_template_directory_uri() . '/admin/chosen-select/chosen.min.css');
    wp_enqueue_script('attire-customizer-controls-chosen', get_template_directory_uri() . '/admin/chosen-select/chosen.jquery.min.js');
    wp_enqueue_script('attire-customizer-controls-js', get_template_directory_uri() . '/admin/js/attire-customizer-controls.js', array(
        'jquery',
        'customize-controls'
    ), false, true);

}

add_action('customize_controls_enqueue_scripts', 'attire_customizer_style');

add_action("customize_controls_print_styles", function (){
    ?>
    <style>

    </style>
<?php
});
add_action("customize_controls_print_scripts", function (){
    ?>
    <script>
        jQuery(function ($) {
            $('.customize-save-button-wrapper').prepend("<a title='<?php _e('Reset to default settings', 'attire'); ?>' id='reset-attire' class='button button-secondary' href='#' style='float: left;margin-right: 5px;background: #fb4e60;color:#ffffff;border-color: rgba(251, 55, 56, 0.8)'><?php _e('Reset', 'attire'); ?></a>");
            $('body').on('click', '#reset-attire', function(e){
                e.preventDefault();
                if(!confirm("<?php _e('Are you trying to reset Attire theme options to it\'s default settings.\nAction can not be reverted.\nAre your sure?', 'attire'); ?>")) return false;
                var tt = $(this);
                tt.attr('disabled', 'disabled').html('<?php _e('Reseting...', 'attire'); ?>');
                $.post(ajaxurl, { action: 'reset_attire_options', __reset_attire: '<?php echo wp_create_nonce(NONCE_KEY ); ?>' }, function(res){
                    //tt.removeAttr('disabled').html('<?php _e('Reset to Default', 'attire'); ?>');
                    if(res.success){
                        //jQuery('#customize-preview iframe').attr('src', jQuery('#customize-preview iframe').attr('src'));
                        location.reload(true);
                    }
                });
            });

        });
    </script>
    <?php
});

add_action("wp_ajax_reset_attire_options", function (){
    if(wp_verify_nonce($_REQUEST['__reset_attire'], NONCE_KEY) && current_user_can('manage_options')){
        delete_option('attire_options');
        wp_send_json(array('success' => true));
    }
});


/**
 *
 * Partials Render Callbacks
 *
 */

function attire_blogdescription_rcb()
{
    bloginfo('description');
}

function attire_blogname_rcb()
{
    bloginfo('name');
}

function attire_site_logo_rcb()
{
    return '<a class="site-logo" href="' . esc_url(home_url("/")) . '">' . AttireThemeEngine::SiteLogo() . '</a>';
}

function attire_custom_header_rcb()
{
    AttireThemeEngine::PageHeaderStyle();
}

function attire_site_logo_footer_rcb()
{
    $logourl = esc_url(AttireThemeEngine::NextGetOption('site_logo_footer'));
    if ($logourl) {
        return "<a class='' href='" . esc_url(home_url('/')) . "'>" . AttireThemeEngine::FooterLogo() . "</a>";
    } else {
        return esc_html(get_bloginfo('sitename'));
    }
}

function attire_nav_header_rcb()
{
    AttireThemeEngine::HeaderStyle();
}

function attire_footer_style_rcb()
{
    AttireThemeEngine::FooterStyle();
}

function attire_copyright_info_rcb()
{
    return AttireThemeEngine::NextGetOption('copyright_info');

}

function attire_copyright_info_visibility_rcb()
{
    $show = AttireThemeEngine::NextGetOption('copyright_info_visibility');
    if ($show === 'show') {
        return '<p class="copyright-text">' . esc_html(AttireThemeEngine::NextGetOption('copyright_info')) . '';
    } else {
        return '';
    }
}

function attire_archive_page_post_view_rcb()
{
    get_template_part('loop', get_post_type());
}
