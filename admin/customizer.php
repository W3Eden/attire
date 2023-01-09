<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Classes to create a custom controls
 */
require_once( 'custom-controls/alpha-color-picker/alpha-color-picker.php' );
require_once( 'custom-controls/attire-section-header.php' );
require_once( 'custom-controls/attire-range.php' );
require_once( 'custom-controls/attire-responsive.php' );
require_once( 'custom-controls/attire-layout-picker.php' );
require_once( 'custom-controls/attire-image-picker.php' );
require_once( 'custom-controls/attire-static-review.php' );
require_once( 'custom-controls/attire-google-font-picker.php' );
require_once( 'sanitizers.php' );
require_once( 'render-callbacks.php' );
/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function attire_customize_register( $wp_customize ) {

	// Temporary initialisation to not show error; In general these variables are acquired from files added bellow
	$attire_panels       = array();
	$attire_sections     = array();
	$attire_options      = array();
	$attire_config       = array();
	$choices             = array();
	$input_attrs         = array();
	$taxonomy            = array();
	$type                = '';
	$default             = '';
	$transport           = '';
	$label               = '';
	$section             = '';
	$option_type         = '';
	$control_id          = '';
	$responsive_controls = [];

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'custom_logo' )->transport     = 'postMessage';

	$wp_customize->get_setting( 'header_image' )->transport = 'postMessage';
	$wp_customize->get_section( 'header_image' )->title     = 'Page Header';

	$wp_customize->get_control( 'custom_logo' )->section = 'attire_logo_options';

	if ( isset( $wp_customize->selective_refresh ) ) {

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'attire_blogdescription_rcb'
		) );

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => 'a.site-logo',
			'render_callback' => 'attire_blogname_rcb'
		) );

		$wp_customize->selective_refresh->add_partial( 'custom_logo', array(
			'selector'        => '.site-logo',
			'render_callback' => 'attire_site_logo_rcb'

		) );
		$wp_customize->selective_refresh->add_partial( 'header_image', array(
			'selector'        => '.page_header_wrap',
			'render_callback' => 'attire_custom_header_rcb'

		) );
	}

	/* Load Panels, Sections, Settings, Controls array */
	require_once( ATTIRE_TEMPLATE_DIR . '/admin/customizer-config.php' );


	/* Adding support for Child Themes */
	$attire_panels   = apply_filters( ATTIRE_THEME_PREFIX . 'customizer_panels', $attire_panels );
	$attire_sections = apply_filters( ATTIRE_THEME_PREFIX . 'customizer_sections', $attire_sections );
	$attire_options  = apply_filters( ATTIRE_THEME_PREFIX . 'customizer_options', $attire_options );

	/* Basic Config */
	$theme_option = $attire_config['option_name'];
	$capability   = $attire_config['capability'];
	$option_type  = $attire_config['option_type'];


	/* Add Panels */
	foreach ( $attire_panels as $id => $args ) {
		$wp_customize->add_panel( $id, $args );
	}

	/* Add Sections */
	foreach ( $attire_sections as $id => $args ) {
		$wp_customize->add_section( $id, $args );
	}

	/* Add Settings and Controls */
	foreach ( $attire_options as $id => $args ) {
		$description = null;
		extract( $args );
		switch ( $type ) {
			case 'text':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( $id, array(
					'label'    => $label,
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
                    'description' => $description,
                    ) );
				break;
			case 'attire_review':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => '',
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => '__return_false'
				) );

				$wp_customize->add_control( new Attire_Static_Review_Text_Control( $wp_customize, $id, array(
					'label'    => $label,
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
				) ) );
				break;
			case 'textarea':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_textarea_field',
				) );

				$wp_customize->add_control( $id, array(
					'label'    => $label,
					'type'     => 'textarea',
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
				) );
				break;
			case 'email':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'attire_sanitize_email',
				) );

				$wp_customize->add_control( $id, array(
					'label'    => $label,
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
				) );
				break;
			case 'url':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'esc_url_raw',
				) );

				$wp_customize->add_control( $id, array(
					'label'    => $label,
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
				) );
				break;
			case 'number':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'attire_sanitize_integer',
				) );

				$wp_customize->add_control( $id, array(
					'label'       => $label,
					'type'        => 'number',
					'section'     => $section,
					'settings'    => $theme_option . '[' . $id . ']',
					'input_attrs' => array(
						'min' => isset( $min ) ? $min : 0,
						'max' => isset( $max ) ? $max : 5,
					)
				) );
				break;
			case 'section-header':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'esc_url_raw',
				) );

				$wp_customize->add_control( new Attire_Section_Header_Custom_Control( $wp_customize, $id, array(
					'label'    => $label,
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
				) ) );
				break;
			case 'image':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'esc_url_raw',
				) );

				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $id, array(
					'label'    => $label,
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
				) ) );
				break;
			case 'select':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'attire_sanitize_select',
				) );

				$wp_customize->add_control( $id, array(
					'label'       => $label,
					'type'        => 'select',
					'section'     => $section,
					'settings'    => $theme_option . '[' . $id . ']',
					'choices'     => $choices,
					'description' => $description,
				) );
				break;
			case 'checkbox':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'attire_sanitize_checkbox',
				) );

				$wp_customize->add_control( $id, array(
					'label'    => $label,
					'type'     => 'checkbox',
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
				) );
				break;
			case 'color':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_hex_color',
				) );

				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array(
					'label'    => $label,
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
				) ) );
				break;
			case 'alpha-color':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_text_field'
				) );

				$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, $id, array(
					'label'        => $label,
					'section'      => $section,
					'settings'     => $theme_option . '[' . $id . ']',
					'show_opacity' => true, // Optional.
					'palette'      => array(
						'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
						'rgba(50,50,50,0.8)',
						'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
						'#00CC99' // Mix of color types = no problem
					)
				) ) );
				break;
			case 'layout':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_text_field',
					// this has to be sanitized with sanitize_text_field and cant be sanitized with  attire_sanitize_custom_select/attire_sanitize_select
					// because no choices passed from customizer-control.php for this type (layout), instead it's render manually byt the function Layout_Picker_Custom_Control->render_content
				) );
				$wp_customize->add_control( new Attire_Layout_Picker_Custom_Control( $wp_customize, $id, array(
					'label'       => $label,
					'description' => $description,
					'type'        => 'layout',
					'section'     => $section,
					'settings'    => $theme_option . '[' . $id . ']',
				) ) );
				break;
			case 'image-picker':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'attire_sanitize_custom_select',
				) );
				$wp_customize->add_control( new Attire_Image_Picker_Custom_Control( $wp_customize, $id, array(
					'label'       => $label,
					'description' => $description,
					'type'        => 'image-picker',
					'section'     => $section,
					'settings'    => $theme_option . '[' . $id . ']',
					'choices'     => $choices,
				) ) );
				break;
			case 'dropdown-pages':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'capability'        => $capability,
					'default'           => $default,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'attire_sanitize_integer',
				) );

				$wp_customize->add_control( $id, array(
					'label'    => $label,
					'section'  => $section,
					'type'     => 'dropdown-pages',
					'settings' => $theme_option . '[' . $id . ']',
				) );
				break;
			case 'dropdown-taxonomy':
				$choices    = array();
				$taxonomies = get_terms( $taxonomy, 'hide_empty=0' );

				if ( count( $taxonomies ) > 0 ) {
					foreach ( $taxonomies as $taxo ) {
						$tid             = isset( $taxo->term_id ) ? $taxo->term_id : null;
						$name            = isset( $taxo->name ) ? $taxo->name : null;
						$choices[ $tid ] = $name;
					}
				}

				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( $id, array(
					'label'    => $label,
					'type'     => 'select',
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
					'choices'  => $choices,
				) );
				break;
			case 'typography':
				$fontsdata = AttireOptionFields::GetFonts();
				//wpdmdd($fontsdata);
				$fonts     = array();
				$fonts[''] = 'Default';
				foreach ( $fontsdata as $font ) {
					$fonts[ $font->family . ":" . implode( ",", $font->variants ) ] = $font->family;
				}
				asort( $fonts );
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_text_field',
				) );
				/*$wp_customize->add_setting($theme_option . '[' . $id . '_letter_spacing]', array(
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
				));*/
				/*$wp_customize->add_control($id, array(
					'settings' => $theme_option . '[' . $id . ']',
					'label' => $label,
					'section' => $section,
					'type' => 'select',
					'input_attrs' => array('class' => 'chosen-select'),
					'choices' => $fonts,
				));*/
				$wp_customize->add_control( new Attire_Google_Font_Picker_Control(
					$wp_customize,
					$id,
					array(
						'label'       => $label,
						'section'     => $section,
						'settings'    => $theme_option . '[' . $id . ']',
						'description' => $description,
						'choices'     => $fonts

					)
				) );
				break;
			case 'range':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'attire_sanitize_integer',
				) );

				$wp_customize->add_control(
					new Attire_Customize_Range_Control(
						$wp_customize,
						$id,
						array(
							'label'       => $label,
							'section'     => $section,
							'settings'    => $theme_option . '[' . $id . ']',
							'description' => $description,
							'input_attrs' => $input_attrs,

						)
					)
				);

				break;
			case 'dropdown-sidebar':
				global $wp_registered_sidebars;
				$sidebars               = array();
				$sidebars['no_sidebar'] = 'Do not apply';
				foreach ( $wp_registered_sidebars as $sidebar ) {
					$sid              = $sidebar['id'];
					$sidebars[ $sid ] = $sidebar['name'];
				}

				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => '',
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( $id, array(
					'settings' => $theme_option . '[' . $id . ']',
					'label'    => $label,
					'section'  => $section,
					'type'     => 'select',
					'choices'  => $sidebars,
				) );
				break;
			case 'attire_responsive_input':
				if ( isset( $responsive_controls[ $control_id ] ) ) {
					array_push( $responsive_controls[ $control_id ]['settings'], $theme_option . '[' . $id . ']' );
				} else {
					$responsive_controls[ $control_id ]             = [];
					$responsive_controls[ $control_id ]['settings'] = [];
					array_push( $responsive_controls[ $control_id ]['settings'], $theme_option . '[' . $id . ']' );
				}

				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'attire_sanitize_integer',
				) );
				if ( count( $responsive_controls[ $control_id ]['settings'] ) === 3 ) {
					$wp_customize->add_control(
						new Attire_Customize_Responsive_Control(
							$wp_customize,
							$control_id,
							array(
								'label'       => $label,
								'section'     => $section,
								'description' => $description,
								'settings'    => $responsive_controls[ $control_id ]['settings'],
								'input_attrs' => $input_attrs
							) ) );
				}
				break;

			default:
				break;
		}

		if ( isset( $wp_customize->selective_refresh ) ) {

			if ( $id === 'site_logo_footer' ) {
				$wp_customize->selective_refresh->add_partial( 'site_logo_footer_partial', array(
					'settings'            => array( 'attire_options[site_logo_footer]' ),
					'selector'            => '.footer-logo',
					'render_callback'     => 'attire_site_logo_footer_rcb',
					'fallback_refresh'    => false,
					'container_inclusive' => false,

				) );
			} elseif ( $id === 'nav_header' ) {
				$wp_customize->selective_refresh->add_partial( 'nav_header_partial', array(
					'settings'            => array( 'attire_options[nav_header]' ),
					'selector'            => '.header-div',
					'render_callback'     => 'attire_nav_header_rcb',
					'fallback_refresh'    => false,
					'container_inclusive' => false,

				) );

			} elseif ( $id === 'footer_style' ) {
				$wp_customize->selective_refresh->add_partial( 'footer_style_partial', array(
					'settings'            => array( 'attire_options[footer_style]' ),
					'selector'            => '.footer-div',
					'render_callback'     => 'attire_footer_style_rcb',
					'fallback_refresh'    => false,
					'container_inclusive' => false,

				) );

			} elseif ( $id === 'copyright_info' ) {
				$wp_customize->selective_refresh->add_partial( 'copyright_info_partial', array(
					'settings'            => array( 'attire_options[copyright_info]' ),
					'selector'            => '.copyright-text',
					'render_callback'     => 'attire_copyright_info_rcb',
					'fallback_refresh'    => false,
					'container_inclusive' => false,

				) );


			} elseif ( $id === 'copyright_info_visibility' ) {
				$wp_customize->selective_refresh->add_partial( 'copyright_info_visibility_partial', array(
					'settings'            => array( 'attire_options[copyright_info_visibility]' ),
					'selector'            => '.copyright-outer',
					'render_callback'     => 'attire_copyright_info_visibility_rcb',
					'fallback_refresh'    => false,
					'container_inclusive' => false,

				) );
			} elseif ( $id === 'attire_archive_page_post_view' ) {
				$wp_customize->selective_refresh->add_partial( 'attire_archive_page_post_view_partial', array(
					'settings'            => array( 'attire_options[attire_archive_page_post_view]' ),
					'selector'            => '.archive-div',
					'render_callback'     => 'attire_archive_page_post_view_rcb',
					'fallback_refresh'    => false,
					'container_inclusive' => false,
				) );
			} elseif ( $id === 'attire_archive_page_post_sorting' ) {
				$wp_customize->selective_refresh->add_partial( 'attire_archive_page_post_sorting_partial', array(
					'settings'            => array( 'attire_options[attire_archive_page_post_sorting]' ),
					'selector'            => '.archive-div',
					'render_callback'     => 'attire_archive_page_post_view_rcb',
					'fallback_refresh'    => false,
					'container_inclusive' => false,
				) );
			}
		}
	}
}

