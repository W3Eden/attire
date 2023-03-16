<?php
function wpdocs_selectively_enqueue_admin_script( $hook ) {
	if ( 'themes.php' != $hook ) {
		return;
	}
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'my-script', get_template_directory_uri() . '/admin/my-script.js', array( 'jquery' ), '1.0', true );
}

add_action( 'admin_enqueue_scripts', 'wpdocs_selectively_enqueue_admin_script' );
