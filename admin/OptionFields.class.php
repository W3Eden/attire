<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AttireOptionFields {


	/**
	 * @usage Generate Layout Type Dropdown
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public static function LayoutType( $params ) {
		$html = "<select  name='" . esc_attr( $params['name'] ) . "' id='" . esc_attr( $params['id'] ) . "' style='width: 100px'>";
		$html .= "<option value=''>" . esc_html__( 'Select', 'attire' ) . "</option>";
		$html .= "<option value='wide'" . ( $params['selected'] === 'wide' ? 'selected=selected' : '' ) . ">" . esc_html__( 'Wide', 'attire' ) . "</option>";
		$html .= "<option value='boxed'" . ( $params['selected'] === 'boxed' ? 'selected=selected' : '' ) . ">" . esc_html__( 'Boxed', 'attire' ) . "</option>";
		$html .= "<option value='framed'" . ( $params['selected'] === 'framed' ? 'selected=selected' : '' ) . ">" . esc_html__( 'Framed', 'attire' ) . "</option>";
		$html .= "</select>";

		return $html;
	}

	public static function HeaderStyles( $params ) {
		WP_Filesystem();
		global $wp_filesystem;
		extract( $params );
		$default = ! isset( $params['default'] ) ? 1 : $params['default'];

		$navheads = scandir( get_template_directory() . '/templates/headers/' );
		if ( file_exists( get_stylesheet_directory() . '/templates/headers/' ) ) {
			$navheads = array_merge( $navheads, scandir( get_stylesheet_directory() . '/templates/headers/' ) );
		}

		$html     = "<select name='" . esc_attr( $name ) . "' id='" . esc_attr( $id ) . "' style='width: 150px'><option value='" . esc_attr( $default ) . "'>" . esc_html__( 'Default', 'attire' ) . "</option>";
		$navheads = array_unique( $navheads );
		foreach ( $navheads as $navhead ) {
			if ( strpos( $navhead, '.php' ) && ( file_exists( get_template_directory() . '/templates/headers/' . $navhead ) || file_exists( get_stylesheet_directory() . '/templates/headers/' . $navhead ) ) ) {
				$tmpdata = file_exists( get_stylesheet_directory() . '/templates/headers/' . $navhead ) ? $wp_filesystem->get_contents( get_stylesheet_directory() . '/templates/headers/' . $navhead ) : $wp_filesystem->get_contents( get_template_directory() . '/templates/headers/' . $navhead );
				$navhead = str_replace( ".php", "", $navhead );
				if ( preg_match( "/Nav[\s]*Header[\s]*Template[\s]*:([^\-\->]+)/", $tmpdata, $matches ) ) {
					$htitle = $matches[1];
				} else {
					$htitle = $navhead;
				}
				$html .= "<option value='" . esc_attr( $navhead ) . "' " . selected( $selected, $navhead, false ) . ">" . esc_html( $htitle ) . "</option>";
			}
		}

		$html .= "</select>";

		return $html;
	}

	public static function SidebarDropdown( $params ) {
		global $wp_registered_sidebars;

		$sidebars = array();
		foreach ( $wp_registered_sidebars as $sidebar ) {
			$sid              = $sidebar['id'];
			$sidebars[ $sid ] = $sidebar['name'];
		}

		$html = "<select name ='{$params['name']}'><option value='no_sidebar'>" . esc_html__( 'Do Not Apply', 'attire' ) . "</option>";
		$html .= "<option value='default'>" . esc_html__( 'Theme Default', 'attire' ) . "</option>";
		if ( is_array( $sidebars ) ) {
			foreach ( $sidebars as $id => $name ) {
				$html .= "<option " . selected( $params['selected'], $id, false ) . " value='" . esc_attr( $id ) . "'>" . esc_html( $name ) . "</option>";
			}
		}
		$html .= "</select>";

		return $html;
	}

	public static function GetFonts() {
		$ini_directory = get_template_directory() . '/theme-data/';
		//$font_array    = parse_ini_file( "$ini_directory/fonts.php", true );
        return include ("$ini_directory/fonts.php");
		//return $font_array;
	}
}
