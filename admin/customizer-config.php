<?php
if (!defined('ABSPATH')) {
    exit;
}

$attire_config = array(
    'capability' => 'edit_theme_options',
    'option_type' => 'option',
    'option_name' => 'attire_options'
);

$attire_panels = array(
    'attire_general_settings' => array(
        'title' => __('General Settings', 'attire'),
        'description' => '',
        'priority' => 1,
    ),
    'attire_layouts' => array(
        'title' => __('Sidebar Layouts', 'attire'),
        'description' => '',
        'priority' => 2,
    ),
    'attire_typography' => array(
        'title' => __('Typography', 'attire'),
        'description' => '',
        'priority' => 4,
    ),
    'attire_color_panel' => array(
        'title' => __('Attire Colors', 'attire'),
        'description' => '',
        'priority' => 5,
    )
);

$attire_sections = array(

    'attire_header_color_options' => array(
        'title' => __('Header', 'attire'),
        'description' => '',
        'panel' => 'attire_color_panel',
        'priority' => 1,
    ),
    'attire_blog_section' => array(
        'title' => __('Blog', 'attire'),
        'description' => '',
        'priority' => 6,
    ),
    'attire_footer_color_options' => array(
        'title' => __('Footer', 'attire'),
        'description' => '',
        'panel' => 'attire_color_panel',
        'priority' => 2,
    ),
    'attire_main_nav_color_options' => array(
        'title' => __('Main Menu', 'attire'),
        'description' => '',
        'panel' => 'attire_color_panel',
        'priority' => 3,
    ),
    'attire_footer_nav_color_options' => array(
        'title' => __('Footer Menu', 'attire'),
        'description' => '',
        'panel' => 'attire_color_panel',
        'priority' => 4,
    ),
    'attire_body_color_options' => array(
        'title' => __('Body', 'attire'),
        'description' => '',
        'panel' => 'attire_color_panel',
        'priority' => 5,
    ),
    'attire_sidebar_widget_color_options' => array(
        'title' => __('Sidebar Widget', 'attire'),
        'description' => '',
        'panel' => 'attire_color_panel',
        'priority' => 6,
    ),
    'attire_footer_widget_color_options' => array(
        'title' => __('Footer Widget', 'attire'),
        'description' => '',
        'panel' => 'attire_color_panel',
        'priority' => 3,
    ),
    'attire_header_options' => array(
        'title' => __('Header Style', 'attire'),
        'description' => '',
        'panel' => '',
        'priority' => 2,
    ),
    'attire_footer_options' => array(
        'title' => __('Footer Style', 'attire'),
        'description' => '',
        'panel' => '',
        'priority' => 3,
    ),
    'attire_logo_options' => array(
        'title' => __('Logo', 'attire'),
        'description' => '',
        'panel' => 'attire_general_settings',
        'priority' => 120,
    ),
    'attire_footer_widget_number' => array(
        'title' => __('Footer Widgets', 'attire'),
        'description' => '',
        'panel' => 'attire_general_settings',
        'priority' => 120,
    ),
    'attire_header_general_settings' => array(
        'title' => __('Site Header', 'attire'),
        'description' => '',
        'panel' => 'attire_general_settings',
        'priority' => 120,
    ),
    'attire_back_to_top' => array(
        'title' => __('Back To Top', 'attire'),
        'description' => '',
        'panel' => 'attire_general_settings',
        'priority' => 120,
    ),
    'attire_layout_options' => array(
        'title' => __('Site Layout', 'attire'),
        'description' => '',
        'priority' => 3,
    ),
    'attire_social' => array(
        'title' => __('Social Networks', 'attire'),
        'description' => '',
        'panel' => 'attire_general_settings',
        'priority' => 120,
    ),
    'attire_contact' => array(
        'title' => __('Contact Info', 'attire'),
        'description' => '',
        'panel' => 'attire_general_settings',
        'priority' => 120,
    ),
    'attire_copyright' => array(
        'title' => __('Copyright Info', 'attire'),
        'description' => '',
        'panel' => 'attire_general_settings',
        'priority' => 120,
    ),
    'attire_front_page_layout' => array(
        'title' => __('Front / Blog Page Layout', 'attire'),
        'description' => '',
        'panel' => 'attire_layouts',
        'priority' => 120,
    ),
    'attire_default_post_layout' => array(
        'title' => __('Default Post Layout', 'attire'),
        'description' => '',
        'panel' => 'attire_layouts',
        'priority' => 120,
    ),
    'attire_default_page_layout' => array(
        'title' => __('Default Page Layout', 'attire'),
        'description' => '',
        'panel' => 'attire_layouts',
        'priority' => 120,
    ),
    'attire_archive_page_layout' => array(
        'title' => __('Archive Page Layout', 'attire'),
        'description' => '',
        'panel' => 'attire_layouts',
        'priority' => 120,
    ),
    'attire_generic_fonts' => array(
        'title' => __('Generic Fonts', 'attire'),
        'description' => '',
        'panel' => 'attire_typography',
        'priority' => 120,
    ),
    'attire_post_fonts' => array(
        'title' => __('Post Fonts', 'attire'),
        'description' => '',
        'panel' => 'attire_typography',
        'priority' => 120,
    ),
    'attire_widget_fonts' => array(
        'title' => __('Widget Fonts', 'attire'),
        'description' => '',
        'panel' => 'attire_typography',
        'priority' => 120,
    ),
    'attire_menu_fonts' => array(
        'title' => __('Menu Fonts', 'attire'),
        'description' => '',
        'panel' => 'attire_typography',
        'priority' => 120,
    ),
    'attire_write_review' => array(
        'title' => __('Support/Review', 'attire'),
        'description' => '',
        'priority' => 200,
    )

);

