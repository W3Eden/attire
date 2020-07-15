<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AttireFramework {
	private $theme_mod;

	/**
	 * @usage Prints Page Heading in Single Page/Post
	 */
	public static function PageHeadingMain() {

		$PgaeHeadingMain = '';

		if ( is_day() ) :
			$PgaeHeadingMain = get_the_date();

        elseif ( is_month() ) :
			$PgaeHeadingMain = esc_html__( "Monthly Archives: ", "attire" ) . get_the_date( 'F Y' );

        elseif ( is_404() ) :
			$PgaeHeadingMain = "404";

        elseif ( is_year() ) :
			$PgaeHeadingMain = get_the_date( 'Y' );

        elseif ( is_category() ) :
			$PgaeHeadingMain = single_cat_title( '', false );

        elseif ( is_tag() ) :
			$PgaeHeadingMain = single_tag_title();

        elseif ( is_page() ) :
			$PgaeHeadingMain = get_the_title();

        elseif ( is_single() ) :
			$PgaeHeadingMain = get_the_title();

        elseif ( is_singular( 'wpdmpro' ) ) :
			$PgaeHeadingMain = get_the_title();

        elseif ( is_search() ):
			$PgaeHeadingMain = esc_html__( "Search Result For:  ", "attire" ) . esc_attr( get_query_var( 's' ) );

        elseif ( is_tax() ):
			$PgaeHeadingMain = single_term_title( '', false );

        elseif ( is_home() ):
			$pageid          = get_query_var( 'page_id' );
			$page            = get_post( $pageid );
			$PgaeHeadingMain = esc_attr( $page->post_title );
		endif;
		rewind_posts();

		echo wp_kses_post( apply_filters( "attire_page_heading_main", $PgaeHeadingMain ) );

	}

	/**
	 * @usage Render Dynamic Sidebars
	 */
	public static function DynamicSidebars( $pos ) {
		global $post;

		$theme_mod = get_option( 'attire_options' );

		$left_sidebar_style  = "default";
		$right_sidebar_style = "default";

//		Defaults
		$sidebar_layout      = 'right-sidebar-1';
		$left_sidebar        = 'left';
		$right_sidebar       = 'right';
		$left_sidebar_width  = 3;
		$right_sidebar_width = 3;

		if ( is_home() || is_front_page() ) {
			// if is_home() || is_front_page() default theme option is the top priority
			$sidebar_layout      = esc_attr( $theme_mod['layout_front_page'] );
			$left_sidebar        = esc_attr( $theme_mod['front_page_ls'] );
			$right_sidebar       = esc_attr( $theme_mod['front_page_rs'] );
			$left_sidebar_width  = intval( $theme_mod['front_page_ls_width'] );
			$right_sidebar_width = intval( $theme_mod['front_page_rs_width'] );
		} elseif ( is_page() ) {
			$meta = get_post_meta( get_the_ID(), 'attire_post_meta', true );
			$sl = isset($meta['sidebar_layout']) ? $meta['sidebar_layout'] : 'default';	
			$sidebar_layout      = $sl === 'default' ? esc_attr( $theme_mod['layout_default_page'] ) : $sl;
			$theme_mod['layout_default_page']  = $sidebar_layout;
			$left_sidebar        = esc_attr( $theme_mod['default_page_ls'] );
			$right_sidebar       = esc_attr( $theme_mod['default_page_rs'] );
			$left_sidebar_width  = intval( $theme_mod['default_page_ls_width'] );
			$right_sidebar_width = intval( $theme_mod['default_page_rs_width'] );

		} elseif ( is_single() ) {
			$sidebar_layout      = esc_attr( $theme_mod['layout_default_post'] );
			$left_sidebar        = esc_attr( $theme_mod['default_post_ls'] );
			$right_sidebar       = esc_attr( $theme_mod['default_post_rs'] );
			$left_sidebar_width  = intval( $theme_mod['default_post_ls_width'] );
			$right_sidebar_width = intval( $theme_mod['default_post_rs_width'] );
		} elseif ( is_archive() || is_search() || is_category() ) {
			$sidebar_layout = esc_attr( $theme_mod['layout_archive_page'] );

			$left_sidebar        = esc_attr( $theme_mod['archive_page_ls'] );
			$right_sidebar       = esc_attr( $theme_mod['archive_page_rs'] );
			$left_sidebar_width  = intval( $theme_mod['archive_page_ls_width'] );
			$right_sidebar_width = intval( $theme_mod['archive_page_rs_width'] );
		}


		if ( $pos == 'left' ) {

			if ( $left_sidebar != 'no_sidebar' && in_array( $sidebar_layout, array(
					'left-sidebar-1',
					'left-sidebar-2',
					'sidebar-2'
				) ) ) {
				self::Sidebar( $left_sidebar, $left_sidebar_width, $left_sidebar_style, "left" );
			} elseif ( in_array( $sidebar_layout, array(
				'left-sidebar-1',
				'left-sidebar-2',
				'sidebar-2'
			) ) ) {
				echo '<div class="col-lg-' . esc_attr( $left_sidebar_width ) . '"></div>';

			}

			if ( $right_sidebar != 'no_sidebar' && $sidebar_layout == 'left-sidebar-2' ) {
				self::Sidebar( $right_sidebar, $right_sidebar_width, $right_sidebar_style, "right" );
			} elseif ( $sidebar_layout == 'left-sidebar-2' ) {
				echo '<div class="col-lg-' . esc_attr( $right_sidebar_width ) . '"></div>';

			}
		} elseif ( $pos == 'right' ) {
			if ( $left_sidebar != 'no_sidebar' && $sidebar_layout == 'right-sidebar-2' ) {
				self::Sidebar( $left_sidebar, $left_sidebar_width, $left_sidebar_style, "left" );
			} elseif ( $sidebar_layout == 'right-sidebar-2' ) {
				echo '<div class="col-lg-' . esc_attr( $left_sidebar_width ) . '"></div>';

			}

			if ( $right_sidebar != 'no_sidebar' && in_array( $sidebar_layout, array(
					'right-sidebar-1',
					'right-sidebar-2',
					'sidebar-2'
				) ) ) {
				self::Sidebar( $right_sidebar, $right_sidebar_width, $right_sidebar_style, "right" );
			} elseif ( in_array( $sidebar_layout, array(
				'right-sidebar-1',
				'right-sidebar-2',
				'sidebar-2'
			) ) ) {
				echo '<div class="col-lg-' . esc_attr( $right_sidebar_width ) . '"></div>';

			}
		}

	}

	/**
	 * @usage Render Sidebar
	 *
	 * @param $id
	 * @param $width
	 * @param $style
	 * @param $pos
	 */
	public static function Sidebar( $id, $width, $style, $pos ) {

		$style = esc_attr( $style );
		$pos   = esc_attr( $pos );
		?>
        <div class="sidebar-area-<?php echo $pos ?> col-lg-<?php echo esc_attr( $width ); ?>">
            <div class="sidebar <?php echo esc_attr( $style ); ?>">
				<?php do_action( "attire_before_sidebar_{$style}" ); ?>

				<?php do_action( "attire_before_{$pos}_sidebar" ); ?>


				<?php dynamic_sidebar( $id ); ?>

				<?php do_action( "attire_after_{$pos}_sidebar" ); ?>

				<?php do_action( "attire_after_sidebar_{$style}" ); ?>
            </div>
        </div>
		<?php
	}


	/**
	 * @usage Calculate Content Area Width
	 */
	public static function ContentAreaWidth() {
		global $post;
		$theme_mod = get_option( 'attire_options' );

		$sidebar_layout      = "right-sidebar-1";
		$content_width       = 12;
		$right_sidebar_width = 3;
		$defaults            = array(
			'sidebar_layout'      => 'right-sidebar-1',
			'left_sidebar_width'  => 3,
			'right_sidebar_width' => 3
		);
		if ( is_home() || is_front_page() ) {
			$sidebar_layout      = esc_attr( $theme_mod['layout_front_page'] );
			$left_sidebar_width  = intval( $theme_mod['front_page_ls_width'] );
			$right_sidebar_width = intval( $theme_mod['front_page_rs_width'] );
		} elseif ( is_single() || is_page() ) {

			if ( is_page() ) {

				$meta = get_post_meta( get_the_ID(), 'attire_post_meta', true );
				$sl = isset($meta['sidebar_layout']) ? $meta['sidebar_layout'] : 'default';	
				$sidebar_layout      = $sl === 'default' ? esc_attr( $theme_mod['layout_default_page'] ) : $sl;
				$theme_mod['layout_default_page']  = $sidebar_layout;
				$left_sidebar_width  = intval( $theme_mod['default_page_ls_width'] );
				$right_sidebar_width = intval( $theme_mod['default_page_rs_width'] );
			} else {
				$sidebar_layout      = esc_attr( $theme_mod['layout_default_post'] );
				$left_sidebar_width  = intval( $theme_mod['default_post_ls_width'] );
				$right_sidebar_width = intval( $theme_mod['default_post_rs_width'] );
			}

		} elseif ( is_archive() || is_category() || is_search() ) {
			$sidebar_layout      = esc_attr( $theme_mod['layout_archive_page'] );
			$left_sidebar_width  = intval( $theme_mod['archive_page_ls_width'] );
			$right_sidebar_width = intval( $theme_mod['archive_page_rs_width'] );
		}

		if ( $sidebar_layout == "no-sidebar" ) {
			$content_width = 12;
		} elseif ( $sidebar_layout == "right-sidebar-1" ) {
			$content_width = 12 - $right_sidebar_width;
		} elseif ( $sidebar_layout == "left-sidebar-1" ) {
			$content_width = 12 - $left_sidebar_width;
		} else {
			$content_width = 12 - $left_sidebar_width - $right_sidebar_width;
		}

		echo esc_attr( apply_filters( "attire_content_area_width", "$sidebar_layout col-lg-" . $content_width ) );

	}


}