add_action( 'customize_register', 'attire_customize_register' );

/**
 *
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function attire_customize_preview_js() {
	wp_enqueue_script( 'attire_customizer', ATTIRE_TEMPLATE_URL . '/admin/js/customizer.js', array( 'customize-preview' ), '20171015', true );
	wp_localize_script( 'attire_customizer', 'saved_mods',
		$theme_mod = WPATTIRE()->theme_options
	);
}

add_action( 'customize_preview_init', 'attire_customize_preview_js' );

/**
 *
 * Customizing Customizer Controls
 */
function attire_customizer_style() {


	wp_enqueue_style( 'attire-customizer-controls-css', ATTIRE_TEMPLATE_URL . '/admin/css/attire-customizer-controls.min.css' );
	wp_enqueue_style( 'attire-customizer-controls-chosen', ATTIRE_TEMPLATE_URL . '/admin/chosen-select/chosen.min.css' );
	wp_enqueue_script( 'attire-customizer-controls-chosen', ATTIRE_TEMPLATE_URL . '/admin/chosen-select/chosen.jquery.min.js' );
	wp_enqueue_script( 'attire-customizer-controls-js', ATTIRE_TEMPLATE_URL . '/admin/js/attire-customizer-controls.js', array(
		'jquery',
		'customize-controls'
	), false, true );

	wp_register_style( 'font-awesome', ATTIRE_TEMPLATE_URL . '/fonts/fontawesome/css/all.min.css' );
	wp_enqueue_style( 'font-awesome' );

}

add_action( 'customize_controls_enqueue_scripts', 'attire_customizer_style' );

add_action( "customize_controls_print_styles", function () {
	?>
    <style>

    </style>
	<?php
} );
