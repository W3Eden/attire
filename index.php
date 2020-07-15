<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( is_home() && get_option( 'show_on_front' ) == 'posts' ) {
	define( 'ATTIRE_HIDE_PAGE_HEADER', 1 );
}

get_header();

?>
    <div class="row">
		<?php
		AttireFramework::DynamicSidebars( 'left' );
		do_action( ATTIRE_THEME_PREFIX . "before_main_content_area" );
		?>
        <div class="<?php AttireFramework::ContentAreaWidth(); ?> attire-post-and-comments">
			<?php get_template_part( 'loop', get_post_type() ); ?>
        </div>
		<?php
		do_action( ATTIRE_THEME_PREFIX . "after_main_content_area" );
		AttireFramework::DynamicSidebars( 'right' );
		?>
    </div>

<?php get_footer();