$attire_options = array(
    'attire_archive_page_post_view' => array(
        'label' => __('Archive Page Post View', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_blog_section',
        'default' => 'excerpt',
        'choices' => array(
            'full-post' => __('Show entire post', 'attire'),
            'excerpt' => __('Show excerpt', 'attire')
        )
    ),
    'attire_write_review' => array(
        'label' => __('Write a review', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_review',
        'section' => 'attire_write_review'
    ),
    'attire_read_more_text' => array(
        'label' => __('Read More Text', 'attire'),
        'transport' => 'postMessage',
        'type' => 'text',
        'section' => 'attire_blog_section',
        'default' => __('Read more', 'attire'),
    ),
    'attire_single_post_post_navigation' => array(
        'label' => __('Previous/Next Post Button', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_blog_section',
        'default' => 'show',
        'choices' => array(
            'show' => __('Show', 'attire'),
            'hide' => __('Hide', 'attire')
        )
    ),
    'attire_single_post_meta_position' => array(
        'label' => __('Post Meta Bar Position', 'attire'),
        'transport' => 'refresh',
        'type' => 'select',
        'section' => 'attire_blog_section',
        'default' => 'after-title',
        'choices' => array(
            'after-content' => __('After Post Content', 'attire'),
            'after-title' => __('After Post Title', 'attire')
        )
    ),
    'attire_single_post_author_box' => array(
        'label' => __('Post Author Box', 'attire'),
        'transport' => 'refresh',
        'type' => 'select',
        'section' => 'attire_blog_section',
        'default' => 'show',
        'choices' => array(
            'show' => __('Show', 'attire'),
            'hide' => __('Hide', 'attire')
        )
    ),
    'site_header_bg_color_left' => array(
        'label' => __('Header Background Left', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_header_color_options',
        'default' => '#151515',
    ),
    'site_header_bg_color_right' => array(
        'label' => __('Header Background Right', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_header_color_options',
        'default' => '#151515',
    ),
    'site_header_bg_grad_angle' => array(
        'label' => __('Header BG Gradient Angle', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'section' => 'attire_header_color_options',
        'default' => 45,
        'input_attrs' => array(
            'min' => -360,
            'max' => 360,
            'step' => 1,
        )
    ),
    'site_title_text_color' => array(
        'label' => __('Site Title', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_header_color_options',
        'default' => '#ffffff',
    ),

    'site_description_text_color' => array(
        'label' => __('Site Description', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_header_color_options',
        'default' => '#ffffff',
    ),

    'site_footer_bg_color' => array(
        'label' => __('Footer Background', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_footer_color_options',
        'default' => '#151515',
    ),
    'site_footer_title_text_color' => array(
        'label' => __('Site Title', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_footer_color_options',
        'default' => '#ffffff',
    ),
    'site_logo_height' => array(
        'label' => __('Site Logo Height', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'section' => 'attire_logo_options',
        'default' => 80,
        'input_attrs' => array(
            'min' => 10,
            'max' => 200,
            'step' => 1,
        )
    ),
    'site_logo_footer' => array(
        'label' => __('Footer Logo', 'attire'),
        'transport' => 'postMessage',
        'type' => 'image',
        'section' => 'attire_logo_options',
        'default' => '',
    ),
    'site_logo_footer_height' => array(
        'label' => __('Footer Logo Height', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'section' => 'attire_logo_options',
        'default' => 60,
        'input_attrs' => array(
            'min' => 10,
            'max' => 200,
            'step' => 1,
        )
    ),
    'site_logo_mobile_menu' => array(
        'label' => __('Mobile Menu Logo', 'attire'),
        'transport' => 'postMessage',
        'type' => 'image',
        'section' => 'attire_logo_options',
        'default' => '',
    ),
    'site_logo_mobile_menu_height' => array(
        'label' => __('Mobile Menu Logo Height', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'section' => 'attire_logo_options',
        'default' => 60,
        'input_attrs' => array(
            'min' => 10,
            'max' => 200,
            'step' => 1,
        )
    ),
    'main_layout_type' => array(
        'label' => __('Site Layout', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_layout_options',
        'default' => 'container-fluid',
        'choices' => array(
            'container-fluid' => __('Full Width', 'attire'),
            'layout-fixed-width' => __('Fixed Width', 'attire'),
        ),
    ),
    'main_layout_width' => array(
        'label' => __('Site Layout ( Fixed ) Width', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'section' => 'attire_layout_options',
        'default' => 1300,
        'input_attrs' => array(
            'min' => 900,
            'max' => 2000,
            'step' => 5,
        )
    ),
    'container_width' => array(
        'label' => __('Container Width', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'section' => 'attire_layout_options',
        'default' => 1100,
        'input_attrs' => array(
            'min' => 500,
            'max' => 2000,
            'step' => 5,
        )
    ),
    'header_content_layout_type' => array(
        'label' => __('Header Content', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_layout_options',
        'default' => 'container',
        'choices' => array(
            'container-fluid' => __('Full-Width', 'attire'),
            'container' => __('Container', 'attire'),
        ),
    ),
    'body_content_layout_type' => array(
        'label' => __('Body Content', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_layout_options',
        'default' => 'container',
        'choices' => array(
            'container-fluid' => __('Full-Width', 'attire'),
            'container' => __('Container', 'attire'),
        ),
    ),
    'footer_widget_content_layout_type' => array(
        'label' => __('Footer Widgets', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_layout_options',
        'default' => 'container',
        'choices' => array(
            'container-fluid' => __('Full-Width', 'attire'),
            'container' => __('Container', 'attire'),
        ),
    ),
    'footer_content_layout_type' => array(
        'label' => __('Footer Content', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_layout_options',
        'default' => 'container',
        'choices' => array(
            'container-fluid' => __('Full-Width', 'attire'),
            'container' => __('Container', 'attire'),
        ),
    ),
    'attire_search_form_visibility' => array(
        'label' => __('Search Form Visibility', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_header_general_settings',
        'default' => 'show',
        'choices' => array(
            'show' => __('Show', 'attire'),
            'hide' => __('Hide', 'attire'),
        ),
    ),
    'attire_nav_behavior' => array(
        'label' => __('Navigation Menu Behavior', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_header_general_settings',
        'default' => 'sticky',
        'choices' => array(
            'sticky' => __('Sticky', 'attire'),
            'static' => __('Static', 'attire'),
        ),
    ),
    'attire_back_to_top_visibility' => array(
        'label' => __('Back To Top Button Visibility', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_back_to_top',
        'default' => 'show',
        'choices' => array(
            'show' => __('Show', 'attire'),
            'hide' => __('Hide', 'attire'),
        ),
    ),
    'footer_widget_number' => array(
        'label' => __('Number of Footer Widget Area', 'attire'),
        'transport' => 'refresh',
        'type' => 'select',
        'section' => 'attire_footer_widget_number',
        'default' => 3,
        'choices' => array(
            0 => 0,
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5
        )
    ),

    'nav_header' => array(
        'label' => __('Navigation Style', 'attire'),
        'transport' => 'postMessage',
        'type' => 'image-picker',
        'section' => 'attire_header_options',
        'default' => 'header-1',
        'choices' => array(
            0 => array(
                'value' => 'header-1',
                'title' => __('Default Navigation Header', 'attire'),
                'src' => get_template_directory_uri() . '/images/headers/header1.jpg',
            ),
            1 => array(
                'value' => 'header-2',
                'title' => __('Compact Navigation Header', 'attire'),
                'src' => get_template_directory_uri() . '/images/headers/header2.jpg',
            ),
            2 => array(
                'value' => 'header-3',
                'title' => __('Narrow Navigation Header', 'attire'),
                'src' => get_template_directory_uri() . '/images/headers/header3.jpg',
            ),
            3 => array(
                'value' => 'header-4',
                'title' => __('Centered Navigation Header', 'attire'),
                'src' => get_template_directory_uri() . '/images/headers/header4.jpg',
            ),
            4 => array(
                'value' => 'header-5',
                'title' => __('Extended Navigation Header', 'attire'),
                'src' => get_template_directory_uri() . '/images/headers/header5.jpg',
            ),
            5 => array(
                'value' => 'header-6',
                'title' => __('Transparent Navigation Header', 'attire'),
                'src' => get_template_directory_uri() . '/images/headers/header6.jpg',
            )
        ),
    ),

    'dropdown_menu_animation' => array(
        'label' => __('Dropdown Menu Animation', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_header_options',
        'default' => 'none',
        'choices' => array(
            'none' => __('No Animation', 'attire'),
            'fadein' => __('Fade In', 'attire'),
            'swingin' => __('Swing In', 'attire'),
            'slidein' => __('Slide In', 'attire'),
            'scalein' => __('Scale In', 'attire'),
            'blurin' => __('Blur In', 'attire'),
            'puffin' => __('Puff In', 'attire'),
        ),
    ),

    'footer_style' => array(
        'label' => __('Footer Style', 'attire'),
        'transport' => 'postMessage',
        'type' => 'image-picker',
        'section' => 'attire_footer_options',
        'default' => 'footer4',
        'choices' => array(
            0 => array(
                'value' => 'footer1',
                'title' => __('Narrow', 'attire'),
                'src' => get_template_directory_uri() . '/images/footers/footer1.jpg',
            ),
            1 => array(
                'value' => 'footer2',
                'title' => __('Large Centered', 'attire'),
                'src' => get_template_directory_uri() . '/images/footers/footer2.jpg',
            ),
            2 => array(
                'value' => 'footer3',
                'title' => __('Large Left', 'attire'),
                'src' => get_template_directory_uri() . '/images/footers/footer3.jpg',
            ),
            3 => array(
                'value' => 'footer4',
                'title' => __('Large Right', 'attire'),
                'src' => get_template_directory_uri() . '/images/footers/footer4.jpg',
            )
        ),
    ),

    // Main menu colors

    'menu_top_font_color' => array(
        'label' => __('Text Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_main_nav_color_options',
        'default' => '#ffffff'
    ),
    'main_nav_bg' => array(
        'label' => __('Background Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_main_nav_color_options',
        'default' => '#151515'
    ),
    'menuhbg_color' => array(
        'label' => __('Hover/Active Background Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_main_nav_color_options',
        'default' => '#ffffff'
    ),
    'menuht_color' => array(
        'label' => __('Hover/Active Text Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_main_nav_color_options',
        'default' => '#000000'
    ),
    'menu_dropdown_bg_color' => array(
        'label' => __('Dropdown Beackground Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_main_nav_color_options',
        'default' => '#ffffff'
    ),
    'menu_dropdown_font_color' => array(
        'label' => __('Dropdown Text Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_main_nav_color_options',
        'default' => '#000000'
    ),
    'menu_dropdown_hover_bg' => array(
        'label' => __('Dropdown Hover Background Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_main_nav_color_options',
        'default' => '#151515'
    ),
    'menu_dropdown_hover_font_color' => array(
        'label' => __('Dropdown Hover Text Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_main_nav_color_options',
        'default' => '#ffffff'
    ),


    // Footer menu colors
    'footer_nav_top_font_color' => array(
        'label' => __('Text Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_footer_nav_color_options',
        'default' => '#ffffff',
    ),
    'footer_nav_bg' => array(
        'label' => __('Background Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_footer_nav_color_options',
        'default' => '#151515',
    ),
    'footer_nav_hbg' => array(
        'label' => __('Hover/Active Background Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_footer_nav_color_options',
        'default' => '#ffffff',
    ),
    'footer_nav_ht_color' => array(
        'label' => __('Hover/Active Text Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_footer_nav_color_options',
        'default' => '#000000',
    ),
    'footer_nav_dropdown_font_color' => array(
        'label' => __('Dropdown Text Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_footer_nav_color_options',
        'default' => '#000000',
    ),
    'footer_nav_dropdown_hover_bg' => array(
        'label' => __('Dropdown Hover Background Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_footer_nav_color_options',
        'default' => '#151515'
    ),
    'footer_nav_dropdown_hover_font_color' => array(
        'label' => __('Dropdown Hover Text Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_footer_nav_color_options',
        'default' => '#ffffff'
    ),

    // Body Colors

    'body_bg_color' => array(
        'label' => __('Background Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_body_color_options',
        'default' => '#F5F5F5',
    ),
    'a_color' => array(
        'label' => __('Link Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_body_color_options',
        'default' => '#269865',
    ),
    'ah_color' => array(
        'label' => __('Link Hover Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_body_color_options',
        'default' => '#777777',
    ),
    'header_color' => array(
        'label' => __('Heading Text Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_body_color_options',
        'default' => '#000000',
    ),
    'body_color' => array(
        'label' => __('Regular Text Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_body_color_options',
        'default' => '#000000',
    ),

    // Sidebar widget colors

    'widget_title_font_color' => array(
        'label' => __('Title Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_sidebar_widget_color_options',
        'default' => '#000000',
    ),
    'widget_content_font_color' => array(
        'label' => __('Content Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_sidebar_widget_color_options',
        'default' => '#000000',
    ),
    'widget_bg_color' => array(
        'label' => __('Background Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_sidebar_widget_color_options',
        'default' => '#ffffff',
    ),

    // Footer widget colors

    'footer_widget_title_font_color' => array(
        'label' => __('Title Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_footer_widget_color_options',
        'default' => '#000000',
    ),
    'footer_widget_content_font_color' => array(
        'label' => __('Content Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_footer_widget_color_options',
        'default' => '#000000',
    ),
    'footer_widget_bg_color' => array(
        'label' => __('Background Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'section' => 'attire_footer_widget_color_options',
        'default' => '#D4D4D6',
    ),


    'layout_front_page' => array(
        'label' => __('Sidebar Layout', 'attire'),
        'transport' => 'postMessage',
        'type' => 'layout',
        'section' => 'attire_front_page_layout',
        'default' => 'no-sidebar',
    ),
    'front_page_ls' => array(
        'label' => __('Left Sidebar', 'attire'),
        'transport' => 'postMessage',
        'type' => 'dropdown-sidebar',
        'section' => 'attire_front_page_layout',
        'default' => 'left',
    ),
    'front_page_ls_width' => array(
        'label' => __('Left Sidebar Width', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_front_page_layout',
        'default' => '3',
        'choices' => array(
            '2' => __('2 Columns', 'attire'),
            '3' => __('3 Columns', 'attire'),
            '4' => __('4 Columns', 'attire'),
        ),
    ),
    'front_page_rs' => array(
        'label' => __('Right Sidebar', 'attire'),
        'transport' => 'postMessage',
        'type' => 'dropdown-sidebar',
        'section' => 'attire_front_page_layout',
        'default' => 'right',
    ),
    'front_page_rs_width' => array(
        'label' => __('Right Sidebar Width', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_front_page_layout',
        'default' => '3',
        'choices' => array(
            '2' => __('2 Columns', 'attire'),
            '3' => __('3 Columns', 'attire'),
            '4' => __('4 Columns', 'attire'),
        ),
    ),
    'layout_default_post' => array(
        'label' => __('Sidebar Layout', 'attire'),
        'transport' => 'postMessage',
        'type' => 'layout',
        'section' => 'attire_default_post_layout',
        'default' => '',
    ),
    'default_post_ls' => array(
        'label' => __('Left Sidebar', 'attire'),
        'transport' => 'postMessage',
        'type' => 'dropdown-sidebar',
        'section' => 'attire_default_post_layout',
        'default' => 'left',
    ),
    'default_post_ls_width' => array(
        'label' => __('Left Sidebar Width', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_default_post_layout',
        'default' => '3',
        'choices' => array(
            '2' => __('2 Columns', 'attire'),
            '3' => __('3 Columns', 'attire'),
            '4' => __('4 Columns', 'attire'),
        ),
    ),
    'default_post_rs' => array(
        'label' => __('Right Sidebar', 'attire'),
        'transport' => 'postMessage',
        'type' => 'dropdown-sidebar',
        'section' => 'attire_default_post_layout',
        'default' => 'right',
    ),
    'default_post_rs_width' => array(
        'label' => __('Right Sidebar Width', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_default_post_layout',
        'default' => '3',
        'choices' => array(
            '2' => __('2 Columns', 'attire'),
            '3' => __('3 Columns', 'attire'),
            '4' => __('4 Columns', 'attire'),
        ),
    ),
    'layout_default_page' => array(
        'label' => __('Sidebar Layout', 'attire'),
        'transport' => 'postMessage',
        'type' => 'layout',
        'section' => 'attire_default_page_layout',
        'default' => '',
    ),
    'default_page_ls' => array(
        'label' => __('Left Sidebar', 'attire'),
        'transport' => 'postMessage',
        'type' => 'dropdown-sidebar',
        'section' => 'attire_default_page_layout',
        'default' => 'left',
    ),
    'default_page_ls_width' => array(
        'label' => __('Left Sidebar Width', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_default_page_layout',
        'default' => '3',
        'choices' => array(
            '2' => __('2 Columns', 'attire'),
            '3' => __('3 Columns', 'attire'),
            '4' => __('4 Columns', 'attire'),
        ),
    ),
    'default_page_rs' => array(
        'label' => __('Right Sidebar', 'attire'),
        'transport' => 'postMessage',
        'type' => 'dropdown-sidebar',
        'section' => 'attire_default_page_layout',
        'default' => 'right',
    ),
    'default_page_rs_width' => array(
        'label' => __('Right Sidebar Width', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_default_page_layout',
        'default' => '3',
        'choices' => array(
            '2' => __('2 Columns', 'attire'),
            '3' => __('3 Columns', 'attire'),
            '4' => __('4 Columns', 'attire'),
        ),
    ),
    'layout_archive_page' => array(
        'label' => __('Sidebar Layout', 'attire'),
        'transport' => 'postMessage',
        'type' => 'layout',
        'section' => 'attire_archive_page_layout',
        'default' => '',
    ),
    'archive_page_ls' => array(
        'label' => __('Left Sidebar', 'attire'),
        'transport' => 'postMessage',
        'type' => 'dropdown-sidebar',
        'section' => 'attire_archive_page_layout',
        'default' => 'left',
    ),
    'archive_page_ls_width' => array(
        'label' => __('Left Sidebar Width', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_archive_page_layout',
        'default' => '3',
        'choices' => array(
            '2' => __('2 Columns', 'attire'),
            '3' => __('3 Columns', 'attire'),
            '4' => __('4 Columns', 'attire'),
        ),
    ),
    'archive_page_rs' => array(
        'label' => __('Right Sidebar', 'attire'),
        'transport' => 'postMessage',
        'type' => 'dropdown-sidebar',
        'section' => 'attire_archive_page_layout',
        'default' => 'right',
    ),
    'archive_page_rs_width' => array(
        'label' => __('Right Sidebar Width', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_archive_page_layout',
        'default' => '3',
        'choices' => array(
            '2' => __('2 Columns', 'attire'),
            '3' => __('3 Columns', 'attire'),
            '4' => __('4 Columns', 'attire'),
        ),
    ),
    'heading_font_section' => array(
        'label' => __('Heading Font', 'attire'),
        'type' => 'section-header',
        'section' => 'attire_generic_fonts',
    ),
    'heading_font' => array(
        'label' => __('Font Family', 'attire'),
        'transport' => 'postMessage',
        'type' => 'typography',
        'section' => 'attire_generic_fonts',
        'description' => esc_html__('Font family for H1...H6 html tags', 'attire')
    ),
    'heading_font_weight' => array(
        'label' => __('Font Weight', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'section' => 'attire_generic_fonts',
        'default' => '700',
        'input_attrs' => array(
            'min' => 100,
            'max' => 900,
            'step' => 100,
        )
    ),
//    'heading_font_size' => array(
//        'label' => __('H1 Font Size', 'attire'),
//        'description' => '',
//        'transport' => 'postMessage',
//        'type' => 'range',
//        'section' => 'attire_generic_fonts',
//        'default' => '25',
//        'input_attrs' => array(
//            'min' => 10,
//            'max' => 72,
//            'step' => 1,
//        )
//    ),
    'heading_font_size_desktop' => array(
        'label' => __('H1 Font Size', 'attire'),
        'description' => '',
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'h1_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '25',
        'input_attrs' => array(
            'min' => 10,
            'max' => 72,
            'step' => 1,
        )
    ),
    'heading_font_size_tablet' => array(
        'label' => __('H1 Font Size', 'attire'),
        'description' => '',
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'h1_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '25',
        'input_attrs' => array(
            'min' => 10,
            'max' => 72,
            'step' => 1,
        )
    ),
    'heading_font_size_mobile' => array(
        'label' => __('H1 Font Size', 'attire'),
        'description' => '',
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'h1_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '25',
        'input_attrs' => array(
            'min' => 10,
            'max' => 72,
            'step' => 1,
        )
    ),
    'heading2_font_size_desktop' => array(
        'label' => __('H2 Font Size', 'attire'),
        'description' => '',
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'h2_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '21',
        'input_attrs' => array(
            'min' => 10,
            'max' => 72,
            'step' => 1,
        )
    ),
    'heading2_font_size_tablet' => array(
        'label' => __('H2 Font Size', 'attire'),
        'description' => '',
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'h2_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '21',
        'input_attrs' => array(
            'min' => 10,
            'max' => 72,
            'step' => 1,
        )
    ),
    'heading2_font_size_mobile' => array(
        'label' => __('H2 Font Size', 'attire'),
        'description' => '',
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'h2_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '21',
        'input_attrs' => array(
            'min' => 10,
            'max' => 72,
            'step' => 1,
        )
    ),
    'heading3_font_size_desktop' => array(
        'label' => __('H3 Font Size', 'attire'),
        'description' => '',
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'h3_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '17',
        'input_attrs' => array(
            'min' => 10,
            'max' => 72,
            'step' => 1,
        )
    ),
    'heading3_font_size_tablet' => array(
        'label' => __('H3 Font Size', 'attire'),
        'description' => '',
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'h3_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '17',
        'input_attrs' => array(
            'min' => 10,
            'max' => 72,
            'step' => 1,
        )
    ),
    'heading3_font_size_mobile' => array(
        'label' => __('H3 Font Size', 'attire'),
        'description' => '',
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'h3_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '17',
        'input_attrs' => array(
            'min' => 10,
            'max' => 72,
            'step' => 1,
        )
    ),
    'heading4_font_size_desktop' => array(
        'label' => __('H4 Font Size', 'attire'),
        'description' => '',
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'h4_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '14',
        'input_attrs' => array(
            'min' => 20,
            'max' => 72,
            'step' => 1,
        )
    ),
    'heading4_font_size_tablet' => array(
        'label' => __('H4 Font Size', 'attire'),
        'description' => '',
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'h4_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '14',
        'input_attrs' => array(
            'min' => 20,
            'max' => 72,
            'step' => 1,
        )
    ),
    'heading4_font_size_mobile' => array(
        'label' => __('H4 Font Size', 'attire'),
        'description' => '',
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'h4_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '14',
        'input_attrs' => array(
            'min' => 20,
            'max' => 72,
            'step' => 1,
        )
    ),

    'body_font_section' => array(
        'label' => __('Body Font', 'attire'),
        'type' => 'section-header',
        'section' => 'attire_generic_fonts',
    ),

    'body_font' => array(
        'label' => __('Font Family', 'attire'),
        'transport' => 'postMessage',
        'type' => 'typography',
        'section' => 'attire_generic_fonts',
    ),

    'body_font_size_desktop' => array(
        'label' => __('Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'body_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '14',
        'input_attrs' => array(
            'min' => 9,
            'max' => 35,
            'step' => 1,
        )
    ),
    'body_font_size_tablet' => array(
        'label' => __('Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'body_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '14',
        'input_attrs' => array(
            'min' => 9,
            'max' => 35,
            'step' => 1,
        )
    ),
    'body_font_size_mobile' => array(
        'label' => __('Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'body_font_size',
        'section' => 'attire_generic_fonts',
        'default' => '14',
        'input_attrs' => array(
            'min' => 9,
            'max' => 35,
            'step' => 1,
        )
    ),
    'body_font_weight' => array(
        'label' => __('Body Font Weight', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'section' => 'attire_generic_fonts',
        'default' => '400',
        'input_attrs' => array(
            'min' => 100,
            'max' => 900,
            'step' => 100,
        )
    ),
    'button_font_section' => array(
        'label' => __('Button Font', 'attire'),
        'type' => 'section-header',
        'section' => 'attire_generic_fonts',
    ),
    'button_font' => array(
        'label' => __('Font Family', 'attire'),
        'transport' => 'postMessage',
        'type' => 'typography',
        'section' => 'attire_generic_fonts',
        'description' => esc_html__('Font family buttons', 'attire')
    ),
    'button_font_weight' => array(
        'label' => __('Font Weight', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'section' => 'attire_generic_fonts',
        'default' => '700',
        'input_attrs' => array(
            'min' => 100,
            'max' => 900,
            'step' => 100,
        )
    ),
    'widget_title_font' => array(
        'label' => __('Widget Title Font', 'attire'),
        'transport' => 'postMessage',
        'type' => 'typography',
        'section' => 'attire_widget_fonts',
    ),
    'widget_title_font_size_desktop' => array(
        'label' => __('Widget Title Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'widget_title_font_size',
        'section' => 'attire_widget_fonts',
        'default' => '20',
        'input_attrs' => array(
            'min' => 10,
            'max' => 32,
            'step' => 1,
        )
    ),
    'widget_title_font_size_tablet' => array(
        'label' => __('Widget Title Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'widget_title_font_size',
        'section' => 'attire_widget_fonts',
        'default' => '20',
        'input_attrs' => array(
            'min' => 10,
            'max' => 32,
            'step' => 1,
        )
    ),
    'widget_title_font_size_mobile' => array(
        'label' => __('Widget Title Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'widget_title_font_size',
        'section' => 'attire_widget_fonts',
        'default' => '20',
        'input_attrs' => array(
            'min' => 10,
            'max' => 32,
            'step' => 1,
        )
    ),
    'widget_title_font_weight' => array(
        'label' => __('Widget Title Font Weight', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'section' => 'attire_widget_fonts',
        'default' => '300',
        'input_attrs' => array(
            'min' => 100,
            'max' => 900,
            'step' => 100,
        )
    ),

    'widget_content_font' => array(
        'label' => __('Widget Content Font', 'attire'),
        'transport' => 'postMessage',
        'type' => 'typography',
        'section' => 'attire_widget_fonts',
    ),
    'widget_content_font_size_desktop' => array(
        'label' => __('Widget Content Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'widget_content_font_size',
        'section' => 'attire_widget_fonts',
        'default' => '14',
        'input_attrs' => array(
            'min' => 10,
            'max' => 32,
            'step' => 1,
        )
    ),
    'widget_content_font_size_tablet' => array(
        'label' => __('Widget Content Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'widget_content_font_size',
        'section' => 'attire_widget_fonts',
        'default' => '14',
        'input_attrs' => array(
            'min' => 10,
            'max' => 32,
            'step' => 1,
        )
    ),
    'widget_content_font_size_mobile' => array(
        'label' => __('Widget Content Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'widget_content_font_size',
        'section' => 'attire_widget_fonts',
        'default' => '14',
        'input_attrs' => array(
            'min' => 10,
            'max' => 32,
            'step' => 1,
        )
    ),
    'widget_content_font_weight' => array(
        'label' => __('Widget Content Font Weight', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'section' => 'attire_widget_fonts',
        'default' => '300',
        'input_attrs' => array(
            'min' => 100,
            'max' => 900,
            'step' => 100,
        )
    ),
    'menu_top_font' => array(
        'label' => __('Menu Top Level Font', 'attire'),
        'transport' => 'postMessage',
        'type' => 'typography',
        'section' => 'attire_menu_fonts',
    ),
    'menu_top_font_size_desktop' => array(
        'label' => __('Menu Top Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'menu_top_font_size',
        'section' => 'attire_menu_fonts',
        'default' => '16',
        'input_attrs' => array(
            'min' => 10,
            'max' => 52,
            'step' => 1,
        )
    ),
    'menu_top_font_size_tablet' => array(
        'label' => __('Menu Top Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'menu_top_font_size',
        'section' => 'attire_menu_fonts',
        'default' => '16',
        'input_attrs' => array(
            'min' => 10,
            'max' => 52,
            'step' => 1,
        )
    ),
    'menu_top_font_size_mobile' => array(
        'label' => __('Menu Top Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'menu_top_font_size',
        'section' => 'attire_menu_fonts',
        'default' => '16',
        'input_attrs' => array(
            'min' => 10,
            'max' => 52,
            'step' => 1,
        )
    ),
    'menu_top_font_weight' => array(
        'label' => __('Menu Top Font Weight', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'section' => 'attire_menu_fonts',
        'default' => '700',
        'input_attrs' => array(
            'min' => 100,
            'max' => 900,
            'step' => 100,
        )
    ),


    'menu_dropdown_font' => array(
        'label' => __('Menu Dropdown Font', 'attire'),
        'transport' => 'postMessage',
        'type' => 'typography',
        'section' => 'attire_menu_fonts',
    ),
    'menu_dropdown_font_size_desktop' => array(
        'label' => __('Menu Dropdown Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'menu_dropdown_font_size',
        'section' => 'attire_menu_fonts',
        'default' => '14',
        'input_attrs' => array(
            'min' => 10,
            'max' => 52,
            'step' => 1,
        )
    ),
    'menu_dropdown_font_size_tablet' => array(
        'label' => __('Menu Dropdown Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'menu_dropdown_font_size',
        'section' => 'attire_menu_fonts',
        'default' => '14',
        'input_attrs' => array(
            'min' => 10,
            'max' => 52,
            'step' => 1,
        )
    ),
    'menu_dropdown_font_size_mobile' => array(
        'label' => __('Menu Dropdown Font Size', 'attire'),
        'transport' => 'postMessage',
        'type' => 'attire_responsive_input',
        'control_id' => 'menu_dropdown_font_size',
        'section' => 'attire_menu_fonts',
        'default' => '14',
        'input_attrs' => array(
            'min' => 10,
            'max' => 52,
            'step' => 1,
        )
    ),
    'menu_dropdown_font_weight' => array(
        'label' => __('Menu Dropdown Font Weight', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'section' => 'attire_menu_fonts',
        'default' => '600',
        'input_attrs' => array(
            'min' => 100,
            'max' => 900,
            'step' => 100,
        )
    ),

    'facebook_profile_url' => array(
        'label' => __('Facebook Profile / Page URL', 'attire'),
        'transport' => 'postMessage',
        'type' => 'url',
        'section' => 'attire_social',
        'default' => '',
    ),
    'instagram_profile_url' => array(
        'label' => __('Instagram Profile URL', 'attire'),
        'transport' => 'postMessage',
        'type' => 'url',
        'section' => 'attire_social',
        'default' => '',
    ),
    'twitter_profile_url' => array(
        'label' => __('Twitter Profile URL', 'attire'),
        'transport' => 'postMessage',
        'type' => 'url',
        'section' => 'attire_social',
        'default' => '',
    ),
    'googleplus_profile_url' => array(
        'label' => __('YouTube Channel URL', 'attire'),
        'transport' => 'postMessage',
        'type' => 'url',
        'section' => 'attire_social',
        'default' => '',
    ),
    'pinterest_profile_url' => array(
        'label' => __('Pinterest Profile URL', 'attire'),
        'transport' => 'postMessage',
        'type' => 'url',
        'section' => 'attire_social',
        'default' => '',
    ),
    'linkedin_profile_url' => array(
        'label' => __('Linked In Profile URL', 'attire'),
        'transport' => 'postMessage',
        'type' => 'url',
        'section' => 'attire_social',
        'default' => '',
    ),
    'map_address' => array(
        'label' => __('Google Map Address', 'attire'),
        'transport' => 'postMessage',
        'type' => 'text',
        'section' => 'attire_contact',
        'default' => '',
    ),
    'contact_address' => array(
        'label' => __('Contact Address', 'attire'),
        'transport' => 'postMessage',
        'type' => 'textarea',
        'section' => 'attire_contact',
        'default' => '',
    ),
    'contact_phone' => array(
        'label' => __('Phone', 'attire'),
        'transport' => 'postMessage',
        'type' => 'text',
        'section' => 'attire_contact',
        'default' => '',
    ),
    'contact_email' => array(
        'label' => __('Email', 'attire'),
        'transport' => 'postMessage',
        'type' => 'email',
        'section' => 'attire_contact',
        'default' => '',
    ),
    'contact_thanks_msg' => array(
        'label' => __('Thank you message', 'attire'),
        'transport' => 'postMessage',
        'type' => 'textarea',
        'section' => 'attire_contact',
        'default' => '',
    ),
    'copyright_info' => array(
        'label' => __('Copyright Info', 'attire'),
        'transport' => 'postMessage',
        'type' => 'textarea',
        'section' => 'attire_copyright',
        'default' => '&copy;' . __('Copyright ', 'attire') . date('Y') . '.',
    ),
    'copyright_info_visibility' => array(
        'label' => __('Show Copyright Visibility', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'section' => 'attire_copyright',
        'default' => 'show',
        'choices' => array('show' => __('Show', 'attire'), 'hide' => __('Hide', 'attire'))
    ),

    'ph_active' => array(
        'label' => __('Show Page Header', 'attire'),
        'transport' => 'postMessage',
        'type' => 'checkbox',
        'default' => true,
        'section' => 'header_image'
    ),
    'ph_show_on_fp' => array(
        'label' => __('Show On Front Page', 'attire'),
        'transport' => 'postMessage',
        'type' => 'checkbox',
        'default' => false,
        'section' => 'header_image'
    ),
    'ph_breadcrumb' => array(
        'label' => __('Show Breadcrumb', 'attire'),
        'transport' => 'postMessage',
        'type' => 'checkbox',
        'default' => true,
        'section' => 'header_image'
    ),
    'ph_bg_color' => array(
        'label' => __('Page Header Background Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'default' => '#F5F5F5',
        'section' => 'header_image'
    ),
    'ph_overlay_opacity' => array(
        'label' => __('BG Color Overlay Opacity', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'default' => 0,
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
        'section' => 'header_image'
    ),
    'ph_text_color' => array(
        'label' => __('Page Header Text Color', 'attire'),
        'transport' => 'postMessage',
        'type' => 'color',
        'default' => '',
        'section' => 'header_image'
    ),
    'ph_text_align' => array(
        'label' => __('Page Header Text Alignment', 'attire'),
        'transport' => 'postMessage',
        'type' => 'select',
        'default' => 'center',
        'choices' => array(
            'center' => __('Center', 'attire'),
            'left' => __('Left', 'attire'),
            'right' => __('Right', 'attire')
        ),
        'section' => 'header_image'
    ),

    /*'ph_bg_height' => array(
        'label' => __('Page Header Height', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'default' => 200,
        'input_attrs' => array(
            'min' => 60,
            'max' => 2000,
            'step' => 5,
        ),
        'section' => 'header_image'
    ),*/
    'ph_bg_padding_top' => array(
        'label' => __('Page Header Padding Top', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'default' => 48,
        'input_attrs' => array(
            'min' => 20,
            'max' => 600,
            'step' => 1,
        ),
        'section' => 'header_image'
    ),
    'ph_bg_padding_bottom' => array(
        'label' => __('Page Header Padding Bottom', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'default' => 48,
        'input_attrs' => array(
            'min' => 20,
            'max' => 600,
            'step' => 1,
        ),
        'section' => 'header_image'
    ),
    'ph_margin_bottom' => array(
        'label' => __('Page Header Margin Bottom', 'attire'),
        'transport' => 'postMessage',
        'type' => 'range',
        'default' => 20,
        'input_attrs' => array(
            'min' => 0,
            'max' => 200,
            'step' => 1,
        ),
        'section' => 'header_image'
    )

);
